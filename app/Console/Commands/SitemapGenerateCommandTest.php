<?php

namespace App\Console\Commands;

use App\Post;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class SitemapGenerateCommandTest extends TestCase
{
    public function test_it_generates_a_sitemap() : void
    {
        Artisan::call(SitemapGenerateCommand::class);

        $content = file_get_contents(public_path('/sitemap.xml'));

        $this->assertStringContainsString(route('home'), $content);

        $this->assertStringContainsString(route('posts.index'), $content);

        Post::all()->each(function (Post $post) use ($content) {
            $this->assertStringContainsString(route('posts.show', $post->slug), $content);
        });
    }
}
