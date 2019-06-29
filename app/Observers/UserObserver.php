<?php

namespace App\Observers;

use App\User;
use App\Mail\WelcomeEmail;
use App\Events\UserDeleted;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function created(User $user)
    {
        $user->profile()->create();

        $user->recordActivity('joined the community!');

        Mail::to($user)
            ->queue(new WelcomeEmail($user));
    }

    public function deleted(User $user)
    {
        event(new UserDeleted($user));
    }
}
