<?php

namespace App;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Laravel\Scout\Searchable;
use Illuminate\Mail\Markdown;
use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Article extends Model implements Feedable
{
    use Sluggable, Actionable, Searchable;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * Actions/Behaviors/Abilities
     */
    public function publish()
    {
        $this->update([
            'published' => true,
            'published_at' => now(),
        ]);

        return $this;
    }

    public function unpublish()
    {
        $this->update([
            'published' => false,
            'published_at' => null,
        ]);

        return $this;
    }

    /**
     * Accessors/Mutators
     */
    public function getBodyAttribute($value)
    {
        if (request()->is('nova-api/*')) {
            return $value;
        }

        return Markdown::parse($value);
    }

    /**
     * Scopes
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /**
     * RSS Feed
     */
    public static function getFeedItems()
    {
        return self::published()->get();
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->path($this))
            ->title($this->title)
            ->summary('Subtitle: ' . $this->subtitle . ' Excerpt: ' . Str::limit($this->body, 512))
            ->updated($this->updated_at)
            ->link($this->path($this))
            ->author('@' . $this->user->username);
    }

    /**
     * Misc/Helpers
     */
    public function hasBeenUpdated()
    {
        return ($this->created_at == $this->updated_at);
    }

    public function path($article = null, $absolute = false)
    {
        if ($article) {
            return route('articles.show', $article, $absolute);
        }

        return route('articles.index', [], $absolute);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
