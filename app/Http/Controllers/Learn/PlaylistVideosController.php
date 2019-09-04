<?php

namespace App\Http\Controllers\Learn;

use App\Video;
use App\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaylistVideosController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show(Playlist $playlist, Video $video)
    {
        $playlist->load('videos');

        return view('learn.playlists.show', [
            'playlist' => $playlist,
            'vidoes' => $playlist->videos,
            'mainVideo' => $video,
        ]);
    }
}
