<x-app
    title="Learn about Laravel and its ecosystem."
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

                <x-icon-alpine-js
                    class="h-6 transition-all duration-500 delay-150 scale-75 opacity-0 md:h-8"
                    x-bind:class="{ '!scale-100 opacity-100': animate }"
                    x-intersect="animate = true"
                />

                <x-icon-tailwindcss
                    class="h-8 transition-all duration-500 delay-200 scale-75 opacity-0 md:h-12"
                    x-bind:class="{ '!scale-100 opacity-100': animate }"
                    x-intersect="animate = true"
                />

                <x-icon-vue-js
                    class="transition-all duration-500 delay-300 scale-75 opacity-0 h-9 md:h-11"
                    x-bind:class="{ '!scale-100 opacity-100': animate }"
                    x-intersect="animate = true"
                />
            </div>

            <div class="mt-8">Learn about Laravel and its&nbsp;ecosystem.</div>
        </x-slot:title>

        <p class="container mt-2 text-xl/tight md:text-2xl/tight lg:text-3xl/tight">
            Join more than <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">40,000</span> readers and skyrocket your web&nbsp;development&nbsp;skills.
        </p>

        <div class="container text-center mt-14 md:mt-28">
            <p class="font-medium sm:text-xl">
                From apps makers, to SaaS, and web hosting, my sponsors are worth checking out!
            </p>

            <x-sponsors />

            <div class="inline-flex flex-wrap items-center justify-center mt-9 font-handwriting">
                <a wire:navigate.hover href="{{ route('media-kit') }}" class="text-xl -ml-9 md:text-2xl sm:-ml-10 sm:text-3xl">
                    <x-icon-arrow-to-top-left class="inline w-8 h-8 -translate-y-3" /> <span class="underline decoration-1 underline-offset-2">Showcase your business too</span>
                </a>

                <span class="mx-2">or</span>

                <a href="https://benjamincrozat.lemonsqueezy.com/checkout/buy/eb4c5ce9-c87e-4497-ab6b-b0922654e658?discount=0" class="text-xl md:text-2xl sm:text-3xl">
                    <span class="underline decoration-1 underline-offset-2">support the blog</span>!
                </a>
            </div>
        </div>
    </x-section>

    <x-section class="container mt-16 md:mt-32">
        <x-slot:title class="text-center">
            <x-icon-trend class="h-16 mx-auto" />
            <div class="mt-2">Popular articles</div>
        </x-slot:title>

        <ul class="grid gap-16 mt-8 md:grid-cols-2">
            <li>
                <x-post-template
                    title="Your sponsored article here"
                    description="Talk about your business, stay on top of everything for a week, and get a valuable link for life."
                />
            </li>

            @foreach ($popular as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>
    </x-section>

    @if ($categories->isNotEmpty())
        <x-section class="container mt-32">
            <x-slot:title class="text-center">
                <x-icon-tag class="h-16 mx-auto" />
                <div class="mt-2">A variety of topics</div>
            </x-slot:title>

            <ul class="grid gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 md:gap-16">
                @foreach ($categories as $category)
                    <li class="h-full">
                        <x-home.category :category="$category" />
                    </li>
                @endforeach
            </ul>
        </x-section>
    @endif

    <x-section class="container mt-32">
        <x-slot:title class="text-center">
            <x-icon-clock class="h-16 mx-auto" />
            <div class="mt-2">Latest articles</div>
        </x-slot:title>

        <ul class="grid gap-16 mt-8 md:grid-cols-2">
            <li>
                <x-post-template
                    title="Your sponsored article here"
                    description="Talk about your business, stay on top of everything for a week, and get a valuable link for life."
                />
            </li>

            @foreach ($latest as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>
    </x-section>

    <x-section id="about" class="container mt-32 lg:max-w-screen-md scroll-mt-8">
        <x-slot:title class="text-center">
            <x-icon-anonymous class="h-16 mx-auto" />
            <div class="mt-2">About Benjamin Crozat</div>
        </x-slot:title>

        <x-prose class="mt-8">
            {!! Str::markdown(file_get_contents(resource_path('markdown/about.md'))) !!}
        </x-prose>
    </x-section>
</x-app>
