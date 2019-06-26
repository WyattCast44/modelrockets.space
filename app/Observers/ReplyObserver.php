<?php

namespace App\Observers;

use App\Reply;
use App\Events\ReplyDeleted;
use App\Activity;

class ReplyObserver
{
    /**
    * Handle the thread "created" event.
    *
    * @param  \App\Reply  $reply
    * @return void
    */
    public function created(Reply $reply)
    {
        $reply->user->recordActivity('created');
    }
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
