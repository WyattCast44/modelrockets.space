<?php

namespace App\Listeners;

use App\Events\ThreadDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteThreadAttachmentsWhenThreadDeleted implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ThreadDeleted $event)
    {
        $event->thread->attachments->each(function ($attachment) {
            $attachment->delete();
        });
    }
}
