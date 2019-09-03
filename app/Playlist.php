<?php

namespace App;

use App\Events\PlaylistPublished;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'published_at' => 'date'
    ];

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
        event(new PlaylistPublished($this));
            
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
     * Scopes
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Misc
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function path($method = 'show', $absolute = true)
    {
        switch ($method) {
            case 'index':
                return route('learn.index', [], $absolute);
                break;

            case 'show':
                return route('learn.playlists.show', $this, $absolute);
                break;
        
            default:
                return route('learn.playlists.show', $this, $absolute);
                break;
        }
    }
}
