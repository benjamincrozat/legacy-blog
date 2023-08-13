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
                {!! $post->introduction !!}
                {!! $post->content !!}
                {!! $post->conclusion !!}
            </x-prose>
        </article>

        <x-divider />

            <aside>
                <x-prose>
                    <img
                        src="{{ $post->user->gravatar }}?s=256"
                        width="128" height="128"
                        alt="{{ $post->user->name }}"
                        class="float-right mb-4 ml-4 rounded-full"
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

        <ul class="grid grid-cols-2 mt-8 gap-x-8 gap-y-16">
            @foreach ($recommended as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>
    </x-section>
</x-app>
