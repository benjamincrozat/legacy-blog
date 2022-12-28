<?php

namespace App\Console\Commands;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Facades\Artisan;

class SitemapGenerateCommandTest extends TestCase
{
    public function test_it_generates_a_sitemap() : void
    {
        Artisan::call(SitemapGenerateCommand::class);

        $content = file_get_contents(public_path('/sitemap.xml'));

        $this->assertStringContainsString(route('home'), $content);

        $this->assertStringContainsString(route('laravel-consulting'), $content);

        Post::latest()->get()->each(function (Post $post) use ($content) {
            $this->assertStringContainsString(route('posts.show', $post), $content);
        });
    }
}
