<?php

namespace App\Http\Controllers\Learn;

use App\Playlist;
use App\Http\Controllers\Controller;

class LearnCenterDashboardController extends Controller
{
    public function __invoke()
    {
        $playlists = Playlist::published()
            ->featured()
            ->with(['videos'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('learn.index', [
            'featuredPlaylists' => $playlists,
        ]);
    }
}
