<?php

namespace App;

use Illuminate\Mail\Markdown;
use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
