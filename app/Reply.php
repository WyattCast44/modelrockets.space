<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    
    /**
     * Relationships
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
