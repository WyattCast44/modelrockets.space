<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $guarded = [];
    
    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
