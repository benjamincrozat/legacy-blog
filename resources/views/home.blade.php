<x-app
    title="Learn about Laravel and its ecosystem."
    :image="Vite::asset('resources/img/og-image-homepage.jpg')"
>
    <x-section class="mt-16 text-center">
        <x-slot:title tag="h1" class="container font-bold text-center text-3xl/none md:text-4xl/none lg:text-5xl/none">
            <div
                class="flex items-center justify-center gap-4 mt-8 md:gap-8"
                x-data="{ animate: false }"
            >
                <x-icon-laravel
                    class="transition-all duration-500 delay-0 scale-75 opacity-0 h-10 md:h-[3.25rem]"
                    x-bind:class="{ '!scale-100 opacity-100': animate }"
                    x-intersect="animate = true"
                />

                <x-icon-inertiajs
                    class="h-6 transition-all duration-500 delay-75 scale-75 opacity-0 md:h-8"
                    x-bind:class="{ '!scale-100 opacity-100': animate }"
                    x-intersect="animate = true"
                />

                <x-icon-livewire
                    class="h-8 transition-all duration-500 delay-100 scale-75 opacity-0 md:h-12"
                    x-bind:class="{ '!scale-100 opacity-100': animate }"
                    x-intersect="animate = true"
                />

                <x-icon-alpinejs
                    class="h-6 transition-all duration-500 delay-150 scale-75 opacity-0 md:h-8"
                    x-bind:class="{ '!scale-100 opacity-100': animate }"
                    x-intersect="animate = true"
                />

                <x-icon-tailwind-css
                    class="h-8 transition-all duration-500 delay-200 scale-75 opacity-0 md:h-12"
                    x-bind:class="{ '!scale-100 opacity-100': animate }"
                    x-intersect="animate = true"
                />

                <x-icon-vuejs
                    class="transition-all duration-500 delay-300 scale-75 opacity-0 h-9 md:h-11"
                    x-bind:class="{ '!scale-100 opacity-100': animate }"
                    x-intersect="animate = true"
                />
            </div>

            <div class="mt-8">Learn about Laravel and its&nbsp;ecosystem.</div>
        </x-slot:title>

        <p class="container mt-2 text-xl/tight md:text-2xl/tight lg:text-3xl/tight">
            Join more than <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">50,000</span> readers and skyrocket your web&nbsp;development&nbsp;skills.
        </p>

        <div id="sponsors" class="container text-center scroll-mt-8 mt-14 md:mt-28">
            <p class="font-medium sm:text-xl">
                From apps makers, to SaaS, web hosting, and more, my sponsors are worth checking out!
            </p>

            <x-sponsors-logos />

            <div class="inline-flex flex-wrap items-center justify-center mt-9 font-handwriting">
                <a wire:navigate.hover href="{{ route('media-kit') }}" class="text-xl -ml-9 md:text-2xl sm:-ml-10 sm:text-3xl">
                    <x-icon-arrow-to-top-left class="inline w-8 h-8 -translate-y-3" /> <span class="underline decoration-1 underline-offset-2">Promote your business too!</span>
                </a>
            </div>
        </div>
    </x-section>

    <x-section class="container mt-16 md:mt-32">
        <x-slot:title class="text-center">
            Popular articles
        </x-slot:title>

        <ul class="grid gap-16 mt-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($popular as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>
    </x-section>

    @if ($openings->isNotEmpty())
        <x-section class="container mt-16 md:mt-32">
            <x-slot:title class="text-center">
                @choice(':count job offer is available|:count job offers are available', $openings->count())
            </x-slot:title>

            <ul class="grid gap-16 mt-8 md:grid-cols-2">
                @foreach ($openings as $opening)
                    <li>
                        <x-opening :opening="$opening" />
                    </li>
                @endforeach
            </ul>

            <x-button :href="route('openings.index')" class="table w-full px-6 mx-auto mt-10 bg-gray-200 sm:w-auto">
                Learn more about job offers
            </x-button>
        </x-section>
    @endif

    <x-section id="tools" class="container mt-16 md:mt-32 scroll-mt-8">
        <x-slot:title class="text-center">
            Free and open source tools I made for developers
        </x-slot:title>

        <div class="grid gap-16 mt-8 md:grid-cols-2">
            <div class="flex flex-col col-span-1">
                <img src="{{ Vite::asset('resources/img/pint-express.jpg') }}" width="96" height="96" alt="Pint Express' logo" class="w-20 h-20 rounded-xl" />
                <h3 class="mt-4 text-xl font-bold">Pint Express</h3>
                <p class="flex-grow mt-2">Format and beautify your PHP code right right from the web instead of a terminal. This is useful for snippets found on StackOverflow, for instance.</p>
                <div class="flex items-center gap-2 mt-6">
                    <a href="https://github.com/benjamincrozat/benjamincrozat.com/blob/main/resources/views/livewire/pint-express.blade.php" target="_blank" rel="nofollow noopener" class="inline-block px-4 py-3 font-medium bg-gray-200 rounded">
                        Fork on GitHub
                    </a>

                    <a wire:navigate.over href="{{ route('pint-express') }}" class="inline-block px-4 py-3 font-medium text-white bg-blue-600 rounded">
                        Get started
                    </a>
                </div>
            </div>

            <div class="flex flex-col col-span-1">
                <img src="{{ Vite::asset('resources/img/pouest.jpg') }}" width="96" height="96" alt="Pouest" class="w-20 h-20 rounded-xl" />
                <h3 class="mt-4 text-xl font-bold">Pouest</h3>
                <p class="flex-grow mt-2">Instantly migrate your PHPUnit tests to Pest without using a terminal.</p>
                <div class="flex items-center gap-2 mt-6">
                    <a href="https://github.com/benjamincrozat/benjamincrozat.com/blob/main/resources/views/livewire/pouest.blade.php" target="_blank" rel="nofollow noopener" class="inline-block px-4 py-3 font-medium bg-gray-200 rounded">
                        Fork on GitHub
                    </a>

                    <a wire:navigate.over href="{{ route('pouest') }}" class="inline-block px-4 py-3 font-medium text-white bg-blue-600 rounded">
                        Get started
                    </a>
                </div>
            </div>
        </div>
    </x-section>

    <x-section class="container mt-32">
        <x-slot:title class="text-center">
            Latest articles
        </x-slot:title>

        <ul class="grid gap-16 mt-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($latest as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>

        <x-button :href="route('posts.index')" class="table w-full px-6 mx-auto mt-10 bg-gray-200 sm:w-auto">
            See more of the latest articles
        </x-button>
    </x-section>

    <x-section id="about" class="container mt-32 lg:max-w-screen-md scroll-mt-8">
        <x-slot:title class="text-center">
            About Benjamin Crozat
        </x-slot:title>

        <x-prose class="mt-8">
            {!! Str::markdown(file_get_contents(resource_path('markdown/about.md'))) !!}
        </x-prose>
    </x-section>

    <x-donate id="donate" class="container mt-32 lg:max-w-screen-md" />
</x-app>
