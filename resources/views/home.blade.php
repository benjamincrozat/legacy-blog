<x-app
    description="Have you ever had a question about PHP, Laravel or anything related to its ecosystem? This is the best blog to find your answer."
>
    <x-head />

    <section class="container mt-16">
        <header class="text-center">
            <h2 class="font-thin !leading-tight text-lg sm:text-xl md:text-2xl">
                <span>Improve your <strong class="font-semibold">PHP</strong> and <strong class="font-semibold">Laravel</strong> skills in <strong class="font-semibold">2022</strong>.</span><br />
                <span>
                    <strong class="font-semibold">News</strong>,
                    <strong class="font-semibold">tutorials</strong>,
                    <strong class="font-semibold">tips</strong>
                    and
                    <strong class="font-semibold">tricks</strong>.
                </span>
            </h2>

            <h3 class="!leading-tight max-w-[480px] mt-4 mx-auto text-sm sm:text-base">
                Some of the best PHP developers started their career thanks to the power of knowledge sharing of the Internet.
            </h3>
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
