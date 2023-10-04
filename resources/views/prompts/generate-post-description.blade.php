@if ($post->community_link)
# {{ $post->title }}

{{ $post->content }}

---

Context: This is a community link I shared.

Instructions:
- Summarize it in the shortest form possible.
- Don't reuse the title.
- Use a natural tone.
- Speak in the first person as if you were the person who shared.
- Give the user a reason to click, but don't overdo it.
- Use 20 words or less.
@else
# {{ $post->title }}

{{ $post->content }}

---

Context: This is an article I wrote.

Instructions:
- Summarize it in the shortest form possible.
- Don't reuse the title.
- Use the same tone as in the article.
- Speak in the first person as if you were the author.
- Give the user a reason to click, but don't overdo it.
- Use 20 words or less.
@endif
