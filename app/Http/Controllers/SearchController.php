<?php

namespace App\Http\Controllers;

use App\User;
use App\Board;
use App\Thread;
use App\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchable = [
        Article::class,
        Thread::class,
        Board::class,
        User::class,
    ];

    public function show(Request $request)
    {
        if ($request->has('q')) {
            foreach ($this->searchable as $model) {
                $results[Str::plural(class_basename($model))] = resolve($model)->search($request->query('q'))->get();
            }
        } else {
            $results = [];
        }

        $results = collect($results)->filter(function ($set) {
            return ($set->count() > 0) ? true : false;
        });

        return view('search.index', [
            'results' => $results,
        ]);
    }

    public function test(Request $request)
    {
        return view('search.index');

        $term = $request->query('q');

        $results = Thread::search($term)->get();
        
        dd($results);

        $results = collect($this->searchable)->each(function ($model) use ($term) {
            return resolve($model)->search($term)->get();
        });
    }

    public function handle()
    {
        return back();
    }
}
