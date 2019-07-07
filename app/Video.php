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
        return $this->belongsToMany(Playlist::class);
    }
}
