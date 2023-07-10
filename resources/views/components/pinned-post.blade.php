<div {{ $attributes->except('first', 'post')->merge(['class' => 'block flex-shrink-0 relative snap-start sm:snap-center md:snap-normal scroll-ml-4 md:scroll-ml-0 w-[90%] sm:w-[70%] md:w-auto']) }}>
    <a href="{{ route('posts.show', $post->slug) }}">
        <img
            @if (empty($first)) loading="lazy" @endif
            src="{{ str_replace('w_auto', 'w_600', $post->image) }}"
            alt="{{ $post->title }}"
            class="object-cover w-full rounded-md shadow-lg aspect-video dark:shadow-none"
        />
    </a>

    <a
        href="{{ route('posts.show', $post->slug) }}"
        class="inline-block mt-4 font-semibold"
    >
        {{ $post->title }}
    </a>

    <div class="flex items-center gap-2 mt-2 text-sm">
        <img
            loading="lazy"
            src="https://www.gravatar.com/avatar/{{ md5($post->user->email) }}"
            width="18"
            height="18"
            alt="{{ $post->user->name }}"
            class="-translate-y-[.5px] rounded-full"
        />

        <div>
            <a
                href="{{ $post->user->twitter_url }}"
                target="_blank"
                rel="noopener noreferrer"
                class="font-medium"
            >
                {{ $post->user->name }}
            </a>
            —
            <span class="sr-only sm:not-sr-only">Updated on</span> <time datetime="{{ ($post->modified_at ?? $post->created_at)?->toDateTimeString() }}">{{ ($post->modified_at ?? $post->created_at)?->isoFormat('ll') }}
        </div>
    </div>
</div>
