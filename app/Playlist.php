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
        return $this->belongsToMany(Video::class, 'playlist_videos');
    }
}
