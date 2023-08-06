<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Facades\Http;

class GeneratePostDescription
{
    public function generate(Post $post, string $model = 'gpt-3.5-turbo') : Post
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
# {$post->title}
{$post->introduction}
{$post->content}
{$post->conclusion}

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

        $post->update([
            'description' => trim(trim($response['choices'][0]['message']['content']), '"\''),
        ]);

        return $post->fresh();
    }
}
