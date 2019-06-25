<?php

namespace App\Listeners;

use App\Events\ArticlePublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateThreadWhenArticlePublished
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
