<?php

namespace App;

use App\Reply;
use Illuminate\Support\Str;
use App\Traits\Favoritable;
use Laravel\Scout\Searchable;
use Illuminate\Mail\Markdown;
use App\Traits\HasAttachments;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use Favoritable, HasAttachments, Searchable;
    
    protected $guarded = [];
    
    /**
     * Behavior/Actions
     */
    public function lock()
    {
        $this->update([
            'open' => false,
        ]);

        return $this;
    }

    public function unlock()
    {
        $this->update([
            'open' => true,
        ]);

        return $this;
    }

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
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

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
    public function getExcerptAttribute()
    {
        return Str::limit($this->body, 256);
    }

    public function setBodyAttribute($body)
    {
        $this->attributes['body'] =  Markdown::parse(trim(Purify::clean($body)));
    }

    public function getActivityTitleAttribute()
    {
        return $this->title;
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
