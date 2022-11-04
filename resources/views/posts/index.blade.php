<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog.top />

    <section id="articles" class="sm:container mt-8 sm:mt-16">
        <h2 class="font-bold px-4 sm:px-0 text-center text-xl">
            Featured posts
        </h2>

        @if ($featured->isNotEmpty())
            <div class="flex sm:grid sm:grid-cols-2 gap-2 mt-8 px-4 sm:px-0 overflow-x-scroll sm:overflow-x-visible snap-x sm:snap-none snap-mandatory">
                @foreach ($featured as $post)
                    <figure class="flex-shrink-0 snap-start sm:snap-normal scroll-ml-4 sm:scroll-ml-0 w-[90%] sm:w-auto">
                        <a href="{{ route('posts.show', $post->slug) }}" @click="window.fathom?.trackGoal('OKJIR46O', 0)">
                            <img
                                loading="lazy"
                                src="{{ str_replace('w_auto', 'w_600', $post->image) }}"
                                alt="{{ $post->title }}"
                                class="aspect-video object-cover rounded-md w-full"
                            />
                        </a>

                        <a href="{{ route('posts.show', $post->slug) }}" class="bg-gray-900 dark:bg-gradient-to-r from-white dark:from-gray-800 to-gray-50/30 dark:to-gray-700/50 block leading-tight mt-2 p-3 rounded-md text-sm text-white dark:text-current" @click="window.fathom?.trackGoal('OKJIR46O', 0)">
                            <figcaption class="flex items-center justify-between gap-4">
                                <span class="truncate">{{ $post->title }}</span>
                                <x-heroicon-o-arrow-right class="flex-shrink-0 w-3 h-3" />
                            </figcaption>
                        </a>
                    </figure>
                @endforeach
            </div>
        @endif

        <h2 class="font-bold mt-16 px-4 sm:px-0 text-center text-xl">
            Latest posts
        </h2>

        <x-affiliate
            channel="index"
            class="flex flex-wrap sm:flex-nowrap sm:items-center justify-center gap-4 sm:gap-8 mt-8 mx-4 sm:mx-0 py-6 sm:p-4"
        />

        @if ($posts->isNotEmpty())
            <div class="grid sm:grid-cols-2 gap-4 sm:gap-8 mt-8 mx-4 sm:mx-0">
                @foreach ($posts as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('HH0P1ACM', 0)" />
                @endforeach
            </div>
        @endif
    </section>

    <x-newsletter class="container max-w-screen-sm mt-16" />

    <div class="bg-gray-900 dark:bg-black flex-grow mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
