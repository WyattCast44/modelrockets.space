<?php

namespace App;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Support\Str;
use App\Traits\Favoritable;
use Laravel\Scout\Searchable;
use Illuminate\Mail\Markdown;
use App\Traits\HasAttachments;
use App\Events\ArticlePublished;
use App\Interfaces\ActivityFeedable;
use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model implements Feedable, ActivityFeedable
{
    use Favoritable, HasAttachments, Sluggable, Actionable, Searchable;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * Actions/Behaviors/Abilities
     */
    public function publish()
    {
        $this->update([
            'published' => true,
            'published_at' => now(),
        ]);

        $this->user->recordActivity('published', $this);

        event(new ArticlePublished($this));

        return $this;
    }

    public function unpublish()
    {
        $this->update([
            'published' => false,
            'published_at' => null,
        ]);

        return $this;
    }

    public function createThread(): void
    {
        $board = Board::where('name', 'Article Discussions')->first();

        if ($board) {
            $thread = Thread::create([
                'user_id' => User::where('username', 'ArticlesBot')->first()->id,
                'board_id' => $board->id,
                'title' => $this->title,
                'body' => "This thread was opened by the Articles Bot (🤖) for discussion about the following article: <a href='{$this->path($this)}'>{$this->title}</a>",
                'open' => true,
            ]);
            
            $this->update([
                'thread_id' => $thread->id,
            ]);
        }
    }

    /**
     * Accessors/Mutators
     */
    public function getBodyAttribute($value)
    {
        if (request()->is('nova-api/*')) {
            return $value;
        }

        return Markdown::parse($value);
    }

    public function getExcerptAttribute()
    {
        return Str::limit($this->body, 512);
    }

    public function getActivityTitleAttribute()
    {
        return $this->title;
    }

    public function getActivityExcerptAttribute()
    {
        return $this->excerpt;
    }

    /**
     * Scopes
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /**
     * RSS Feed
     */
    public static function getFeedItems()
    {
        return self::published()->get();
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->path($this))
            ->title($this->title)
            ->summary('Subtitle: ' . $this->subtitle . ' Excerpt: ' . Str::limit($this->body, 512))
            ->updated($this->updated_at)
            ->link($this->path($this))
            ->author('@' . $this->user->username);
    }

    /**
     * Misc/Helpers
     */
    public function hasBeenUpdated()
    {
        return ($this->created_at == $this->updated_at);
    }

    public function path($method = 'index', $absolute = true)
    {
        switch ($method) {
            case 'index':
                return route('articles.index', [], $absolute);
                break;

            case 'show':
                return route('articles.show', $this, $absolute);
                break;
            
            case 'discuss':
                return route('threads.show', ['board' => $this->thread->board, 'thread' => $this->thread], $absolute);
                break;
            

            default:
                return route('articles.index', [], $absolute);
                break;
        }
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
