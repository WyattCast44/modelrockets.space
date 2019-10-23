<?php

namespace App\Observers;

use App\Playlist;
use App\Events\PlaylistDeleted;

class PlaylistObserver
{
    /**
     * Handle the thread "deleted" event.
     *
     * @param  \App\Reply  $reply
     * @return void
     */
    public function deleting(Playlist $playlist)
    {
        event(new PlaylistDeleted($playlist));
    }
}
