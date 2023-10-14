<div {{ $attributes->except('post')->merge(['class' => 'flex flex-col']) }}>
    <a
        @if (! $post->community_link) wire:navigate.hover @endif
        href="{{ $post->community_link ? $post->community_link : route('posts.show', $post->slug) }}"
    >
        <img
            loading="lazy"
            src="{{ $post->presenter()->image() ?? Vite::asset('resources/img/placeholder.jpg') }}"
            width="1000"
            width="562"
            alt="{{ $post->title }}"
            class="object-cover mb-4 aspect-video"
        />
    </a>

    <p class="font-bold">
        <a
            @if ($post->community_link)
                href="{{ $post->community_link }}"
                target="_blank"
                rel="noopener"
            @else
                wire:navigate.hover
                href="{{ route('posts.show', $post->slug) }}"
            @endif
            class="text-indigo-600 underline"
        >
            @if ($post->community_link) <x-heroicon-o-arrow-top-right-on-square class="inline w-4 h-4 mr-[.425rem] translate-y-[-2px]" /> @endif
            {{ $post->title }}
        </a>
    </p>

    <p class="mt-2">{{ $post->description }}</p>

    <p class="mt-2 opacity-60">
        @if ($post->community_link)
            Shared on
        @else
            Updated on
        @endif

        <a wire:navigate.hover href="{{ route('posts.show', $post->slug) }}" class="underline">{{ $post->presenter()->lastUpdated() }}</a>
        @if ($post->community_link) <span class="mx-1 text-xs">•</span> {{ $post->presenter()->communityLinkDomain() }} @endif
    </p>

    <x-post.categories :categories="$post->categories" class="mt-4" />
</div>
