<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;

class ForumController extends Controller
{
    protected $allowedQueryParams = [
        'all' => 'all',
        'mine' => "mine",
        'popular' => "popular",
        'latest' => 'latest',
    ];

    public function __invoke(Request $request)
    {
        // if ($request->has('q') && collect($this->allowedQueryParams)->has($request->query('q'))) {
        //     $threads = $this->getCustomThreads();
        //     dd($threads);
        // } else {
        //     $threads = $this->getStandardThreads();
        // }
        
        $threads = $this->getStandardThreads();

        $boards = Board::public()
                    ->latest()
                    ->take(6)
                    ->get();

        return view('forum.index', [
            'boards' => $boards,
            'threads' => $threads
        ]);
    }

    protected function getStandardThreads()
    {
        return Thread::latest()
                ->with('user')
                ->simplePaginate(20);
    }
}
