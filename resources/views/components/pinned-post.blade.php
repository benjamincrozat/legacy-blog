<a href="{{ route('posts.show', $post->slug) }}" @click="window.fathom?.trackGoal('OKJIR46O', 0)" class="block flex-shrink-0 overflow-hidden relative snap-start sm:snap-center md:snap-normal scroll-ml-4 md:scroll-ml-0 w-[90%] sm:w-[70%] md:w-auto">
    <figure {{ $attributes->except('post') }}>
        <img
            @if (empty($first)) loading="lazy" @endif
            src="{{ str_replace('w_auto', 'w_600', $post->image) }}"
            alt="{{ $post->title }}"
            class="aspect-video object-cover rounded-md w-full"
        />

        <figcaption class="inline-block py-4">
            <p class="font-semibold">{{ $post->title }}</p>

            <p class="leading-relaxed mt-3 text-sm">{{ $post->description }}</p>
        </figcaption>
    </figure>
</a>
