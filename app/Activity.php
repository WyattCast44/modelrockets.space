<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function subject()
    {
        return $this->morphTo('subject');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessors/Mutators
     */
    public function getDayAttribute()
    {
        return (string) $this->updated_at->day;
    }

    public function getMonthAttribute()
    {
        return (string) $this->updated_at->englishMonth;
    }
}
