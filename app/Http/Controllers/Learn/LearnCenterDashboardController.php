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
        $playlists = Playlist::with('videos')->get();
        
        return view('learn.index', [
            'playlists' => $playlists
        ]);
    }
}
