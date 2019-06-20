<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UpdateUserRequest;
use App\Rules\AllowedUsername;

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
            ->orderBy('username')
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
            'tagline' => 'nullable|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id)
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                'alpha_num',
                new AllowedUsername,
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            
        ]);

        $user->update([
            'email' => $request->email,
            'username' => $request->username,
        ]);

        $user->profile->update([
            'tagline' => $request->tagline,
        ]);

        alert()->success('Success', 'Your profile has been updated!');

        return redirect()->route('users.show', $user);
    }
}
