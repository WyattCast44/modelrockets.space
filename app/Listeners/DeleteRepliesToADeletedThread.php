<?php

namespace App\Listeners;

use App\Events\ReplyDeleted;
use App\Events\ThreadDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteRepliesToADeletedThread
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ThreadDeleted $event)
    {
        $thread = $event->thread;

        $replies = $thread->replies;

        if ($replies->count() <> 0) {
            $replies->each(function ($reply) {
                event(new ReplyDeleted($reply));
                $reply->delete();
            });
        }
    }
}
