<div {{ $attributes->except('post') }}>
    <div class="flex items-start gap-6 md:gap-8">
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

                on <a wire:navigate href="{{ route('posts.show', $post) }}">{{ $post->presenter()->lastUpdated() }}</a>
                @if ($post->community_link) <span class="mx-1 text-xs">•</span> {{ $post->presenter()->communityLinkDomain() }} @endif
            </p>
        </div>

        @if (! $post->community_link)
            <a href="{{ route('posts.show', $post) }}" class="flex-shrink-0">
                <img src="{{ $post->image }}" width="96" height="96" alt="{{ $post->title }}" class="object-cover aspect-square" />
            </a>
        @endif
    </div>

    @if ($post->categories->isNotEmpty())
        <ul class="flex gap-1 mt-4">
            @foreach ($post->categories as $category)
                <li>
                    <a
                        wire:navigate
                        href="{{ route('categories.show', $category) }}"
                        class="inline-block px-2 py-1 text-xs font-bold uppercase rounded leading-normal hover:opacity-75 transition-opacity
                        bg-{{ $category->presenter()->primaryColor() }} text-{{ $category->presenter()->secondaryColor() }}"
                    >
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
