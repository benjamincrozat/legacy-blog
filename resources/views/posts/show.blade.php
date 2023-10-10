<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->presenter()->image()"
    :canonical="$post->community_link ?? null"
>
    <div class="container mt-16 lg:max-w-screen-md">
        <x-breadcrumb class="mb-8">
            {{ $post->title }}
        </x-breadcrumb>

        <x-post.categories :categories="$post->categories" />

        <article class="mt-4">
            <x-prose>
                <div class="mb-8">
                    @if ($post->community_link)
                        <h1>
                            <a href="{{ $post->community_link }}" target="_blank" rel="noopener" class="underline">
                                {{ $post->title }}
                            </a>
                        </h1>
                    @else
                        <h1>{{ $post->title }}</h1>
                    @endif

                    <x-post.date :post="$post" />
                </div>

                <x-post.tree.trunk :tree="$post->presenter()->tree()" />

                @if ($image = $post->presenter()->image())
                    <img loading="lazy" src="{{ $image }}" alt="{{ $post->title }}" class="w-full" />
                @endif

                {!! $post->presenter()->content() !!}

                @if ($post->community_link)
                    <div class="text-xl text-center">
                        <a href="{{ $post->community_link }}" target="_blank" rel="noopener">
                            Read more on {{ $post->presenter()->communityLinkDomain() }}
                        </a>
                    </div>
                @endif
            </x-prose>
        </article>

        @if (! $post->community_link)
            <x-divider />

            <x-post.author :author="$post->user" />
        @endif
    </div>

    <x-divider />

    <x-section class="container">
        <x-slot:title class="text-xl text-center">
            Recommended
        </x-slot:title>

        <ul class="grid gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 md:gap-16">
            @foreach ($recommendations as $recommendation)
                <li>
                    <x-post :post="$recommendation" />
                </li>
            @endforeach
        </ul>
    </x-section>
</x-app>
