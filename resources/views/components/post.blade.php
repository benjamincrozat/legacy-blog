<div {{ $attributes->except('post')->merge(['class' => 'flex items-start gap-6 md:gap-8']) }}>
    <div class="flex-grow">
        <p class="font-bold ">
            <a
                @if ($post->community_link)
                    href="{{ $post->community_link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                @else
                    wire:navigate
                    href="{{ route('posts.show', $post) }}"
                @endif
                class="text-indigo-600"
            >
                <span class="underline">{{ $post->title }}</span>
                @if ($post->community_link)
                    <x-heroicon-o-arrow-right class="ml-1 inline w-4 h-4 translate-y-[-.5px]" />
                @endif
            </a>
        </p>

        <p class="mt-2">{{ $post->description }}</p>

        <p class="mt-2 opacity-60">
            @if ($post->community_link)
                Shared
            @else
                Updated
            @endif

            on <a href="{{ route('posts.show', $post) }}">{{ $post->presenter()->lastUpdated() }}</a>
        </p>
    </div>

    @if (! $post->community_link)
        <img src="{{ $post->image }}" width="64" height="64" alt="{{ $post->title }}" class="flex-shrink-0 object-cover mt-1 aspect-square" />
    @endif
</div>
