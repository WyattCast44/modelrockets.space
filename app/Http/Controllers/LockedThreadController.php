<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;

class LockedThreadController extends Controller
{
    public function store(Board $board, Thread $thread)
    {
        $thread->lock();

        toast('Thread locked!', 'success', 'top');

        return back();
    }

    public function destroy(Board $board, Thread $thread)
    {
        $thread->unlock();

        toast('Thread unlocked!', 'success', 'top');

        return back();
    }
}
