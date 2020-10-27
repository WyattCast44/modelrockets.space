<?php

namespace App\Http\Livewire\Threads;

use App\Board;
use Livewire\Component;

class ThreadCreate extends Component
{
    public function render()
    {
        return view('forum.threads.create', [
            'board' => Board::first(),
        ]);
    }
}
