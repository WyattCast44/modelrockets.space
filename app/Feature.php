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
     * Behavior/Actions/Abilities
     */
    
    public function upvote(User $user = null)
    {
        if (!$user) {
            $user = auth()->user();
        }

        $this->votes()->firstOrCreate([
            'user_id' => $user->id,
        ]);

        return $this;
    }

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
}
