<?php

namespace App;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Board extends Model implements Feedable
{
    use Sluggable;

    protected $guarded = [];

    /**
     * Abilities/Actions
     */
    public function makePrivate($password)
    {
        $this->update([
            'public' => false,
            'password' => $password,
        ]);

        return $this;
    }

    public function makePublic()
    {
        $this->update(['public' => true]);

        return $this;
    }

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
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
     * Misc
     */

    public function path($board = null, $absolute = false)
    {
        if ($board) {
            return route('boards.show', $board, $absolute);
        }

        return route('boards.index', [], $absolute);
    }

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
