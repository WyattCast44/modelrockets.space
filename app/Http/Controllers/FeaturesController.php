<?php

namespace App\Http\Controllers;

use App\Feature;

class FeaturesController extends Controller
{
    public function index()
    {
        $openFeatures = Feature::public()
                            ->open()
                            ->latest()
                            ->with(['user.votes'])
                            ->withCount('votes')
                            ->get()
                            ->sortByDesc('votes_count');

        $closedFeatures = Feature::public()
                            ->closed()
                            ->latest()
                            ->with(['user.votes'])
                            ->withCount('votes')
                            ->get()
                            ->sortByDesc('votes_count');

        $userVotes = (auth()->check()) ? auth()->user()->votes->pluck('feature_id') : null;

        //dd($userVotes);

        return view('features.index', [
            'openFeatures' => $openFeatures,
            'closedFeatures' => $closedFeatures,
            'userVotes' => $userVotes
        ]);
    }
}
