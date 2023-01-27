<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Algolia\AlgoliaSearch\RecommendClient;
use Algolia\AlgoliaSearch\Exceptions\NotFoundException;
use Algolia\AlgoliaSearch\Exceptions\UnreachableException;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        $recommendClient = RecommendClient::create(
            config('scout.algolia.id'),
            config('scout.algolia.secret')
        );

        $recommendationsIds = cache()->remember('recommended-posts-for-post-' . $post->id, 24 * 60 * 60, function () use ($recommendClient, $post) {
            try {
                $recommendations = $recommendClient->getRelatedProducts([[
                    'indexName' => config('app.env') . '_posts',
                    'objectID' => "$post->id",
                ]]);
            } catch (NotFoundException|UnreachableException $e) {
                Log::error($e->getMessage());

                return collect();
            }

            return collect($recommendations['results'][0]['hits'])->pluck('objectID');
        });

        return view('posts.show', [
            'bestProducts' => $post->bestProducts()->with('affiliate')->get(),
            'post' => $post,
            'recommended' => Post::with('user')
                ->whereIn('id', $recommendationsIds)
                ->when($recommendationsIds->isNotEmpty(), fn ($q) => $q->orderByRaw(
                    DB::raw('FIELD(id, ' . $recommendationsIds->join(',') . ')')
                ))
                ->limit(10)
                ->get(),
            'subscribersCount' => Subscriber::count(),
        ]);
    }
}
