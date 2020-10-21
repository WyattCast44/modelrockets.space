<?php

namespace App\Http\Livewire\Articles;

use Livewire\Component;
use Butschster\Head\Facades\Meta;
use App\Domain\Blog\Models\Article;
use Butschster\Head\Packages\Entities\OpenGraphPackage;

class ArticleShow extends Component
{
    public Article $article;

    public function mount(Article $article)
    {
        abort_if(!$article->published, 404);

        $graph = tap(new OpenGraphPackage('open_graph'), function ($graph) {
            $graph->setType('website')
                ->setSiteName(config('app.name'))
                ->setTitle($this->article->title);
        });

        Meta::prependTitle($this->article->title)
            ->registerPackage($graph);
    }

    public function favorite()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->article->favorite();
    }

    public function unfavorite()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->article->unfavorite();
    }

    public function render()
    {
        return view('articles.show', [
            'article' => $this->article,
        ])->extends('layouts.app')->section('content');
    }
}
