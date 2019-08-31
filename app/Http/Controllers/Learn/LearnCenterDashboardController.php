<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;
use App\Playlist;
use App\Video;

class LearnCenterDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function __invoke()
    {
        $playlist = Playlist::first();

        $videos = $playlist->videos()
            ->orderBy('playlist_videos.order')
            ->get();
        
        return view('learn.index', [
            'playlist' => $playlist,
            'videos' => $videos
        ]);
    }
}
