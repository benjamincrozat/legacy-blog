<a href="{{ route('posts.show', $post->slug) }}" class="group">
    <h3 class="font-normal font-serif leading-tight group-hover:text-blue-400 text-xl transition-colors">
        {{ $post->title }}
    </h3>

    <x-metadata :date="$post->getPublishedAtDate()" :read-time="$post->getReadTime()" class="mt-3" />
</a>
