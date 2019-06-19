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
            ->paginate(8);

        $latestThreads = Thread::latest()->take(5)->get();

        return view('forum.index', [
            'boards' => $boards,
            'latestThreads' => $latestThreads
        ]);
    }
}
