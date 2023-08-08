<?php

namespace App\Models\Posts\Concerns;

use App\Models\Redirect;
use App\Models\Posts\Post;

trait CreatesRedirects
{
    public static function bootCreatesRedirects() : void
    {
        static::saved(function (Post $post) {
            if ($post->wasChanged('slug')) {
                Redirect::create([
                    'from' => $post->getOriginal('slug'),
                    'to' => $post->slug,
                ]);
            }
        });
    }
}
