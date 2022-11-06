<?php

namespace App\Nova\Metrics;

use App\Models\Post;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Http\Requests\NovaRequest;

class PostsCount extends Value
{
    /**
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->count($request, Post::class);
    }
}
