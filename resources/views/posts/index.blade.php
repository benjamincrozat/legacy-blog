<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="text-gray-600"
>
    <div class="container flex justify-between mt-8">
        <x-blog.title />

        <nav class="flex items-center gap-8">
            <x-hire-me />
        </nav>
    </div>

    <section id="articles" class="container mt-8 sm:mt-16">
        <h2 class="font-bold text-center text-xl">
            Featured posts
        </h2>

        <x-affiliate channel="index" class="flex items-center justify-center gap-6 mt-6" />

        @if ($featured->isNotEmpty())
            <div class="grid sm:grid-cols-2 gap-4 mt-8">
                @foreach ($featured as $post)
                    <figure>
                        <a href="{{ route('posts.show', $post->slug) }}" @click="window.fathom?.trackGoal('OKJIR46O', 0)">
                            <img
                                src="{{ $post->image }}"
                                alt="{{ $post->title }}"
                                class="rounded-md"
                            />
                        </a>

                        <a href="{{ route('posts.show', $post->slug) }}" class="bg-gray-900 block leading-tight mt-2 p-3 rounded-md text-sm text-white" @click="window.fathom?.trackGoal('OKJIR46O', 0)">
                            <figcaption class="flex items-center justify-between gap-4">
                                <span>{{ $post->title }}</span>
                                <x-heroicon-o-arrow-right class="flex-shrink-0 w-3 h-3" />
                            </figcaption>
                        </a>
                    </figure>
                @endforeach
            </div>
        @endif

        <h2 class="font-bold mt-16 text-center text-xl">
            Latest posts
        </h2>

        <x-affiliate channel="index" class="flex items-center justify-center gap-6 mt-8" />

        @if ($posts->isNotEmpty())
            <div class="grid sm:grid-cols-2 gap-8 mt-8">
                @foreach ($posts as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('HH0P1ACM', 0)" />
                @endforeach
            </div>
        @endif
    </section>

    <x-newsletter class="container max-w-screen-sm mt-16" />

    <div class="bg-gray-900 flex-grow mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
