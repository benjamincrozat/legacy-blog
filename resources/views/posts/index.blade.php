<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog.top />

    <div class="container md:hidden mt-8 sm:mt-16">
        <x-newsletter />
    </div>

    <section class="md:container mt-8 sm:mt-16">
        <h2 class="font-bold px-4 md:px-0 text-center text-xl">
            Featured posts
        </h2>

        @if ($featured->isNotEmpty())
            <div class="flex md:grid md:grid-cols-2 gap-2 mt-8 px-4 md:px-0 overflow-x-scroll md:overflow-x-visible snap-x md:snap-none snap-mandatory">
                @foreach ($featured as $post)
                    <figure class="flex-shrink-0 snap-start sm:snap-center md:snap-normal scroll-ml-4 md:scroll-ml-0 w-[90%] sm:w-[70%] md:w-auto">
                        <a href="{{ route('posts.show', $post->slug) }}" @click="window.fathom?.trackGoal('OKJIR46O', 0)">
                            <img
                                loading="lazy"
                                src="{{ str_replace('w_auto', 'w_600', $post->image) }}"
                                alt="{{ $post->title }}"
                                class="aspect-video dark:brightness-75 object-cover rounded-md w-full"
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
    </section>

    <section class="container mt-8 sm:mt-16">
        <h2 class="font-bold px-4 sm:px-0 text-center text-xl">
            Latest posts
        </h2>

        @if (! should_display_ads())
            <x-banner :banner="$banners->first()" class="mt-8 text-center" />
        @endif

        @if ($posts->isNotEmpty())
            <div class="grid md:grid-cols-2 gap-4 md:gap-8 mt-8">
                @foreach ($posts as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('HH0P1ACM', 0)" />
                @endforeach
            </div>
        @endif
    </section>

    <div class="container md:hidden mt-16">
        <x-newsletter />
    </div>

    <div class="bg-gray-900 dark:bg-black flex-grow mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
