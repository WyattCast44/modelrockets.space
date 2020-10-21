<?php

namespace App\Http\Livewire\Articles;

use App\Domain\Blog\Models\Article;
use Livewire\Component;

class ArticleShow extends Component
{
    public Article $article;

    public function mount(Article $article)
    {
        abort_if(!$article->published, 404);
    }

    public function render()
    {
        return view('articles.show', [
            'article' => $this->article,
        ])->extends('layouts.app')->section('content');
    }
}
