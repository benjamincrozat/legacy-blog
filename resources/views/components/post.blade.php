<a href="{{ route('posts.show', $post->slug) }}" class="group" @click="window.fathom?.trackGoal('WQ8HQTOO', 0)">
    <p class="font-normal leading-tight group-hover:opacity-50 text-lg transition-opacity">
        {{ $post->title }}
    </p>

    <x-metadata
        :published-at="$post->getPublishedAtDate()"
        :read-time="$post->getReadTime()"
        class="mt-3"
    />
</a>
