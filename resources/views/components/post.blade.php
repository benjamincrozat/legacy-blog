<a href="{{ route('posts.show', $post->slug) }}" class="group" @click="window.fathom?.trackGoal('WQ8HQTOO', 0)">
    <p class="font-normal font-serif leading-tight group-hover:text-blue-400 text-lg sm:text-xl transition-colors">
        {{ $post->title }}
    </p>

    <x-metadata
        :published-at="$post->getPublishedAtDate()"
        :modified-at="$post->getModifiedAtDate()"
        :read-time="$post->getReadTime()"
        class="mt-3"
    />
</a>
