@empty($funnel)
    <x-announcement />
@endempty

<div {{ $attributes->merge(['class' => 'container flex items-center justify-between relative sm:static'])}}>
    <x-logo />

    <div class="flex items-center gap-6 md:gap-8">
        <div class="sm:relative" x-data="{ open: false }" @click.away="open = false">
            <button
                class="flex items-center gap-2"
                @click="open = ! open; window.fathom?.trackGoal('HZPIZREN', 0)"
            >
                Goodies
                <x-heroicon-o-chevron-down
                    class="w-4 h-4 transition-transform translate-y-px"
                    x-bind:class="{ 'rotate-180': open }"
                />
            </button>

            <ul
                class="absolute z-10 py-2 bg-white rounded-md shadow-lg left-4 sm:left-auto sm:w-[300px] md:w-[350px] lg:w-[400px] sm:right-0 right-4 top-full"
                x-cloak
                x-show="open"
                x-transition
            >
                <li>
                    <a
                        href="https://smousss.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="block px-4 py-2 transition-colors group hover:bg-indigo-400 hover:text-white"
                        @click="window.fathom?.trackGoal('FIMDOB8S', 0)"
                    >
                        <span class="block font-medium">Smousss</span>
                        <span class="block text-sm text-gray-500 group-hover:text-indigo-100">An AI-powered assistant for Laravel developers.</span>
                    </a>
                </li>

                <li>
                    <a
                        href="https://twitter.com/benjamincrozat"
                        target="_blank"
                        rel="nofollow noopener noreferrer"
                        class="block px-4 py-2 transition-colors group hover:bg-indigo-400 hover:text-white"
                        @click="window.fathom?.trackGoal('FIMDOB8S', 0)"
                    >
                        <span class="block font-medium">Follow me on Twitter</span>
                        <span class="block text-sm text-gray-500 group-hover:text-indigo-100">Free web development content, daily.</span>
                    </a>
                </li>

                <li>
                    <a
                        href="https://app.usefathom.com/share/qtfeilsd/benjamin+crozat?page=1&range=last_month&sort=visitors%3Adesc"
                        target="_blank"
                        rel="nofollow noopener noreferrer"
                        class="block px-4 py-2 transition-colors group hover:bg-indigo-400 hover:text-white"
                        @click="window.fathom?.trackGoal('FIMDOB8S', 0)"
                    >
                        <span class="block font-medium">My live analytics dashboard</span>
                        <span class="block text-sm text-gray-500 group-hover:text-indigo-100">See the growth of my blog for yourself.</span>
                    </a>
                </li>
            </ul>
        </div>

        @empty($funnel)
            <x-search-btn />
        @endempty
    </div>
</div>
