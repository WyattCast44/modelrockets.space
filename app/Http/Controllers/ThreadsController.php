<?php

namespace App\Http\Controllers;

use App\Board;
use App\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function show(Board $board, Thread $thread)
    {
        if (!$board->public) {
            return abort(403);
        }

        $thread->load(['user', 'replies']);

        return view('forum.threads.show', [
            'board' => $board,
            'thread' => $thread
        ]);
    }
}
