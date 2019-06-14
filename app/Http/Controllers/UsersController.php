<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::public()->get();
        
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user, Request $request)
    {
        $this->authorize('view', $user);
        
        return view('users.show', ['user' => $user]);
    }
}
