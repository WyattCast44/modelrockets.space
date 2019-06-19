<?php

namespace App;

use App\Reply;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];
    
    /**
     * Behavior/Actions
     */
    public function getBestReply()
    {
        if ($this->best_answer_thread_id) {
            return Reply::find($this->best_answer_thread_id);
        }
        
        return null;
    }

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
    public function repliesPath()
    {
        return route('replies.create', [
            'board' => $this->board,
            'thread' => $this
        ]);
    }

    public function path()
    {
        return route('threads.show', [
            'board' => $this->board,
            'thread' => $this,
        ]);
    }
}
