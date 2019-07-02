<?php

namespace App;

use Illuminate\Support\Str;
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
    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessors/Mutators
     */
    public function getExcerptAttribute()
    {
        return Str::limit($this->description, 255);
    }

    public function getActivityTitleAttribute()
    {
        return 'Check it out!';
    }

    public function getActivityExcerptAttribute()
    {
        return $this->excerpt;
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
            
            case 'create':
                return route('flights.create', $this->user, $absolute);
                break;
            
            default:
                return route('flights.show', ['user' => $this->user, 'flight' => $this], $absolute);
                break;
        }
    }
}
