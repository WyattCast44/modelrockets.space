<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only('update');
    }

    public function index()
    {
        $users = User::public()
            ->paginate(15);
        
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user, Request $request)
    {
        $this->authorize('view', $user);
        
        return view('users.show', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        if (auth()->user() <> $user) {
            return abort(403);
        }

        $this->validate($request, [
            'email' => 'required|email',
            'username' => 'required|string',
            'tagline' => 'nullable|string'
        ]);

        $user->update([
            'email' => $request->email,
            'username' => $request->username,
        ]);

        $user->profile->update([
            'tagline' => $request->tagline,
        ]);

        alert()->success('Success', 'Your profile has been updated!');

        return back();
    }
}
