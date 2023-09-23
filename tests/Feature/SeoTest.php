<?php

use App\Models\Post;

use function Pest\Laravel\get;

use Illuminate\Support\Facades\Http;

it('checks the boxes for technical SEO', function () {
    Http::fake();

    $post = Post::factory()->published()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = get(route('posts.show', $post->slug))->assertView('posts.show');

    $view
        ->first('title')
        ->contains($post->title);

    $view
        ->hasMeta([
            'name' => 'description',
            'content' => $post->description,
        ])
        ->contains($post->title);

    $queryString = http_build_query([
        'title' => $post->title,
        'body' => $post->description,
        'watermark' => 'useflipp.com',
    ]);

    $view
        ->hasMeta([
            'name' => 'twitter:image',
            'content' => "https://i.useflipp.com/gw6mxpkgy4v8.png?$queryString",
        ]);

    $view
        ->hasMeta([
            'property' => 'og:image',
            'content' => "https://i.useflipp.com/gw6mxpkgy4v8.png?$queryString",
        ]);

    $view
        ->first('h1')
        ->contains($post->title);
});
