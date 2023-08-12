<div {{ $attributes->except(['@click', 'post'])->merge(['class' => 'bg-gradient-to-r from-white dark:from-gray-800/50 to-gray-50/30 dark:to-gray-800/50 p-4 sm:p-5 rounded-lg shadow-lg shadow-gray-200 dark:shadow-none']) }}>
    <div class="flex items-center justify-between gap-8">
        <div>
            <div class="text-sm opacity-75">
                @if ($post->community_link) Shared on @else Updated on @endif
                <a href="{{ route('posts.show', $post->slug) }}"><time datetime="{{ $post->last_update }}">{{ $post->rendered_last_update }}</time></a>
                @if ($post->community_link) <span class="mx-1 text-xs">•</span> {{ $post->community_link_domain }} @endif
            </div>

            <a
                href="@if ($post->community_link) {{ $post->community_link }} @else {{ route('posts.show', $post->slug) }} @endif"
                @if ($post->community_link) target="_blank" rel="nofollow noopener noreferrer" @endif
                class="block mt-1 font-normal text-indigo-600 dark:text-indigo-400"
                {{ $attributes->only('@click') }}
            >
                {{ $post->title }}
            </a>
        </div>

        @if ($post->image)
            <a
                href="@if ($post->community_link) {{ $post->community_link }} @else {{ route('posts.show', $post->slug) }} @endif"
                @if ($post->community_link) target="_blank" rel="nofollow noopener noreferrer" @endif
                {{ $attributes->only('@click') }}
                class="flex-shrink-0"
            >
                <img
                    loading="lazy"
                    src="{{ str_replace('w_auto', 'h_128', $post->image) }}"
                    width="64"
                    height="64"
                    alt="{{ $post->title }}"
                    class="object-cover aspect-square"
                />
            </a>
        @endif
    </div>

    <p class="mt-3 text-sm leading-relaxed">{{ $post->description }}</p>
</div>
