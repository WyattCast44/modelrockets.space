<?php

namespace App\Http\Controllers;

use Purify;
use App\Reply;
use App\Board;
use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }

    public function create(Board $board, Thread $thread)
    {
        return view('forum.replies.create', [
            'board' => $board,
            'thread' => $thread
        ]);
    }

    public function store(Board $board, Thread $thread, Request $request)
    {
        $this->validate($request, [
            'body' => 'required|string|min:3'
        ]);

        $body = trim(Purify::clean($request->body));

        if (strlen($body) < 3) {
            return back();
        }

        Reply::create([
            'user_id' => auth()->user()->id,
            'thread_id' => $thread->id,
            'body' => Purify::clean($request->body)
        ]);

        return redirect($thread->path());
    }
}
