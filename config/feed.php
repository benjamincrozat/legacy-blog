<?php

return [
    'feeds' => [
        'main' => [
            'items' => [App\Models\Posts\Post::class, 'getFeedItems'],
            'url' => '/feed',
            'title' => "Benjamin Crozat's blog",
            'language' => 'en-US',
            'format' => 'atom',
            'view' => 'feed::atom',
        ],
    ],
];
