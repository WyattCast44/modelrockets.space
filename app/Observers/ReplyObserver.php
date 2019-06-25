<?php

namespace App\Observers;

use App\Reply;
use App\Events\ReplyDeleted;

class ReplyObserver
{
    /**
     * Handle the thread "deleted" event.
     *
     * @param  \App\Reply  $reply
     * @return void
     */
    public function deleting(Reply $reply)
    {
        event(new ReplyDeleted($reply));
    }
}
