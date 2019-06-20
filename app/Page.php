<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    /**
     * Scopes
     */
    public function scopePublic($query)
    {
        return $query->where('public', true);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
