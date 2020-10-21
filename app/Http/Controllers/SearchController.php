<?php

namespace App\Http\Controllers;

use App\User;
use App\Board;
use App\Thread;
use App\Domain\Blog\Models\Article;
use App\Playlist;
use App\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchable = [
        Article::class,
        Thread::class,
        Board::class,
        User::class,
        Playlist::class,
        Video::class,
    ];

    public function show(Request $request)
    {
        if ($request->has('q') && strlen($request->query('q')) != 0) {
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
}
