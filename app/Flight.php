<?php

namespace App;

use App\Traits\HasAttachments;
use App\Interfaces\ActivityFeedable;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model implements ActivityFeedable
{
    use HasAttachments;

    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime',
    ];
    
    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessors/Mutators
     */
    public function getActivityTitleAttribute()
    {
        return 'Check it out!';
    }

    public function getActivityExcerptAttribute()
    {
        return "{$this->user->username} flew {$this->rocket} on {$this->date->toFormattedDateString()}";
    }

    /**
     * Misc/Helpers
     */
    public function path($method = 'show', $absolute = true)
    {
        switch ($method) {
            case 'show':
                return route('flights.show', ['user' => $this->user, 'flight' => $this], $absolute);
                break;

            case 'index':
                return route('flights.index', $this->user, $absolute);
                break;
            
            default:
                return route('flights.show', ['user' => $this->user, 'flight' => $this], $absolute);
                break;
        }
    }
}
