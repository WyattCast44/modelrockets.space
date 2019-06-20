<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded = [];

    public static $status = [
        'pending' => 'Pending',
        'in-progress' => 'In Progress',
        'complete' => 'Complete',
        'rejected' => 'Rejected',
    ];

    /**
     * Scopes
     */
    public function scopePublic($query)
    {
        return $query->where('public', true);
    }

    public function scopeOpen($query)
    {
        return $query
            ->where('status', 'pending')
            ->orWhere('status', 'in-progress');
    }

    public function scopeClosed($query)
    {
        return $query
            ->where('status', 'complete')
            ->orWhere('status', 'rejected');
    }

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->hasMany(FeatureVote::class);
    }

    /**
     * Misc/Helpers
     */
    public function hasUserVoted(User $user = null)
    {
        if (!$user) {
            if (auth()->check()) {
                $user = auth()->user();
            } else {
                return false;
            }
        }

        return ($this->votes->pluck('user_id')->contains($user->id));
    }
}
