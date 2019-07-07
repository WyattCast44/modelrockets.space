<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    /**
     * Relationships
     */
    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }
}
