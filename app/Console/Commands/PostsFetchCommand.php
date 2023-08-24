<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PostsFetchCommand extends Command
{
    protected $signature = 'posts:fetch';

    protected $description = 'Fetch posts from the production database';

    public function handle() : void
    {
        DB::connection('production')
            ->table('posts')
            ->get()
            ->each(function (object $post) {
                $content = $post->content . "\r\n\r\n" . $post->conclusion;

                if ($post->introduction) {
                    $content = "## Introduction\r\n\r\n" . $post->introduction . "\r\n\r\n" . $content;
                }

                Post::create([
                    'user_id' => $post->user_id,
                    'image' => str_replace('/dpr_auto,f_auto,q_auto,w_auto', '', $post->image),
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'content' => $content,
                    'description' => $post->description,
                    'teaser' => $post->teaser,
                    'community_link' => $post->community_link,
                    'commercial' => $post->promotes_affiliate_links,
                    'is_published' => true,
                    'sessions' => $post->sessions,
                    'created_at' => $post->created_at,
                    'updated_at' => $post->updated_at,
                    'manually_updated_at' => $post->modified_at,
                ]);

                $this->info("Post $post->title has been fetched.");
            });

        $this->info('Posts from production have all been fetched.');
    }
}
