<?php

return [
    'feeds' => [

        'articles' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             */
            'items' => 'App\Domain\Blog\Models\Article@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/articles',

            'title' => 'All articles on modelrockets.space',

            /*
             * Custom view for the items.
             *
             * Defaults to feed::feed if not present.
             */
            'view' => 'feed::feed',
        ],

        'boards' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             */
            'items' => 'App\Board@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/forum/boards',

            'title' => 'All disccussion boards on modelrockets.space',

            /*
             * Custom view for the items.
             *
             * Defaults to feed::feed if not present.
             */
            'view' => 'feed::feed',
        ],

    ],
];
