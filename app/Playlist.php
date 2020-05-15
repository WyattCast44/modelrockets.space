<?php

namespace App;

use Illuminate\Support\Str;
use App\Traits\Subscribable;
use App\Events\PlaylistPublished;
use App\Interfaces\ActivityFeedable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Playlist extends Model implements ActivityFeedable
{
    use Subscribable, Searchable;

    protected $guarded = [];
    
    protected $casts = [
        'published_at' => 'date'
    ];

    /**
     * Relationships
     */
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

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
     * Accessors, Mutators
     */
    public function getPublishedAttribute()
    {
        return ($this->published_at <> null) ? true : false;
    }

    public function getImageUrlAttribute()
    {
        return ($this->image <> null) ? Storage::url($this->image) : Storage::url('playlist.png');
    }

    public function getExcerptAttribute()
    {
        return Str::limit($this->description, 255);
    }

    public function getActivityTitleAttribute()
    {
        return $this->name;
    }

    public function getActivityExcerptAttribute()
    {
        return $this->excerpt;
    }

    /**
     * Scout
     */
    public function searchableAs()
    {
        if (app()->environment('production')) {
            return 'playlists_index';
        }

        return 'playlists_index_dev';
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
