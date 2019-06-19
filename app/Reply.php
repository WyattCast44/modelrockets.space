<?php

namespace App;

use Illuminate\Mail\Markdown;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    
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

    /**
     * Relationships
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
