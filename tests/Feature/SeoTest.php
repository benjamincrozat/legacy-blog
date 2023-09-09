<?php

use App\Models\Post;

use function Pest\Laravel\get;

use Illuminate\Support\Facades\Http;

it('checks the boxes for technical SEO', function () {
    Http::fake();

    $post = Post::factory()->published()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = get(route('posts.show', $post))->assertView('posts.show');

    $view
        ->first('title')
        ->contains($post->title);

    $view
        ->hasMeta([
            'name' => 'description',
            'content' => $post->description,
        ])
        ->contains($post->title);

    $view
        ->hasMeta([
            'name' => 'twitter:image',
            'content' => 'https://i.useflipp.com/gw6mxpkgy4v8.png?watermark=useflipp.com&title=' . urlencode($post->title) . '&body=' . urlencode($post->description),
        ]);

    $view
        ->hasMeta([
            'property' => 'og:image',
            'content' => 'https://i.useflipp.com/gw6mxpkgy4v8.png?watermark=useflipp.com&title=' . urlencode($post->title) . '&body=' . urlencode($post->description),
        ]);

    $view
        ->first('h1')
        ->contains($post->title);
});
