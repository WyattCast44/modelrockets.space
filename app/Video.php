<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Relationships
     */
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_videos');
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
