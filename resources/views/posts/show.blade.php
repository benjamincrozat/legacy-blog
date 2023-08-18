<x-app
    :title="$post->title"
    :description="$post->description"
>
    <div class="container mt-4 lg:max-w-screen-md">
        <x-breadcrumb>
            {{ $post->title }}
        </x-breadcrumb>

        <article class="mt-8">
            <x-prose>
                <h1>{{ $post->title }}</h1>

                <p class="font-bold">Table of contents:</p>
                <x-posts.tree :tree="$post->tree" />

                @if ($post->image)
                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full" />
                @endif

                {!! $post->content !!}
            </x-prose>
        </article>

        <x-divider />

        <aside>
            <x-prose>
                <img
                    src="{{ $post->user->gravatar }}?s=256"
                    alt="{{ $post->user->name }}"
                    class="float-right w-[96px] md:w-[128px] h-[96px] md:h-[128px] mt-2 mb-8 ml-8 rounded-full"
                />

                <h1>{{ $post->user->name }}</h1>

                {!! $post->user->description !!}

                <p>Follow {{ $post->user->name }} on:</p>

                <ul>
                    <li><a href="#" target="_blank" rel="nofollow noopener noreferrer">GitHub</a></li>
                    <li><a href="#" target="_blank" rel="nofollow noopener noreferrer">X</a></li>
                </ul>
            </x-prose>
        </aside>
    </div>

    <x-divider />

    <x-section class="container">
        <x-slot:title class="text-xl text-center">
            Recommended
        </x-slot:title>

        <ul class="grid mt-8 md:grid-cols-2 gap-x-8 gap-y-16">
            @foreach ($recommended as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>
    </x-section>
</x-app>
