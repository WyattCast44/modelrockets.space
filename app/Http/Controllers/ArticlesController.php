<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::published()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        $article->load('user');

        return view('articles.show', ['article' => $article]);
    }
}
