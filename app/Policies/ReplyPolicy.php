<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    public function favorite(User $auth, Reply $reply)
    {
        if ($auth === null) {
            return false;
        }

        if ($reply->user <> $auth) {
            return true;
        }

        return false;
    }
}
