<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaylistVideosController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
}
