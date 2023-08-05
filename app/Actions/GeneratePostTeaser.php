<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Facades\Http;

class GeneratePostTeaser
{
    public function generate(Post $post, string $model = 'gpt-3.5-turbo-16k') : Post
    {
        $response = Http::withToken(config('services.openai.api_key'))
            ->timeout(300)
            ->baseUrl('https://api.openai.com/v1')
            ->post('/chat/completions', [
                'model' => $model,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => <<<PROMPT
{$post->title}
{$post->introduction}
{$post->content}
{$post->conclusion}

---

Tease this article without giving away the crucial details. Give the user a reason to click, but don't overdo it. Your tone must be the same as in the article and you must avoid repetitions. Speak using the first person as if you were the author.
PROMPT,
                    ],
                ],
                'max_tokens' => 1024,
            ])
            ->throw()
            ->json();

        $post->update([
            'teaser' => trim(trim($response['choices'][0]['message']['content']), '"\''),
        ]);

        return $post->fresh();
    }
}
