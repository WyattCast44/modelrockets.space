<?php

namespace App\Traits;

use App\User;
use App\Subscription;

trait Subscribable
{
    public function subscriptions()
    {
        return $this->morphMany(Subscription::class, 'subscribable');
    }
    
    public function subscribe(User $user = null)
    {
        if ($user === null) {
            $user = auth()->user();
        }

        $user->recordActivity('subscribed to', $this);

        $this->subscriptions()->create([
            'user_id' => $user->id,
        ]);

        return true;
    }

    public function unsubscribe(User $user = null)
    {
        if ($user === null) {
            $user = auth()->user();
        }

        $this->subscriptions()->delete([
            'user_id' => $user->id,
        ]);

        return true;
    }
}
