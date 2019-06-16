<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::published()
            ->latest()
            ->paginate(5);

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        $article->load('user');

        return view('articles.show', ['article' => $article]);
    }
}
