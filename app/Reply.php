<?php

namespace App;

use Illuminate\Mail\Markdown;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAttachments;

class Reply extends Model
{
    use HasAttachments;
    
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
    public function replies()
    {
        return $this->hasMany(Reply::class, 'parent_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
