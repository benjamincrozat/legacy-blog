<?php

namespace Tests\Feature\App\Console\Commands;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\SitemapGenerateCommand;

class SitemapGenerateCommandTest extends TestCase
{
    public function test_it_generates_a_sitemap() : void
    {
        Artisan::call(SitemapGenerateCommand::class);

        $content = file_get_contents(public_path('/sitemap.xml'));

        $this->assertStringContainsString(route('home'), $content);

        Post::latest()->get()->each(
            fn ($p) => $this->assertStringContainsString(route('posts.show', $p), $content)
        );
    }
}
