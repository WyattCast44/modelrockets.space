<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleFavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Article $article, Request $request)
    {
        $article->favorite();

        toast('Article favorited!', 'success', 'top');

        return back();
    }
}
