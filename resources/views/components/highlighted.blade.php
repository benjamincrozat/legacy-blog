<figure {{ $attributes->except('post')->merge(['class' => 'flex-shrink-0 snap-start sm:snap-center md:snap-normal scroll-ml-4 md:scroll-ml-0 w-[90%] sm:w-[70%] md:w-auto']) }}>
    <a href="{{ route('posts.show', $post->slug) }}" @click="window.fathom?.trackGoal('OKJIR46O', 0)">
        <img
            @if (empty($first)) loading="lazy" @endif
            src="{{ str_replace('w_auto', 'w_600', $post->image) }}"
            width="1280"
            height="720"
            alt="{{ $post->title }}"
            class="aspect-video object-cover rounded-md w-full"
        />
    </a>

    <a href="{{ route('posts.show', $post->slug) }}" class="bg-gray-900 dark:bg-gradient-to-r from-white dark:from-gray-800/50 to-gray-50/30 dark:to-gray-800/50 block leading-tight mt-2 p-3 rounded-md text-sm text-white dark:text-current" @click="window.fathom?.trackGoal('OKJIR46O', 0)">
        <figcaption class="flex items-center justify-between gap-4">
            <span class="truncate">{{ $post->title }}</span>
            <x-heroicon-o-arrow-right class="flex-shrink-0 opacity-75 w-3 h-3" />
        </figcaption>
    </a>
</figure>
