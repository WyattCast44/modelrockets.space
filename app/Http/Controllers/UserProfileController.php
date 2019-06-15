<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
    }
}
