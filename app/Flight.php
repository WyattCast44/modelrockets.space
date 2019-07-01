<?php

namespace App;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasAttachments;

    protected $guarded = [];
    
    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
