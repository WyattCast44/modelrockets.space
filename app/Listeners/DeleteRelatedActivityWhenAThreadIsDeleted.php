<?php

namespace App\Listeners;

use App\Events\ThreadDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteRelatedActivityWhenAThreadIsDeleted
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ThreadDeleted $event)
    {
        $event->thread->activity->each(function ($activity) {
            $activity->delete();
        });
    }
}
