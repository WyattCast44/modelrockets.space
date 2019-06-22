<?php

namespace App\Http\Controllers;

use App\Board;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Stevebauman\Purify\Facades\Purify;
use Spatie\Honeypot\ProtectAgainstSpam;

class ThreadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
        
        $this->middleware(ProtectAgainstSpam::class)->only(['store']);
    }

    public function create(Board $board)
    {
        if (!$board->allow_new_public_threads) {
            alert()->warning('This board is closed to new threads.');

            return back();
        }
        
        return view('forum.threads.create', [
            'board' => $board,
        ]);
    }

    public function show(Board $board, Thread $thread)
    {
        if (!$board->public) {
            alert()->warning('This board is private.');

            return back();
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

    public function store(Board $board, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $body = Markdown::parse(trim(Purify::clean($request->body)));

        if (strlen($body) == 0) {
            alert()->warning('Your post must have content.');

            return back();
        }

        $thread = $board->threads()->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $body,
            'open' => true,
        ]);

        return redirect()->route('threads.show', ['board' => $board, 'thread' => $thread]);
    }
}
