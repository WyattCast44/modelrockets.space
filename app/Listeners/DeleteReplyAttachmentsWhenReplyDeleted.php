<?php

namespace App\Listeners;

use App\Events\ReplyDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteReplyAttachmentsWhenReplyDeleted
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ReplyDeleted $event)
    {
        $event->reply->attachments->each(function ($attachment) {
            $attachment->delete();
        });
    }
}
