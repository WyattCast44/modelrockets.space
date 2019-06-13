<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Nova\Actions\Actionable;

class Article extends Model
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


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
