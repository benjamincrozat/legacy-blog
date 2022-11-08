<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog.top />

    <div class="container md:hidden mt-8 sm:mt-16">
        <x-newsletter class="text-sm" />
    </div>

    <section class="md:container mt-8 sm:mt-16">
        <h2 class="font-bold px-4 md:px-0 text-center text-xl">
            Featured posts
        </h2>

        @if ($featured->isNotEmpty())
            <div class="flex md:grid md:grid-cols-2 gap-2 mt-8 px-4 md:px-0 overflow-x-scroll md:overflow-x-visible snap-x md:snap-none snap-mandatory">
                @foreach ($featured as $post)
                    <x-blog.featured :post="$post" />
                @endforeach
            </div>
        @endif
    </section>

    <section class="container mt-8 sm:mt-16">
        <h2 class="font-bold px-4 sm:px-0 text-center text-xl">
            Latest posts
        </h2>

        @if (! should_display_ads())
            <x-banner :banner="$banners->first()" class="max-w-screen-sm mt-8 mx-auto text-center text-sm md:text-base" />
        @endif

        @if ($posts->isNotEmpty())
            <div class="grid md:grid-cols-2 gap-4 mt-8">
                @foreach ($posts as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('HH0P1ACM', 0)" />
                @endforeach
            </div>
        @endif
    </section>

    <div class="container md:hidden mt-16">
        <x-newsletter class="text-sm" />
    </div>

    <div class="bg-gray-900 dark:bg-black flex-grow mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
