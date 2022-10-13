<x-app
    description="Have you ever had a question about PHP, Laravel or anything related to its ecosystem? This is the best blog to find your answer."
>
    <header class="container flex items-center justify-between">
        <h1>
            <a
                href="{{ route('home') }}"
                class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase"
            >
                Benjamin Crozat
            </a>

            <span class="block text-gray-500 text-xs tracking-widest uppercase">
                Everything PHP & Laravel
            </span>
        </h1>

        <x-nav />
    </header>

    <section class="container mt-16">
        <header class="font-serif text-center">
            <h2 class="font-light sm:font-normal md:font-light text-lg sm:text-xl md:text-2xl">
                <span>Improve your <strong class="font-semibold">PHP</strong> & <strong class="font-semibold">Laravel</strong> skills in <strong class="font-semibold">2022</strong>
            </h2>

            <h3 class="font-normal sm:font-light max-w-screen-sm mt-4 mx-auto text-sm sm:text-base">
                The best PHP developers started their career thanks to the power of knowledge&nbsp;sharing&nbsp;of&nbsp;the&nbsp;Internet.
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
