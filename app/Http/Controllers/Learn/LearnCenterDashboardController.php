<?php

namespace App\Http\Controllers\Learn;

use App\Playlist;
use App\Http\Controllers\Controller;

class LearnCenterDashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('admin');
    }

    public function __invoke()
    {
        $playlists = Playlist::published()
            ->featured()
            ->take(3)
            ->get();

        return view('learn.index', [
            'featuredPlaylists' => $playlists,
        ]);
    }
}
