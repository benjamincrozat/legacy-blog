<x-app
    title="The blog of Benjamin Crozat: PHP, Laravel and its ecosystem"
    description="Have you ever had a question about the art of crafting web applications with PHP, Laravel and its ecosystem? This is the best blog to find your answer."
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-nav class="container mt-4 md:mt-8" />

    <h1 class="hidden">The blog of Benjamin Crozat: PHP, Laravel and its ecosystem</h1>

    <div class="container sm:max-w-screen-xs md:max-w-screen-sm mt-16 text-center">
        <x-icon-logos />
    </div>

    <x-newsletter class="container mt-8">
        <p class="mt-8">
            Hi there! 👋
        </p>

        <p class="mt-4">
            I'm Benjamin Crozat, a web developer with more than <strong class="font-semibold dark:text-white">15 years of experience</strong>.
        </p>

        <p class="mt-4">
            Understanding the web and being able to build websites is a serious advantage nowadays. You get job security and can build a business starting with nothing. <strong class="font-semibold dark:text-white">I want to share with you everything I learn</strong> about it.
        </p>
    </x-newsletter>

    @if ($pins->isNotEmpty())
        <section class="md:container md:max-w-[1024px] mt-16">
            <div class="font-semibold px-4 md:px-0 text-center text-xl">
                Pinned articles
            </div>

            <div class="flex md:grid md:grid-cols-2 gap-2 mt-8 px-4 md:px-0 overflow-x-scroll md:overflow-x-visible snap-x md:snap-none snap-mandatory">
                @foreach ($pins as $pin)
                    <x-pinned-post :post="$pin->post" :first="$loop->first" />
                @endforeach
            </div>
        </section>
    @endif

    <section class="container max-w-[1024px] mt-16">
        <div class="font-semibold px-4 sm:px-0 text-center text-xl">
            Latest articles
        </div>

        @if ($posts->isNotEmpty())
            <div class="grid md:grid-cols-2 gap-4 mt-8">
                @foreach ($posts as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('HH0P1ACM', 0)" />
                @endforeach
            </div>
        @endif
    </section>

    <div class="bg-gray-900 dark:bg-black mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
