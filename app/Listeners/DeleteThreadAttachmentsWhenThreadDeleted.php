<?php

namespace App\Listeners;

use App\Attachment;
use App\Events\ThreadDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class DeleteThreadAttachmentsWhenThreadDeleted implements ShouldQueue
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
    public function handle(ThreadDeleted $event)
    {
        $paths = Attachment::where('attachable_id', $event->thread->id)
                    ->get()
                    ->pluck('path');
        Storage::delete($paths->toArray());
    }
}
