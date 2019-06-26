<?php

namespace App\Observers;

use App\Thread;
use App\Events\ThreadDeleted;
use App\Activity;

class ThreadObserver
{
    /**
     * Handle the thread "created" event.
     *
     * @param  \App\Thread  $thread
     * @return void
     */
    public function created(Thread $thread)
    {
        Activity::create([
            'user_id' => $thread->user->id,
            'method' => 'create'
        ]);
    }

    /**
     * Handle the thread "updated" event.
     *
     * @param  \App\Thread  $thread
     * @return void
     */
    public function updated(Thread $thread)
    {
        //
    }

    /**
     * Handle the thread "deleted" event.
     *
     * @param  \App\Thread  $thread
     * @return void
     */
    public function deleting(Thread $thread)
    {
        event(new ThreadDeleted($thread));
    }
}
