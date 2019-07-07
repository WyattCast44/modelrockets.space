<?php

namespace App;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasAttachments;

    protected $guarded = [];

    /**
     * Relationships
     */
    public function class()
    {
        return $this->belongsTo(MotorClassification::class);
    }
    
    public function type()
    {
        return $this->belongsTo(MotorType::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Misc/Helpers
     */
    public function path($method = 'show', $absolute = true)
    {
        switch ($method) {
            case 'show':
                return route('data.motors.show', $this, $absolute);
                break;
            
            case 'index':
                return route('data.motors.index', [], $absolute);
                break;

            case 'edit':
                return route('data.motors.edit', $this, $absolute);
                break;
            
            default:
                return route('data.motors.show', $this, $absolute);
                break;
        }
    }
}
