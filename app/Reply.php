<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Mail\Markdown;
use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Facades\Purify;

class Reply extends Model
{
    use HasAttachments;
    
    protected $guarded = [];

    /**
     * Activity/Behavior/Abilites
     */
    public function favorite(User $user = null)
    {
        if ($user === null) {
            $user = auth()->user();
        }
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

    public function getExcerptAttribute()
    {
        return Str::limit($this->body, 256);
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = Markdown::parse(trim(Purify::clean($value)));
    }

    public function getActivityTitleAttribute()
    {
        return $this->thread->activity_title;
    }

    /**
     * Relationships
     */
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class, 'parent_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Misc/Helpers
     */
    public function path($method = 'show', $absolute = true)
    {
        switch ($method) {
            case 'show':
                return $this->thread->path('show');
                break;
            
            default:
                return $this->thread->path('show');
                break;
        }
    }
}
