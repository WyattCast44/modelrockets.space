<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->has('q')) {
            $articles = Article::search($request->q)->paginate(8);
        }

        //dd($articles);

        return view('articles.search-results', ['articles' => $articles]);
    }
}
