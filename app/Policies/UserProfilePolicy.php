<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserProfilePolicy
{
    use HandlesAuthorization;

    public function before(User $auth)
    {
        if ($auth->superAdmin) {
            return true;
        }
    }

    public function create(User $user)
    {
        return true;
    }

    public function view(User $auth, User $user)
    {
        return true;
    }

    public function update(User $auth, User $user)
    {
        if ($auth->id === $user->id) {
            return true;
        }

        return false;
    }

    public function delete(User $auth, User $user)
    {
        if ($auth->id === $user->id) {
            return true;
        }

        return false;
    }

    public function forceDelete(User $auth, User $user)
    {
        if ($auth->superAdmin) {
            return true;
        }

        return false;
    }

    public function restore(User $auth, User $user)
    {
        if ($auth->superAdmin) {
            return true;
        }

        return false;
    }
}
