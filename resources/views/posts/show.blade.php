<x-app
    :title="$post->title"
    :description="$post->description"
>
    <div class="container mt-4 lg:max-w-screen-md">
        <x-breadcrumb class="mb-8">
            {{ $post->title }}
        </x-breadcrumb>

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

        <article class="mt-4">
            <x-prose>
                <h1>{{ $post->title }}</h1>

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

                    <h1 class="text-2xl">
                        {{ $post->user->name }}
                    </h1>

                    {!! $post->user->presenter()->description() !!}

                    <p><strong>Follow me on:</strong></p>

                    <ul>
                        <li><a href="https://github.com/{{ $post->user->github_handle }}" target="_blank" rel="nofollow noopener noreferrer">GitHub</a></li>
                        <li><a href="https://x.com/{{ $post->user->x_handle }}" target="_blank" rel="nofollow noopener noreferrer">X</a></li>
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
            @foreach ($recommended as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>
    </x-section>
</x-app>
