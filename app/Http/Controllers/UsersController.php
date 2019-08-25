<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Rules\AllowedUsername;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('update');
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

        $user->load(['activity', 'profile']);
        
        $activityGroups = $user->activity->groupBy(function ($activity) {
            return $activity->updated_at->format('d M y');
        });

        return view('users.show', ['user' => $user, 'activityGroups' => $activityGroups]);
    }

    public function update(User $user, Request $request)
    {
        if (auth()->user() <> $user) {
            return abort(403);
        }

        $user->update([
            'email' => $request->email,
            'username' => $request->username,
            'public' => ($request->has('public')) ? true : false,
        ]);

        $user->profile->update([
            'tagline' => $request->tagline,
            'signature' => $request->signature
        ]);

        toast('Your profile has been updated!', 'success', 'top');

        return redirect()->route('users.show', $user);
    }
}
