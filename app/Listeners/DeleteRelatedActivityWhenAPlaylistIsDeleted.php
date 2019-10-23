<?php

namespace App\Listeners;

use App\Events\PlaylistDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteRelatedActivityWhenAPlaylistIsDeleted
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PlaylistDeleted $event)
    {
        $event->playlist->activity->each(function ($activity) {
            $activity->delete();
        });
    }
}
