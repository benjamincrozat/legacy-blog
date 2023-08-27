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

    public function handle()
    {
        $response = Http::withToken(config('services.openai.api_key'))
            ->timeout(300)
            ->baseUrl('https://api.openai.com/v1')
            ->post('/chat/completions', [
                'model' => $this->model,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $this->post->community_link
                            ? <<<PROMPT
# {$this->post->title}
{$this->post->content}

---

Context: This is a community link I shared.

Instructions:
- Summarize it in the shortest form possible.
- Don't reuse the title.
- Use a natural tone.
- Speak in the first person as if you were the person who shared.
- Give the user a reason to click, but don't overdo it.
- Use 20 words or less.
PROMPT
                            : <<<PROMPT
# {$this->post->title}
{$this->post->content}

---

Context: This is an article I wrote.

Instructions:
- Summarize it in the shortest form possible.
- Don't reuse the title.
- Use the same tone as in the article.
- Speak in the first person as if you were the author.
- Give the user a reason to click, but don't overdo it.
- Use 20 words or less.
PROMPT,
                    ],
                ],
                'max_tokens' => 64,
            ])
            ->throw()
            ->json();

        $this->post->update([
            'description' => trim(trim($response['choices'][0]['message']['content']), '"\''),
        ]);
    }
}
