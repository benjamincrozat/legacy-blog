<x-app
    title="The blog of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications with PHP, Laravel and its ecosystem? This is the best blog to find your answer."
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-nav class="container mt-6" />

    <h1 class="hidden">The blog of Benjamin Crozat: PHP, Laravel and its ecosystem</h1>

    <x-newsletter class="container mt-16">
        <div class="md:flex md:items-center mt-8">
            <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=256" width="96" height="96" alt="Benjamin Crozat" class="float-right md:float-none mb-4 ml-4 mt-4 md:m-0 md:order-1 rotate-2 rounded-full w-[80px] h-[80px] md:w-[96px] md:h-[96px]" />

            <div>
                <p>
                    Hi there! 👋
                </p>

                <p class="mt-4">
                    <strong class="font-semibold">I'm Benjamin Crozat</strong> and I have <strong class="font-semibold">10+ years of expertise</strong> in web development.
                </p>

                <p class="mt-4">
                    Understanding and building for the web can give you a significant advantage. It provides job security and allows you to start a business from scratch.
                </p>

                <p class="mt-4">
                    I want to share with you everything I learn, <strong class="font-semibold">for free</strong>.
                </p>
            </div>
        </div>
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
