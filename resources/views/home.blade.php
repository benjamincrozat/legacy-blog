<x-app
    description="Have you ever had a question about PHP, Laravel or anything related to its ecosystem? This is the best blog to find your answer."
>
    <x-head />

    <section class="container mt-16">
        <header class="text-center">
            <h2 class="font-semibold font-serif sm:text-lg md:text-xl">
                Improve your PHP & Laravel skills in 2022
            </h2>

            <p class="font-serif max-w-screen-sm mt-2 mx-auto text-sm sm:text-base">
                The best PHP developers started their career thanks to the power of knowledge&nbsp;sharing&nbsp;of&nbsp;the&nbsp;Internet.
            </p>
        </header>

        @if ($posts->isNotEmpty())
            <ul class="border-t grid gap-12 mt-8 sm:mt-16 pt-8 sm:pt-16">
                @foreach ($posts as $post)
                    <li><x-post :post="$post" /></li>
                @endforeach
            </ul>
        @endif
    </section>

    <div class="bg-gray-100 mt-8 sm:mt-16 py-8 sm:py-16">
        <x-newsletter class="container max-w-screen-sm scroll-mt-8 sm:scroll-mt-16" />
    </div>

    {{-- About --}}
    <x-about />
</x-app>
