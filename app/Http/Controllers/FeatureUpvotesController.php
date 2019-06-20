<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;

class FeatureUpvotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Feature $feature)
    {
        if (!$feature->hasUserVoted()) {
            $feature->upvote();
        }
        
        return back();
    }
}
