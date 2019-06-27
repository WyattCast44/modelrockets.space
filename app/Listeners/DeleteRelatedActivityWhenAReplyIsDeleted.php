<?php

namespace App\Listeners;

use App\Events\ReplyDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteRelatedActivityWhenAReplyIsDeleted
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ReplyDeleted $event)
    {
        $event->reply->activity->each(function ($activity) {
            $activity->delete();
        });
    }
}
