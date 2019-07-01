<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;
use App\Reply;

class ReplyFavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Board $board, Thread $thread, Reply $reply)
    {
        $this->authorize('favorite', $reply);

        $reply->favorite();

        toast('Reply favorited!', 'success', 'top');

        return back();
    }
}
