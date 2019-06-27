<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::published()
            ->latest()
            ->paginate(8);

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        if (!$article->published) {
            return abort(404);
        }
        
        $article->load('user');

        return view('articles.show', ['article' => $article]);
    }
}
