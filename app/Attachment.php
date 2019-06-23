<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    protected $guarded = [];
    
    /**
     * Relationships
     */
    public function attachable()
    {
        return $this->morphTo();
    }

    /**
     * Accessors/Mutators
     */
    public function getUrlAttribute()
    {
        return Storage::url($this->path);
    }
}
