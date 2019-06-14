<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show(User $user, Request $request)
    {
        $this->authorize('view', $user);
        
        return view('users.show', ['user' => $user]);
    }
}
