@empty($funnel)
    <x-announcement />
@endempty

<div {{ $attributes->merge(['class' => 'container flex items-center justify-between relative sm:static'])}}>
    <x-logo />

    @empty($funnel)
        <div class="flex items-center gap-6 md:gap-8">
            <div class="sm:relative" x-data="{ open: false }" @click.away="open = false">
                <button class="flex items-center gap-2" @click="open = ! open">
                    For you
                    <x-heroicon-o-chevron-down
                        class="w-4 h-4 transition-transform translate-y-px"
                        x-bind:class="{ 'rotate-180': open }"
                    />
                </button>

                <ul
                    class="absolute z-10 bg-white/90 backdrop-brightness-150 backdrop-saturate-150 dark:bg-black/[.75] backdrop-blur-md rounded-lg overflow-hidden shadow-lg left-4 sm:left-auto sm:w-[300px] md:w-[350px] lg:w-[400px] sm:right-0 right-4 top-full"
                    x-cloak
                    x-show="open"
                    x-transition
                >
                    <li>
                        <a
                            href="https://benjamincrozat.com/best-web-development-tools#26d0a66f80201fbc1d3965a7f3365e83"
                            class="flex items-center gap-4 p-4 transition-colors duration-500 group hover:bg-indigo-700/60 hover:text-white"
                        >
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded bg-emerald-400">
                                <x-heroicon-s-wrench-screwdriver class="w-8 h-8 text-white" />
                            </div>

                            <div class="leading-tight">
                                <div class="font-medium">
                                    The tools I use
                                </div>

                                <div class="text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">
                                    Here are the best free and paid tools I use in 2023 to do my job.
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('phpunit-to-pest') }}"
                            class="flex items-center gap-4 p-4 transition-colors duration-500 group hover:bg-indigo-700/60 hover:text-white"
                        >
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded bg-gradient-to-r from-blue-300 via-emerald-400 to-pink-400">
                                <x-heroicon-s-forward class="w-8 h-8 text-white" />
                            </div>

                            <div class="leading-tight">
                                <div class="font-medium">
                                    Pouest
                                </div>

                                <div class="text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">
                                    Instantly migrate your tests to Pest for free.
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a
                            href="https://superchargedlaravel.com"
                            class="flex items-center gap-4 p-4 transition-colors duration-500 group hover:bg-indigo-700/60 hover:text-white"
                        >
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-gray-900 rounded">
                                <x-heroicon-s-bolt class="w-6 h-6 text-yellow-400" />
                            </div>

                            <div class="leading-tight">
                                <div class="font-medium">
                                    Supercharged Laravel
                                </div>

                                <div class="text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">
                                    Learn how to generate production-ready Laravel code faster, and be your company's hero.
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a
                            href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=today&scale=day"
                            class="flex items-center gap-4 p-4 transition-colors duration-500 group hover:bg-indigo-700/60 hover:text-white"
                        >
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-blue-400 rounded">
                                <x-heroicon-s-chart-bar class="w-6 h-6 text-white" />
                            </div>

                            <div class="leading-tight">
                                <div class="font-medium">
                                    My blog's live analytics dashboard
                                </div>

                                <div class="text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">
                                    Curious? See the growth of my blog for yourself, free of charge.
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <x-search-btn />
        </div>
    @endempty
</div>
