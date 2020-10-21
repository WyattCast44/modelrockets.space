<?php

namespace App\Domain\Blog\Models;

use App\User;
use App\Board;
use App\Thread;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use App\Traits\Favoritable;
use Illuminate\Support\Str;
use Illuminate\Mail\Markdown;
use Laravel\Scout\Searchable;
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
                'body' => "This thread was opened by the Articles Bot (🤖) for discussion about the following article: <a href='{$this->path('show')}'>{$this->title}</a>",
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
     * Scout
     */
    public function searchableAs()
    {
        if (app()->environment('production')) {
            return 'articles_index';
        }

        return 'articles_index_dev';
    }

    public function shouldBeSearchable()
    {
        return $this->published;
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => strip_tags($this->body),
        ];
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

                logger('art', [
                    'thread' => $this->thread,
                ]);

                return route('threads.show', ['board' => $this->thread->board, 'thread' => $this->thread], $absolute);
                break;

            case 'favorite':
                return route('articles.favorite', ['article' => $this], $absolute);
                break;

            case 'unfavorite':
                return route('articles.unfavorite', ['article' => $this], $absolute);
                break;

            case 'preview':
                return route('articles.preview', ['article' => $this], $absolute);
                break;

            default:
                return route('articles.index', [], $absolute);
                break;
        }
    }

    public function sluggable(): array
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
