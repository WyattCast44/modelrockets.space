<?php

namespace App\Http\Livewire\Features;

use App\Feature;
use Livewire\Component;

class FeatureIndex extends Component
{
    public function upvote($featureId)
    {
        $feature = Feature::findOrFail($featureId);

        $feature->upvote();
    }

    public function render()
    {
        return view('livewire.features.index', [
            'openFeatures' => $this->openFeatures(),
            'closedFeatures' => $this->closedFeatures(),
            'userVotes' => $this->userVotes(),
        ])->extends('layouts.app')->section('content');
    }

    public function openFeatures()
    {
        $features = Feature::query()
            ->public()
            ->open()
            ->latest()
            ->with(['user.votes'])
            ->withCount('votes')
            ->get()
            ->sortByDesc('votes_count');

        return $features;
    }

    public function closedFeatures()
    {
        $features = Feature::query()
            ->public()
            ->closed()
            ->latest()
            ->with(['user.votes'])
            ->withCount('votes')
            ->get()
            ->sortByDesc('votes_count');

        return $features;
    }

    public function userVotes()
    {
        $userVotes = (auth()->check()) ? auth()->user()->votes->pluck('feature_id') : null;

        return $userVotes;
    }
}
