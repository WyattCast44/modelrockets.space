<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function type()
    {
        return $this->belongsTo(MotorType::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
