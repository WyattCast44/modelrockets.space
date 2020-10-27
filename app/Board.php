<?php

namespace App;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Board extends Model implements Feedable
{
    use Sluggable, Searchable;

    protected $guarded = [];

    /**
     * Abilities/Actions
     */
    public function close()
    {
        $this->update([
            'allow_new_public_threads' => false,
        ]);

        return $this;
    }

    public function makePrivate($password)
    {
        $this->update([
            'public' => false,
            'password' => $password,
        ]);

        return $this;
    }

    public function makePublic($password)
    {
        if ($password <> $this->password) {
            throw new \Exception("The given password did not match the stored password, please try again.", 1);

            return;
        }

        $this->update(['public' => true]);

        return $this;
    }

    /**
     * Relationships
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessors/Mutators
     */
    public function getPasswordAttribute($value)
    {
        return $value ? decrypt($value, false) : '';
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = encrypt($value, false);
    }

    public function getMetaAttribute($value)
    {
        return json_decode($value);
    }

    public function setMetaAttribute($value)
    {
        $this->attributes['meta'] = json_encode($value);
    }

    /**
     * Scopes
     */
    public function scopePublic($query)
    {
        return $query->where('public', true);
    }

    /**
     * RSS Feed
     */
    public static function getFeedItems()
    {
        return self::public()->get();
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->path($this))
            ->title($this->name)
            ->summary($this->description)
            ->updated($this->updated_at)
            ->link($this->path($this))
            ->author('Model Rockets Space!');
    }

    /**
     * Scout
     */
    public function searchableAs()
    {
        if (app()->environment('production')) {
            return 'boards_index';
        }

        return 'boards_index_dev';
    }

    /**
     * Misc/Helpers
     */
    public function path($method = 'show', $absolute = true)
    {
        switch ($method) {
            case 'index':
                return route('forum.index', [], $absolute);
                break;

            case 'show':
                return route('boards.show', $this, $absolute);
                break;

            case 'create-thread':
                return route('threads.create', $this, $absolute);
                break;

            case 'store-thread':
                return route('threads.store', $this, $absolute);
                break;

            case 'rss':
                return url('/rss/forum/boards', [], false);
                break;

            default:
                return route('boards.show', $this, $absolute);
                break;
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
