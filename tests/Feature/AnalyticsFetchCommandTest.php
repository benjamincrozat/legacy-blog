<?php

use App\Models\Posts\Post;
use function Pest\Laravel\artisan;
use Illuminate\Support\Facades\Http;
use App\Console\Commands\AnalyticsFetchCommand;

// This test also implicitly tests the App\Actions\FetchSessionsFromLastWeekForPath class.
test('commands fetches sessions from last week for a given path', function () {
    Http::fake([
        'api.pirsch.io/api/v1/token*' => Http::response(['access_token' => 'foo']),
        'api.pirsch.io/api/v1/statistics/page*' => Http::response([['sessions' => 123]]),
    ]);

    $posts = Post::factory(10)->create();

    artisan(AnalyticsFetchCommand::class);

    $posts->each(
        fn (Post $post) => expect($post->fresh()->sessions)->toEqual(123)
    );
});
