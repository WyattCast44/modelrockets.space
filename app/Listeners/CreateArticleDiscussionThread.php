<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ArticlePublished;

class CreateArticleDiscussionThread
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ArticlePublished $event)
    {
        $article = $event->article;
        
        $thread = $article->createThread();
    }
}
