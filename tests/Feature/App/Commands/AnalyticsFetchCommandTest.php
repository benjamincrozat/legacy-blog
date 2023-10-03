<?php

use App\Models\Post;
use App\Events\PostSaved;

use function Pest\Laravel\artisan;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Event;
use App\Console\Commands\AnalyticsFetchCommand;

dataset('posts', [[
    fn () => Post::factory(3)->create(),
]]);

beforeEach(function () {
    Http::fake([
        'api.pirsch.io/api/v1/token*' => Http::response(['access_token' => 'foo']),
    ]);
});

test('the command updates posts with new sessions numbers', function (Collection $posts) {
    Event::fake([PostSaved::class]);

    Http::fake([
        'api.pirsch.io/api/v1/statistics/page*' => Http::response([['sessions' => 123]]),
    ]);

    artisan(AnalyticsFetchCommand::class)->assertExitCode(0);

    $posts->each(function (Post $post) {
        expect($post->fresh()->sessions_last_7_days)->toEqual(123);
        expect($post->fresh()->sessions_last_30_days)->toEqual(123);
    });

    Event::assertDispatched(
        PostSaved::class,
        fn (PostSaved $event) => $posts->pluck('slug')->contains($event->post->slug)
    );
})->with('posts');

test('the command does not fail when the response is empty', function (Collection $posts) {
    Http::fake([
        'api.pirsch.io/api/v1/statistics/page*' => Http::response(),
    ]);

    artisan(AnalyticsFetchCommand::class);

    $posts->each(function (Post $post) {
        expect($post->fresh()->sessions_last_7_days)->toEqual(0);
        expect($post->fresh()->sessions_last_30_days)->toEqual(0);
    });
})->with('posts');

test('the command does not fail when sessions is missing', function (Collection $posts) {
    Http::fake([
        'api.pirsch.io/api/v1/statistics/page*' => Http::response([[]]),
    ]);

    artisan(AnalyticsFetchCommand::class);

    $posts->each(function (Post $post) {
        expect($post->fresh()->sessions_last_7_days)->toEqual(0);
        expect($post->fresh()->sessions_last_30_days)->toEqual(0);
    });
})->with('posts');
