<?php

namespace App\Traits;

use App\User;

trait Favoritable
{
    public function favorite(User $user = null)
    {
        if ($user === null) {
            $user = auth()->user();
        }

        $user->recordActivity('favorited', $this);

        $user->addFavorite($this);

        return true;
    }

    public function unfavorite(User $user = null)
    {
        if ($user === null) {
            $user = auth()->user();
        }

        $user->removeFavorite($this);

        return true;
    }
}
