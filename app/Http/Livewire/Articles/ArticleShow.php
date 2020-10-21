<?php

namespace App\Http\Livewire\Articles;

use Livewire\Component;
use App\Domain\Blog\Models\Article;

class ArticleShow extends Component
{
    public Article $article;

    public function mount(Article $article)
    {
        abort_if(!$article->published, 404);
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
