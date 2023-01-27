<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;
use Algolia\AlgoliaSearch\RecommendClient;
use Algolia\AlgoliaSearch\Exceptions\NotFoundException;
use Algolia\AlgoliaSearch\Exceptions\UnreachableException;

class ShowPostController extends Controller
{
    public function __invoke(RecommendClient $recommendClient, Post $post) : View
    {
        $recommendationsIds = cache()->remember("recommended-posts-for-post-$post->id", 3600, function () use ($recommendClient, $post) {
            try {
                $recommendations = $recommendClient->getRelatedProducts([[
                    'indexName' => config('app.env') . '_posts',
                    'objectID' => "$post->id",
                ]]);
            } catch (NotFoundException|UnreachableException $e) {
                Log::error($e->getMessage());

                return [];
            }

            return collect($recommendations['results'][0]['hits'])->pluck('objectID');
        });

        return view('posts.show', [
            'post' => $post,
            'others' => Post::with('user')->whereIn('id', $recommendationsIds)->get(),
            'subscribersCount' => Subscriber::count(),
        ]);
    }
}
