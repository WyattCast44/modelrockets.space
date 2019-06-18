<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];
    
    /**
     * Relationships
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * Misc
     */
    public function path()
    {
        return route('threads.show', [
            'board' => $this->board,
            'thread' => $this,
        ]);
    }
}
