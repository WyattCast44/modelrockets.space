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

        $user->load(['activity', 'profile']);
        
        $activityGroups = $user->activity->groupBy(function ($activity) {
            return $activity->updated_at->format('d | M');
        });

        //  dd($activityGroups);

        return view('users.show', ['user' => $user, 'activityGroups' => $activityGroups]);
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
            'signature' => 'nullable|string|max:512'
            
        ]);

        $user->update([
            'email' => $request->email,
            'username' => $request->username,
        ]);

        if ($request->has('public')) {
            $user->update([
                'public' => true,
            ]);
        } else {
            $user->update([
                'public' => false,
            ]);
        }

        $user->profile->update([
            'tagline' => $request->tagline,
            'signature' => $request->signature
        ]);

        toast('Your profile has been updated!', 'success', 'top');

        return redirect()->route('users.show', $user);
    }
}
