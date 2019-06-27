<?php

namespace App\Http\Controllers;

use App\Board;
use App\Thread;

class LockedThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Board $board, Thread $thread)
    {
        if (auth()->id() <> $thread->user_id) {
            abort(403);
        }

        $thread->lock();

        toast('Thread locked!', 'success', 'top');

        return back();
    }

    public function destroy(Board $board, Thread $thread)
    {
        if (auth()->id() <> $thread->user_id) {
            abort(403);
        }
        
        $thread->unlock();

        toast('Thread unlocked!', 'success', 'top');

        return back();
    }
}
