<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;

class ForumController extends Controller
{
    public function __invoke()
    {
        $boards = Board::public()
                    ->latest()
                    ->take(6)
                    ->get();

        $threads = Thread::latest()
                            ->with('user')
                            ->simplePaginate(20);

        return view('forum.index', [
            'boards' => $boards,
            'threads' => $threads
        ]);
    }
}
