<?php

namespace App\Listeners;

use Cloudder;
use App\Attachment;
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
        $publicIds = Attachment::where('attachable_id', $event->thread->id)
                    ->get()
                    ->pluck('vendor_id');
        
        Cloudder::destroyImages($publicIds->toArray());
    }
}
