<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;
use App\Video;

class LearnCenterDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function __invoke()
    {
        $videos = Video::all();

        return view('learn.index', [
            'videos' => $videos
        ]);
    }
}
