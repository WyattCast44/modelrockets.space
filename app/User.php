<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Searchable;

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
    public function addFavorite($item)
    {
        $this->favorites()->create([
            'favoritable_id' => $item->id,
            'favoritable_type' => get_class($item),
        ]);

        return $this;
    }

    public function removeFavorite($item)
    {
        $favorite = Favorite::where('user_id', $this->id)
            ->where('favoritable_id', $item->id)
            ->first();

        $favorite->delete();

        return $this;
    }

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

    public function recordActivity($type, $subject = null)
    {
        $this->activity()->create([
            'method' => $type,
            'subject_id' => ($subject <> null) ? $subject->id : null,
            'subject_type' => ($subject <> null) ? get_class($subject) : null,
        ]);

        return $this;
    }

    /**
     * Relationships
     */
    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function flights()
    {
        return $this->hasMany(Flight::class)->orderByDesc('date');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
    public function votes()
    {
        return $this->hasMany(FeatureVote::class);
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
     * Was the member created within the last 5 days
     * @return bool
     */
    public function getNewMemberAttribute()
    {
        return ($this->created_at > now()->subDays(5)) ? true : false;
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
    public function path($method = 'index', $absolute = true)
    {
        switch ($method) {
            case 'index':
                return route('users.index', [], $absolute);
                break;

            case 'show':
                return route('users.show', $this, $absolute);
                break;
            
            default:
                # code...
                break;
        }
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
