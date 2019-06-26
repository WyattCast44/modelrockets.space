<?php

namespace App\Http\Controllers;

use App\Board;

class BoardsController extends Controller
{
    public function show(Board $board)
    {
        if (!$board->public) {
            return abort(403);
        }

        $threads = $board->threads()
                        ->latest()
                        ->get();

        return view('forum.boards.show', [
            'board' => $board,
            'threads' => $threads,
        ]);
    }
}
