<?php

namespace App\Observers;

use App\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Events\UserDeleted;

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
