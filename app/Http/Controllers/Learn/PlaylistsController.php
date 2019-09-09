<?php

namespace App\Http\Controllers\Learn;

use App\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaylistsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function show(Playlist $playlist)
    {
        $playlist->load('videos');

        $mainVideo = $playlist->videos->first();

        return view('learn.playlists.index', [
            'playlist' => $playlist,
        ]);

        return view('learn.playlists.show', [
            'playlist' => $playlist,
            'vidoes' => $playlist->videos,
            'mainVideo' => $mainVideo
        ]);
    }
}
