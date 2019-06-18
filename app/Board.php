<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Board extends Model
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
