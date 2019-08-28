<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;

class LearnCenterDashboardController extends Controller
{
    public function __invoke()
    {
        return view('learn.index');
    }
}
