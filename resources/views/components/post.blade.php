<div {{ $attributes->except('post') }}>
    <div class="flex items-start gap-6 lg:gap-8">
        <div class="flex-grow">
            <p class="font-bold">
                <a
                    @if ($post->community_link)
                        href="{{ $post->community_link }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    @else
                        wire:navigate.hover
                        href="{{ route('posts.show', $post) }}"
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

                <a wire:navigate.hover href="{{ route('posts.show', $post) }}" class="underline">{{ $post->presenter()->lastUpdated() }}</a>
                @if ($post->community_link) <span class="mx-1 text-xs">•</span> {{ $post->presenter()->communityLinkDomain() }} @endif
            </p>
        </div>

            <a
                @if (! $post->community_link) wire:navigate.hover @endif
                href="{{ $post->community_link ? $post->community_link : route('posts.show', $post) }}"
                class="flex-shrink-0"
            >
                @if ($post->image)
                    <img src="{{ $post->presenter()->thumbnail() }}" alt="{{ $post->title }}" class="object-cover aspect-square w-[64px] lg:w-[96px] h-[64px] lg:h-[96px]" />
                @else
                    <x-icon-document class="w-[64px] lg:w-[96px] h-[64px] lg:h-[96px]" />
                @endif
            </a>
    </div>

    @if ($post->categories->isNotEmpty())
        <ul class="flex gap-1 mt-4">
            @foreach ($post->categories->sortBy('name') as $category)
                <li>
                    <a
                        wire:navigate.hover
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
