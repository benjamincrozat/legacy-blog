<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GeneratePostTeaser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Post $post,
        protected string $model = 'gpt-3.5-turbo',
    ) {
    }

    public function handle() : void
    {
        $response = Http::withToken(config('services.openai.api_key'))
            ->timeout(300)
            ->baseUrl('https://api.openai.com/v1')
            ->post('/chat/completions', [
                'model' => $this->model,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => <<<PROMPT
{$this->post->title}
{$this->post->content}

---

Tease this article without giving away the crucial details. Give the user a reason to click, but don't overdo it. Your tone must be the same as in the article and you must avoid repetitions. Speak using the first person as if you were the author.
PROMPT,
                    ],
                ],
                'max_tokens' => 1024,
            ])
            ->throw()
            ->json();

        $this->post->update([
            'teaser' => trim(trim($response['choices'][0]['message']['content']), '"\''),
        ]);
    }
}
