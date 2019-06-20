<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureVote extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
