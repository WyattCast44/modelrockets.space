<?php

namespace App\Observers;

use App\Thread;
use App\Events\ThreadDeleted;

class ThreadObserver
{
    public function deleted(Thread $thread)
    {
        //       event(new ThreadDeleted($thread));
    }
}
