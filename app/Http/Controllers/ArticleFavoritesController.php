<?php

namespace App\Http\Controllers;

use App\Domain\Blog\Models\Article;

class ArticleFavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Article $article)
    {
        $article->favorite();

        toast('Article favorited!', 'success', 'top');

        return back();
    }

    public function destroy(Article $article)
    {
        $article->unfavorite();

        toast('Article unfavorited!', 'success', 'top');

        return back();
    }
}
