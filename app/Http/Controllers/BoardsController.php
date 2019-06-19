<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardsController extends Controller
{
    public function show(Board $board)
    {
        $threads = $board->threads()->latest()->get();

        return view('forum.boards.show', [
            'board' => $board,
            'threads' => $threads,
        ]);
    }
}
