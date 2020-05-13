<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        // Data loaded via Livewire
        return view('articles.index');
    }

    public function show(Article $article)
    {
        if (!$article->published) {
            return abort(404);
        }
        
        $article->load(['user']);

        return view('articles.show', ['article' => $article]);
    }
}
