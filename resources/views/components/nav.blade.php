@php
$promotesAffiliateLinks = request()->route()->post?->promotes_affiliate_links;
@endphp

@if (! $promotesAffiliateLinks)
    <div {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-between gap-8']) }}>
        <a href="{{ route('home') }}">
            <x-icon-logo class="h-7 sm:h-8 md:h-9" />
        </a>

        <nav
            class="flex items-center gap-4 sm:gap-6 text-xs sm:text-sm"
            @click.away="open = false"
            x-data="{ open: false }"
        >
            <button class="hover:text-indigo-400 transition-colors" @click="searching = true">
                <x-heroicon-o-magnifying-glass class="h-4 sm:h-5 inline" />
                <span class="sr-only">Search</span>
            </button>

            <div class="relative text-white">
                <button
                    class="bg-gradient-to-r from-indigo-300 dark:from-indigo-500 to-indigo-400 dark:to-indigo-600 hover:-hue-rotate-90 flex items-center gap-2 pl-4 pr-3 py-2 rounded shadow-lg w-full"
                    :class="{ 'bg-gray-800 hover:hue-rotate-0 dark:bg-black bg-none rounded-none rounded-t': open }"
                    @click="open = ! open; window.fathom?.trackGoal('AT7WQBDZ', 0)"
                >
                    Learn
                    <x-heroicon-o-chevron-down class="w-3 h-3 translate-y-px transition-transform duration-500" x-bind:class="{ 'rotate-180': open }" />
                </button>

                <span
                    class="absolute -top-2 -right-3 bg-gradient-to-r from-yellow-500 to-orange-500 group-hover:-hue-rotate-90
                    leading-none px-2 py-1 rounded-full scale-75 shadow-lg text-xs translate-y-px transition-colors"
                >
                    New
                </span>

                <ul
                    class="absolute top-full right-0 bg-gray-800 dark:bg-black min-w-[320px] py-2 rounded rounded-tr-none shadow-xl text-sm z-10"
                    x-cloak
                    x-show="open"
                >
                    <li class="font-light text-gray-400 my-2 px-4 text-xs uppercase">
                        Courses
                    </li>

                    <li>
                        <span
                            class="flex items-center gap-1 group px-4 py-2 hover:text-white transition-colors"
                            @click="window.fathom?.trackGoal('FDAGEMV8', 0)"
                        >
                            SEO Wizardry for Developers
                            <span
                                class="bg-gradient-to-r from-indigo-300 to-indigo-500 leading-none px-2 py-1 rounded-full scale-75 text-xs translate-y-px transition-colors"
                            >
                                Soon
                            </span>
                        </span>
                    </li>

                    <li class="font-light text-gray-400 my-2 px-4 text-xs uppercase">
                        Consulting
                    </li>

                    <li>
                        <a
                            href="{{ route('consulting.laravel') }}"
                            class="hover:bg-blue-500 dark:hover:bg-blue-900/50 block px-4 py-2 hover:text-white transition-colors"
                            @click="window.fathom?.trackGoal('SJKONFQC', 0)"
                        >
                            Laravel
                        </a>
                    </li>

                    <li>
                        <span
                            class="flex items-center gap-1 px-4 py-2 hover:text-white transition-colors"
                        >
                            SEO
                            <span
                                class="bg-gradient-to-r from-indigo-300 to-indigo-500 leading-none px-2 py-1 rounded-full scale-75 text-xs transition-colors"
                            >
                                Soon
                            </span>
                        </span>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
@else
    <div {{ $attributes->merge(['class' => 'text-center']) }}>
        <a href="{{ route('home') }}">
            <x-icon-logo-alt class="h-20 inline" />
        </a>
    </div>
@endif
