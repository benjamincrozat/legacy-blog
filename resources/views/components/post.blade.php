<a href="{{ route('posts.show', $post->slug) }}" class="group">
    <p class="font-normal font-serif leading-tight group-hover:text-blue-400 text-xl transition-colors">
        {{ $post->title }}
    </p>

    <x-metadata :date="$post->getPublishedAtDate()" :read-time="$post->getReadTime()" class="mt-3" />
</a>
