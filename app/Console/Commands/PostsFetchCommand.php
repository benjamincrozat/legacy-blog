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

        $categoriesToSlug = collect([
            'check-laravel-version' => ['Laravel'],
            'clear-cache-laravel' => ['Laravel'],
            'laravel-migrations' => ['Laravel'],
            'php-redirect' => ['PHP'],
            'laravel-10' => ['Laravel'],
            'best-php-blogs' => ['PHP'],
            'php-laravel-print-array' => ['PHP', 'Laravel'],
            'using-this-when-not-in-object-context' => ['PHP'],
            'invalid-argument-supplied-for-foreach' => ['PHP', 'Laravel'],
            'methods-same-name-class-constructors-future-version-php' => ['PHP'],
            'php-array-empty' => ['PHP'],
            'php-83' => ['PHP'],
            'seo-case-study' => ['SEO'],
            'php-is-dead-2022' => ['PHP'],
            'php-ai' => ['PHP', 'GPT'],
            'laravel-best-practices' => ['Laravel'],
            'best-laravel-hosting-providers' => ['Laravel', 'Hosting', 'Tools'],
            'best-gdpr-compliant-google-analytics-alternatives' => ['SEO', 'Tools'],
            'laravel-collections' => ['Laravel'],
            'laravel-forge' => ['Laravel', 'Tools', 'Hosting'],
            'php-exceptions' => ['PHP'],
            'laravel-soft-delete' => ['Laravel'],
            'laravel-interview-questions' => ['Laravel'],
            'laravel-dropbox-driver' => ['Laravel'],
            'best-web-development-courses' => [],
            'tailwind-css' => ['CSS', 'Tailwind CSS'],
            'laravel-11' => ['Laravel'],
            'alpine-js' => ['JavaScript', 'Alpine.js'],
            'laravel-10-upgrade-guide' => ['Laravel'],
            'laravel-9-upgrade-guide' => ['Laravel'],
            'tailwind-css-forms-plugin' => ['CSS', 'Tailwind CSS'],
            'best-symfony-hosting-providers' => ['Hosting', 'Tools'],
            'best-cloud-hosting-provider-php' => ['PHP', 'Hosting', 'Tools'],
            'laravel-podcasts-interviews' => ['Laravel'],
            'tailwind-css-typography-plugin' => ['CSS', 'Tailwind CSS'],
            'laravel-retrospective' => ['Laravel'],
            'chatgpt-plugin-laravel' => ['Laravel', 'GPT'],
            'wwdc23' => ['CSS', 'JavaScript', 'Tools'],
            'llm-ai' => ['GPT'],
            'php-is-dead-2023' => ['PHP'],
            'console-log-php' => ['PHP'],
            'laravel-no-application-key-specified' => ['Laravel'],
            '419-page-expired-laravel' => ['Laravel'],
            'install-php-mac-laravel-valet' => ['PHP', 'Laravel', 'Tools'],
            'best-web-development-tools' => ['Tools'],
            'php-enums' => ['PHP'],
            'php-str-replace' => ['PHP'],
            'laravel-herd' => ['Laravel'],
            'laravel-prompts' => ['Laravel'],
            'laravel-volt' => ['Laravel', 'Livewire'],
            'laravel-security-best-practices' => ['Laravel', 'Security'],
            'testing-without-mocking-frameworks' => ['Testing'],
            'databases-without-domain-logic' => ['MySQL'],
            'chat-widget-livewire-v3' => ['Livewire'],
            'flappyphpant-flappy-bird-clone-php' => ['PHP'],
            'block-compromised-password' => ['Security'],
            'refactoring-without-tests' => ['Testing', 'PHP'],
        ])->each(function ($categories, $slug) {
            Post::where('slug', $slug)->first()->categories()->saveMany(
                collect($categories)->map(fn ($category) => \App\Models\Category::where('name', $category)->first()),
            );
        });

        $this->info('Posts from production have all been fetched.');
    }
}
