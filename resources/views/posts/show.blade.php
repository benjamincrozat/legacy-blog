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
                            <a href="{{ $post->community_link }}" target="_blank" rel="noopener" class="decoration-4 underline-offset-4">
                                {{ $post->title }}
                            </a>
                        </h1>
                    @else
                        <h1>{{ $post->title }}</h1>
                    @endif

                    <x-post.date :post="$post" />
                </div>

                <x-post.tree.trunk :tree="$post->presenter()->tree()" />

                <img loading="lazy" src="{{ $post->presenter()->image() }}" alt="{{ $post->title }}" class="w-full" />

                <div class="not-prose">
                    <x-newsletter-form />
                </div>

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

        <ul class="grid gap-8 mt-8 md:grid-cols-2 md:gap-16">
            <li>
                <x-post-template
                    title="Your sponsored article here"
                    description="Talk about your business, stay on top of everything for a week, and get a valuable link for life."
                />
            </li>

            @foreach ($recommendations as $recommendation)
                <li>
                    <x-post :post="$recommendation" />
                </li>
            @endforeach
        </ul>
    </x-section>

    <x-divider class="!mt-20" />

    <x-sponsors>
        <x-slot:title>Huge thanks to my sponsors!</x-slot:title>
    </x-sponsors>
</x-app>
