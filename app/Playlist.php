<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $guarded = [];
    
    /**
     * Relationships
     */
    public function videos()
    {
        return $this->belongsToMany(Video::class, 'playlist_videos')
                ->withPivot('order');
    }

    /**
     * Actions, abilities, behavior
     */
    public function publish()
    {
        return $this->update([
            'published_at' => now(),
        ]);
    }

    public function unpublish()
    {
        return $this->update([
            'published_at' => null,
        ]);
    }

    /**
     * Accessors, mutators
     */
    public function getPublishedAttribute()
    {
        return ($this->published_at) ? true : false;
    }

    /**
     * Misc
     */
}
