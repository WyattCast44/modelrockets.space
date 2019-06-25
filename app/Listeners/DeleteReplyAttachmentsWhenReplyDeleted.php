<?php

namespace App\Listeners;

use App\Attachment;
use App\Events\ReplyDeleted;
use JD\Cloudder\Facades\Cloudder;
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
        $publicIds = Attachment::where('attachable_id', $event->reply->id)
                    ->get()
                    ->pluck('vendor_id');

        if ($publicIds->count() <> 0) {
            Cloudder::destroyImages($publicIds->toArray());
        }
    }
}
