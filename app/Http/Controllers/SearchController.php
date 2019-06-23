<?php

namespace App\Http\Controllers;

use App\User;
use App\Board;
use App\Thread;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchable = [
        Thread::class,
        User::class,
        Board::class,
    ];

    public function __invoke(Request $request)
    {
        return view('search.index');

        $term = $request->query('q');

        $results = Thread::search($term)->get();
        
        dd($results);

        $results = collect($this->searchable)->each(function ($model) use ($term) {
            return resolve($model)->search($term)->get();
        });
    }
}
