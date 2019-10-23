<?php

namespace App\Http\Controllers\Learn;

use App\Video;
use App\Playlist;
use App\Http\Controllers\Controller;

class PlaylistVideosController extends Controller
{
    public function __construct()
    {
        //
    }

    public function show(Playlist $playlist, Video $video)
    {
        if (!$playlist->published) {
            toast('This playlist has not be published yet!', 'error', 'top');

            return redirect()->route('learn.index');
        }
        $playlist->load('videos');

        return view('learn.playlists.show', [
            'playlist' => $playlist,
            'vidoes' => $playlist->videos,
            'mainVideo' => $video,
        ]);
    }
}
