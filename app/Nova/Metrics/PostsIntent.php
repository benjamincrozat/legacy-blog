<?php

namespace App\Nova\Metrics;

use App\Models\Post;
use Laravel\Nova\Metrics\Partition;
use Laravel\Nova\Http\Requests\NovaRequest;

class PostsIntent extends Partition
{
    /**
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this
            ->count($request, Post::class, 'promotes_affiliate_links')
            ->label(fn ($value) => match ($value) {
                1 => 'Commercial',
                0 => 'Informational'
            })
            ->colors([
                1 => '#49de80',
                0 => '#60a5fa',
            ]);
    }

    /**
     * @return string
     */
    public function uriKey()
    {
        return 'posts-intent';
    }
}
