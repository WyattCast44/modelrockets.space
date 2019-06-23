<?php

namespace App\Observers;

use App\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function created(User $user)
    {
        $user->profile()->create();

        Mail::to($user)
            ->queue(new WelcomeEmail($user));
    }
}
