<?php

namespace App\Events;

use App\Models\Post;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class PostDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $postId;

    public string $postSlug;

    public function __construct(
        Post $post
    ) {
        $this->postId = $post->id;
        $this->postSlug = $post->slug;
    }
}
