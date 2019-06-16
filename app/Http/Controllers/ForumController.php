<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function __invoke()
    {
        return view('forum.index');
    }
}
