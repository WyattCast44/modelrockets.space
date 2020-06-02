<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserGalleryController extends Controller
{
    public function index(User $user)
    {
        $attachments = $user->attachments()->paginate(2);

        return view('users.gallery.index', [
            'user' => $user,
            'attachments' => $attachments,
        ]);
    }
}
