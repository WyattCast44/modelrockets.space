<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $guarded = [];

    protected $baseUrl = 'https://res.cloudinary.com/modelrocketspace/image/upload';
    
    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function attachable()
    {
        return $this->morphTo();
    }

    /**
     * Accessors/Mutators
     */
    public function getFilenameAttribute()
    {
        return $this->vendor_id;
    }

    // public function getUrlRawAttribute()
    // {
    //     return "{$this->baseUrl}/{$this->filename}";
    // }

    public function getUrlRawAttribute()
    {
        return "{$this->baseUrl}/q_50,w_900,h_500,c_pad/{$this->filename}";
    }

    public function getUrlThumbnailAttribute()
    {
        return "{$this->baseUrl}/c_fit,c_thumb,h_50,w_50/{$this->filename}";
    }
}
