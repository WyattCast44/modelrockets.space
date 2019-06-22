<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;

class ForumController extends Controller
{
    protected $allowedQueryParams = [
        'all' => 'all',
        'mine' => 'mine',
        'popular' => 'popular',
        'latest' => 'latest',
    ];

    public function __invoke(Request $request)
    {
        if ($request->has('q') && collect($this->allowedQueryParams)->contains($request->query('q'))) {
            $threads = $this->getCustomThreads();
            dd('custom query time', $threads);
        } else {
            $threads = $this->getStandardThreads();
        }

        $boards = Board::public()
                    ->latest()
                    ->take(6)
                    ->get();

        return view('forum.index', [
            'boards' => $boards,
            'threads' => $threads
        ]);
    }

    protected function getCustomThreads()
    {
        return Thread::latest()
                ->where('user_id', auth()->id())
                ->with('user')
                ->get();
        //->simplePaginate(20);
    }

    protected function getStandardThreads()
    {
        return Thread::latest()
                ->with('user')
                ->simplePaginate(20);
    }
}
