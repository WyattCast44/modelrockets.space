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

        $thread->load(['user']);

        $replies = $thread->replies()->paginate(10);

        return view('forum.threads.show', [
            'board' => $board,
            'thread' => $thread,
            'replies' => $replies,
            'bestReply' => $thread->getBestReply()
        ]);
    }
}
