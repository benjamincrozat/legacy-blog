<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    :canonical="$post->community_link ?? null"
>
    <div class="container mt-3 lg:max-w-screen-md">
        <x-breadcrumb class="mb-8">
            {{ $post->title }}
        </x-breadcrumb>

        @if ($post->categories->isNotEmpty())
            <ul class="flex gap-1 mt-5">
                @foreach ($post->categories as $category)
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

        <article class="mt-4">
            <x-prose>
                <div class="mb-8">
                    @if ($post->community_link)
                        <h1>
                            <a href="{{ $post->community_link }}" target="_blank" rel="noopener noreferrer" class="decoration-4 underline-offset-4">
                                {{ $post->title }}
                            </a>
                        </h1>
                    @else
                        <h1>{{ $post->title }}</h1>
                    @endif

                    @if ($post->is_published)
                        <p class="-mt-6 opacity-75">
                            @if ($post->community_link)
                                Shared on
                            @else
                                Updated on
                            @endif

                            <time class="{{ ($post->manually_updated_at ?? $post->created_at)->toDateTimeString() }}">
                                {{ $post->presenter()->lastUpdated() }}
                            </time>
                        </p>
                    @endif
                </div>

                @if (! empty($tree = $post->presenter()->tree()))
                    <p class="font-bold">Table of contents:</p>
                    <x-tree :tree="$tree" />
                @endif

                @if ($post->image)
                    <img src="{{ $post->presenter()->image() }}" alt="{{ $post->title }}" class="w-full" />
                @endif

                {!! $post->presenter()->content() !!}

                @if ($post->community_link)
                    <div class="text-xl text-center">
                        <a href="{{ $post->community_link }}" target="_blank" rel="noopener noreferrer">
                            Read more on {{ $post->presenter()->communityLinkDomain() }}
                        </a>
                    </div>
                @endif
            </x-prose>
        </article>

        @if (! $post->community_link)
            <x-divider />

            <aside>
                <x-prose>
                    <img
                        src="{{ $post->user->presenter()->gravatar() }}?s=256"
                        alt="{{ $post->user->name }}"
                        class="float-right w-[96px] md:w-[128px] h-[96px] md:h-[128px] mt-2 mb-8 ml-8 rounded-full"
                    />

                    <h3 class="text-2xl">
                        Written by {{ $post->user->name }}
                    </h3>

                    {!! $post->user->presenter()->description() !!}

                    <p>Follow me on:</p>

                    <ul>
                        <li>
                            <a
                                href="https://github.com/{{ $post->user->github_handle }}"
                                target="_blank"
                                rel="nofollow noopener noreferrer"
                            >
                                GitHub
                            </a>
                        </li>

                        <li>
                            <a
                                href="https://x.com/{{ $post->user->x_handle }}"
                                target="_blank"
                                rel="nofollow noopener noreferrer"
                            >
                                X
                            </a>
                        </li>
                    </ul>
                </x-prose>
            </aside>
        @endif
    </div>

    <x-divider />

    <x-section class="container">
        <x-slot:title class="text-xl text-center">
            Recommended
        </x-slot:title>

        <ul class="grid gap-8 mt-8 md:grid-cols-2 md:gap-16">
            @foreach ($recommendations as $recommendation)
                <li>
                    <x-post :post="$recommendation" />
                </li>
            @endforeach
        </ul>
    </x-section>

    <x-divider />

    <x-newsletter />
</x-app>
