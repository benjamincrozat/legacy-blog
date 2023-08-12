<x-app
    title="The art of crafting web applications with Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications with PHP, Laravel and its ecosystem? This is the best blog to find your answer."
>
    @if ($posts->onFirstPage())
        @if ($pins->isNotEmpty())
            <section class="md:container md:max-w-[1024px] mt-10 md:mt-16">
                <div class="px-4 text-xl font-semibold text-center md:px-0">
                    Featured
                </div>

                <div class="flex gap-4 px-4 mt-8 overflow-x-scroll md:grid md:grid-cols-2 md:gap-8 md:px-0 md:overflow-x-visible snap-x md:snap-none snap-mandatory">
                    @foreach ($pins as $pin)
                        <x-pinned-post :post="$pin->post" :first="$loop->first" />
                    @endforeach
                </div>
            </section>
        @endif

        <div class="border-b-4 border-dotted border-gray-200 dark:border-gray-700 mt-16 mx-auto w-[100px]"></div>

        <x-newsletter class="container mt-8 md:mt-16">
            <div class="mt-8 md:flex md:items-center">
                <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=256" width="96" height="96" alt="Benjamin Crozat" class="float-right md:float-none mb-4 ml-4 mt-4 md:m-0 md:order-1 rounded-full w-[80px] h-[80px] md:w-[96px] md:h-[96px]" />

                <div>
                    <p>
                        Hi there! 👋
                    </p>

                    <p class="mt-4">
                        <strong class="font-semibold">I'm Benjamin Crozat</strong> and I have <strong class="font-semibold">+10 years of expertise</strong> in web development.
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

        <div class="border-b-4 border-dotted border-gray-200 dark:border-gray-700 mt-8 md:mt-16 mx-auto w-[100px]"></div>
    @endif

    @if ($popular->isNotEmpty() && $posts->onFirstPage())
        <section class="container lg:max-w-[1024px] mt-16">
            <div class="px-4 text-xl font-semibold text-center sm:px-0">
                Popular
            </div>

            <div class="grid gap-4 mt-8 md:grid-cols-2">
                @foreach ($popular as $post)
                    <x-post :post="$post" />
                @endforeach
            </div>
        </section>
    @endif

    @if ($community->isNotEmpty() && $posts->onFirstPage())
        <section class="container lg:max-w-[1024px] mt-16">
            <div class="px-4 text-xl font-semibold text-center sm:px-0">
                From the community
            </div>

            <div class="grid gap-4 mt-8 md:grid-cols-2">
                @foreach ($community as $post)
                    <x-post :post="$post" />
                @endforeach
            </div>
        </section>
    @endif

    <section class="container lg:max-w-[1024px] mt-16">
        <div class="px-4 text-xl font-semibold text-center sm:px-0">
            @if ($posts->onFirstPage())
                Latest
            @else
                Page {{ $posts->currentPage() }}
            @endif
        </div>

        @if ($posts->isNotEmpty())
            <div class="grid gap-4 mt-8 md:grid-cols-2">
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
            </div>

            @if ($posts->hasPages())
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            @endif
        @endif
    </section>

    <div class="mt-16 bg-gray-900 dark:bg-black">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
