<?php

use App\Models\Post;

use function Pest\Laravel\artisan;

use Illuminate\Support\Facades\Http;
use App\Console\Commands\AnalyticsFetchCommand;

test('the command updates posts with new sessions numbers', function () {
    Http::fake([
        'api.pirsch.io/api/v1/token*' => Http::response(['access_token' => 'foo']),
        'api.pirsch.io/api/v1/statistics/page*' => Http::response([['sessions' => 123]]),
    ]);

    $posts = Post::factory(3)->create();

    artisan(AnalyticsFetchCommand::class)->assertExitCode(0);

    $posts->each(function (Post $post) {
        expect($post->fresh()->sessions_last_7_days)->toEqual(123);
        expect($post->fresh()->sessions_last_30_days)->toEqual(123);
    });
});

test('the command does not fail when sessions is empty', function () {
    Http::fake([
        'api.pirsch.io/api/v1/token*' => Http::response(['access_token' => 'foo']),
        'api.pirsch.io/api/v1/statistics/page*' => Http::response([[]]),
    ]);

    $posts = Post::factory(3)->create();

    artisan(AnalyticsFetchCommand::class);

    $posts->each(function (Post $post) {
        expect($post->fresh()->sessions_last_7_days)->toEqual(0);
        expect($post->fresh()->sessions_last_30_days)->toEqual(0);
    });
});
