<?php

return [
    'feeds' => [
        'main' => [
            'items' => [App\Post::class, 'getFeedItems'],
            'url' => '/feed',
            'title' => "Benjamin Crozat's blog on everything Laravel",
            'language' => 'en-US',
            'format' => 'atom',
            'view' => 'feed::atom',
        ],
    ],
];
