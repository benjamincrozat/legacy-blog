<div {{ $attributes->except('first', 'post')->merge(['class' => 'block flex-shrink-0 relative snap-start sm:snap-center md:snap-normal scroll-ml-4 md:scroll-ml-0 w-[90%] sm:w-[70%] md:w-auto']) }}>
    <a href="{{ route('posts.show', $post->slug) }}">
        <img
            @if (empty($first)) loading="lazy" @endif
            src="{{ str_replace('w_auto', 'w_600', $post->image) }}"
            alt="{{ $post->title }}"
            class="object-cover w-full rounded-md shadow-lg shadow-black/5 aspect-video dark:shadow-none"
        />
    </a>

    <a
        href="{{ route('posts.show', $post->slug) }}"
        class="inline-block mt-4 font-semibold"
    >
        {{ $post->title }}
    </a>

    <div class="opacity-75">
        Updated on <time datetime="{{ $post->last_update }}">{{ $post->rendered_last_update }}</time>
    </div>
</div>
