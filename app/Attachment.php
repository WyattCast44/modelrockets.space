<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

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
    public function getUrlSmallAttribute()
    {
        $filename = Arr::last(explode('/', $this->path));
        return "https://res.cloudinary.com/modelrocketspace/image/upload/c_fit,c_thumb,h_150,w_150/{$filename}";
    }

    public function getUrlMedAttribute()
    {
        $filename = Arr::last(explode('/', $this->path));
        return "https://res.cloudinary.com/modelrocketspace/image/upload/c_fit,c_thumb,h_500,w_500/{$filename}";
    }

    public function getUrlFullSizeAttribute()
    {
        $filename = Arr::last(explode('/', $this->path));
        return "https://res.cloudinary.com/modelrocketspace/image/upload/{$filename}";
    }

    public function getUrlAttribute()
    {
        return $this->path;
    }
}
