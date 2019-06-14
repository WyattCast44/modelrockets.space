<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $auth)
    {
        if ($auth->superAdmin) {
            return true;
        }

        return false;
    }

    public function create(User $auth)
    {
        if ($auth->superAdmin) {
            return true;
        }

        return false;
    }

    public function view(?User $auth, User $user)
    {
        if ($user->public) {
            return true;
        }

        return false;
    }

    public function update(?User $auth, User $user)
    {
        if ($auth && $auth->id === $user->id) {
            return true;
        }
        
        return false;
    }
}
