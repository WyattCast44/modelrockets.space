<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;

class ForumController extends Controller
{
    public function __invoke()
    {
        $boards = Board::all();
        $threads = Thread::all();

        return view('forum.index', [
            'boards' => $boards,
            'threads' => $threads
        ]);
    }
}
