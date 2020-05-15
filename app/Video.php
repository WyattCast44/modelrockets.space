<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Video extends Model
{
    use Searchable;

    public $casts = [
        'published_at' => 'date',
    ];

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
     * Scout
     */
    public function searchableAs()
    {
        if (app()->environment('production')) {
            return 'videos_index';
        }

        return 'video_index_dev';
    }

    public function shouldBeSearchable()
    {
        return $this->published;
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    /**
     * Misc
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
