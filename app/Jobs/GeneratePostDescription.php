<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GeneratePostDescription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Post $post,
        protected string $model = 'gpt-3.5-turbo',
    ) {
    }

    public function handle() : void
    {
        $description = Http::withToken(config('services.openai.api_key'))
            ->timeout(300)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => $this->model,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => view('prompts.generate-post-description', [
                            'post' => $this->post,
                        ])->render(),
                    ],
                ],
                'max_tokens' => 64,
            ])
            ->throw()
            ->json('choices.0.message.content');

        $this->post->update(compact('description'));
    }
}
