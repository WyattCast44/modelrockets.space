<?php

namespace App\Http\Livewire\Features;

use App\Feature;
use Livewire\Component;

class Index extends Component
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
        ]);
    }

    public function openFeatures()
    {
        $features = Feature::public()
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
        $features = Feature::public()
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
