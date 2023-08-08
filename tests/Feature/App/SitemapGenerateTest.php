<?php

use App\Models\Posts\Post;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\SitemapGenerateCommand;

test('the command generates a sitemap', function () {
    Artisan::call(SitemapGenerateCommand::class);

    $content = file_get_contents(public_path('/sitemap.xml'));

    expect($content)->toContain(route('home'));

    Post::latest()->get()->each(
        fn ($p) => expect($content)->toContain(route('posts.show', $p))
    );

    expect($content)->toContain(route('pouest'));
});
