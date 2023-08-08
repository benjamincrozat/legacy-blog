<?php

namespace App\Console\Commands;

use App\Models\Posts\Post;
use Spatie\Sitemap\Sitemap;
use Illuminate\Console\Command;

class SitemapGenerateCommand extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate sitemap';

    public function handle() : int
    {
        $sitemap = Sitemap::create();

        $sitemap->add(route('home'));

        Post::latest()->get()->each(
            fn (Post $post) => $sitemap->add(route('posts.show', $post))
        );

        $sitemap->add(route('pouest'));

        $sitemap->writeToFile(public_path('/sitemap.xml'));

        $this->info('Sitemap successfully generated.');

        return Command::SUCCESS;
    }
}
