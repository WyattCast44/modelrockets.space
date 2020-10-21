<?php

namespace App\Http\Controllers;

use App\Domain\Blog\Models\Article;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('preview');
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
