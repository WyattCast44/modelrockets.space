<?php

namespace App;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Mail\Markdown;
use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model implements Feedable
{
    use Sluggable, Actionable;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function getBodyAttribute($value)
    {
        if (request()->is('nova-api/*')) {
            return $value;
        }

        return Markdown::parse($value);
        return (new \ParsedownExtra)->text($value);
    }

    public function path($article = null)
    {
        if ($article) {
            return route('articles.show', $article, false);
        }

        return route('articles.index', [], false);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public static function getFeedItems()
    {
        return self::published()->get();
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->path($this))
            ->title($this->title)
            ->summary($this->subtitle)
            ->updated($this->updated_at)
            ->link($this->path($this))
            ->author($this->user->username);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
