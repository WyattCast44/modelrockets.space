<?php

namespace App\Http\Controllers\Learn;

use App\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaylistsController extends Controller
{
    public function show(Playlist $playlist)
    {
        $playlist->load('videos');

        return view('learn.playlists.show', [
            'playlist' => $playlist,
            'vidoes' => $playlist->videos,
        ]);
    }
}
