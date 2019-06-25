<?php

namespace App;

use App\Reply;
use Laravel\Scout\Searchable;
use Illuminate\Mail\Markdown;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAttachments;

class Thread extends Model
{
    use HasAttachments, Searchable;
    
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
     * Mutators/Accessors
     */
    public function setBodyAttribute($body)
    {
        $this->attributes['body'] =  Markdown::parse(trim(Purify::clean($body)));
    }

    /**
     * Misc
     */
    public function repliesPath($method = 'create', $parentId = null)
    {
        return route("replies.{$method}", [
            'board' => $this->board,
            'thread' => $this,
            'parentId' => $parentId
        ]);
    }

    public function path($absolute = false)
    {
        return route('threads.show', [
            'board' => $this->board,
            'thread' => $this,
        ], $absolute);
    }
}
