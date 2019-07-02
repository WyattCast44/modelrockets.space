<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function motors()
    {
        return $this->hasMany(Motor::class);
    }
}
