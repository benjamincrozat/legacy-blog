<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog-nav class="container mt-4 md:mt-8" />

    <x-newsletter class="container mt-16">
        <p class="mt-8">
            Hi there! 👋
        </p>

        <p class="mt-4">
            I'm Benjamin Crozat, a web developer with more than <strong class="font-bold dark:text-white">15 years of experience</strong>.
        </p>

        <p class="mt-4">
            Understanding the web and being able to build websites is a serious advantage nowadays. You get job security and can build a business starting with nothing. <strong class="font-bold dark:text-white">I want to share with you everything I learn</strong> about it.
        </p>
    </x-newsletter>

    @if ($highlighted->isNotEmpty())
        <section class="md:container md:max-w-[1024px] mt-16">
            <h2 class="font-bold px-4 md:px-0 text-center text-xl">
                Featured articles
            </h2>

            <div class="flex md:grid md:grid-cols-2 gap-2 mt-8 px-4 md:px-0 overflow-x-scroll md:overflow-x-visible snap-x md:snap-none snap-mandatory">
                @foreach ($highlighted as $post)
                    <x-highlighted :post="$post" :first="$loop->first" />
                @endforeach
            </div>
        </section>
    @endif

    <section class="md:container md:max-w-[1024px] mt-8 sm:mt-16">
        <h2 class="font-bold px-4 sm:px-0 text-center text-xl">
            Discover awesome products that will help you grow your business
        </h2>

        @if ($deals->isNotEmpty())
            <div class="flex md:grid md:grid-cols-2 gap-4 mt-8 px-4 md:px-0 overflow-x-scroll md:overflow-x-visible snap-x md:snap-none snap-mandatory">
                @foreach ($deals as $deal)
                    <x-deal :deal="$deal" class="flex-shrink-0 snap-start sm:snap-center md:snap-normal scroll-ml-4 md:scroll-ml-0 w-[90%] sm:w-[70%] md:w-auto" />
                @endforeach
            </div>
        @endif

        <div class="container mt-4 text-center">
            <a
                href="{{ route('deals.index') }}"
                class="bg-gradient-to-r from-indigo-300 dark:from-indigo-500 to-indigo-400 dark:to-indigo-600 block sm:inline-block font-bold px-4 sm:px-16 py-3 rounded shadow-md text-center text-white"
                @click="window.fathom?.trackGoal('3JGZ4TJG', 0)"
            >
                See all awesome products
            </a>
        </div>
    </section>

    <section class="container max-w-[1024px] mt-16">
        <h2 class="font-bold px-4 sm:px-0 text-center text-xl">
            Latest articles
        </h2>

        @if ($posts->isNotEmpty())
            <div class="grid md:grid-cols-2 gap-4 mt-8">
                @foreach ($posts->whereNotIn('id', $highlighted->pluck('id')) as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('HH0P1ACM', 0)" />
                @endforeach
            </div>
        @endif
    </section>

    <div class="bg-gray-900 dark:bg-black flex-grow mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
