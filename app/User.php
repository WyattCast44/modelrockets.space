<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Behavior/Actions
     */
    public function makePrivate()
    {
        $this->update(['public' => false]);

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
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    /**
     * Accessors/Mutators
     */
    public function getGravatarAttribute()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=75';
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
    public function path($user = null, $absolute)
    {
        if (!$user) {
            return route('users.index', [], $absolute);
        }

        return route('users.show', $user, $absolute);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
