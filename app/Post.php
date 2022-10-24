<?php

namespace App;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class Post implements Feedable
{
    public readonly int $id;

    public readonly string $publishedAt;

    public readonly string $modifiedAt;

    public readonly string $title;

    public readonly string $slug;

    public readonly string $content;

    public readonly string $description;

    public readonly string $image;

    public static function make(
        int $id,
        string $publishedAt,
        string $modifiedAt,
        string $title,
        string $slug,
        string $content,
        string $description,
        string $image,
    ) : self {
        $post = new Post;
        $post->id = $id;
        $post->publishedAt = $publishedAt;
        $post->modifiedAt = $modifiedAt;
        $post->title = $title;
        $post->slug = $slug;
        $post->content = $content;
        $post->description = $description;
        $post->image = $image;

        return $post;
    }

    public static function all() : Collection
    {
        $files = glob(base_path('posts/*.md'));

        natsort($files);

        return collect($files)->map(function (string $file) {
            return self::getFromFile($file);
        })->filter(
            fn ($p) => $p->getPublishedAtDate()?->isPast()
        )->reverse();
    }

    public static function getFeedItems() : Collection
    {
        return self::all();
    }

    public static function get(string $slug) : self
    {
        $file = glob(base_path("posts/*{$slug}.md"))[0];

        $post = self::getFromFile($file);

        abort_if($post->getPublishedAtDate()?->isFuture(), 404);

        return $post;
    }

    protected static function getFromFile(string $file) : self
    {
        preg_match('/^(\d+)-([\w-]+)$/', basename($file, '.md'), $matches);

        $id = intval($matches[1]);

        $slug = $matches[2];

        $contents = file_get_contents($file);

        preg_match('/^Description: (\N+)$/ims', $contents, $descriptionMatches);

        $description = $descriptionMatches[1] ?? '';

        preg_match('/^Image: (\N+)$/ims', $contents, $imageMatches);

        $image = $imageMatches[1] ?? '';

        preg_match('/^Published At: (\N+)$/ims', $contents, $publishedAtMatches);

        $publishedAt = $publishedAtMatches[1] ?? '';

        preg_match('/^Modified At: (\N+)$/ims', $contents, $modifiedAtMatches);

        $modifiedAt = $modifiedAtMatches[1] ?? '';

        preg_match_all('/^# (\N+)$\n*(.+)/ims', $contents, $matches);

        $title = $matches[1][0] ?? '';

        $content = $matches[2][0] ?? '';

        return Post::make(
            id: $id,
            publishedAt: $publishedAt,
            modifiedAt: $modifiedAt,
            title: $title,
            slug: $slug,
            content: $content,
            description: $description,
            image: $image,
        );
    }

    public function getPublishedAtDate() : ?Carbon
    {
        return $this->publishedAt ? Carbon::parse($this->publishedAt) : null;
    }

    public function getModifiedAtDate() : ?Carbon
    {
        return $this->modifiedAt ? Carbon::parse($this->modifiedAt) : null;
    }

    public function getReadTime() : int
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200);

        return 0 === $minutes ? 1 : $minutes;
    }

    public function getTableOfContents() : array
    {
        preg_match_all('/(#{1,6}) (.*)/', $this->content, $headings);

        $tableOfContents = [];

        for ($i = 0; $i < count($headings[0]); ++$i) {
            $level = strlen($headings[1][$i]);

            $title = html_entity_decode(strip_tags(Str::marxdown($headings[2][$i])));

            $tableOfContents[] = [
                'id' => Str::slug($title),
                'title' => $title,
                'level' => $level,
            ];
        }

        return $tableOfContents;
    }

    public function toFeedItem() : FeedItem
    {
        return FeedItem::create([
            'id' => route('posts.show', $this->slug),
            'title' => $this->title,
            'summary' => Str::marxdown($this->content),
            'updated' => $this->getPublishedAtDate(),
            'link' => route('posts.show', $this->slug),
            'authorName' => 'Benjamin Crozat',
        ]);
    }
}
