<div {{ $attributes->merge(['class' => 'container flex items-center justify-between'])}}>
    <div class="font-bold leading-none dark:text-white">
        <div class="sm:inline">Benjamin</div>
        <div class="sm:inline">Crozat</div>
    </div>

    <nav class="flex items-center justify-end gap-6 text-sm">
        <a href="{{ route('home') }}" class="hover:text-indigo-400 transition-colors @if (Route::is('home') || Route::is('posts.show')) decoration-black/30 underline underline-offset-4 @endif">
            Learn
        </a>

        <button class="hover:text-indigo-400 transition-colors" @click="searching = true; window.fathom?.trackGoal('NV4ZNM3W', 0)">
            Search
        </button>

        <div
            class="relative"
            x-data="{ open: false }"
            @click.away="open = false"
        >
            <button class="flex items-center gap-1 text-indigo-400" @click="open = ! open; window.fathom?.trackGoal('5N03QFKC', 0)">
                <span>Hire me</span>
                <x-heroicon-o-chevron-down class="inline translate-y-px w-3 h-3" />
            </button>

            <div
                class="absolute top-full right-0 bg-white dark:bg-gray-800 min-w-[250px] py-2 rounded-lg shadow-xl"
                x-cloak
                x-show="open"
                x-transition
            >
                <div class="my-2 px-4 opacity-50 text-xs">What services do you need?</div>

                <ul>
                    <li>
                        <a href="{{ route('consulting.laravel') }}" class="hover:bg-indigo-400 dark:hover:bg-indigo-700 block px-4 py-2 hover:text-white duration-500 transition-colors">
                            <div>Laravel developer</div>
                            <div class="opacity-75 text-xs">Extra workforce for your business.</div>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('consulting.cto') }}" class="hover:bg-indigo-400 dark:hover:bg-indigo-700 block px-4 py-2 hover:text-white duration-500 transition-colors">
                            <div>On-demand virtual CTO</div>
                            <div class="opacity-75 text-xs">10+ years of technical experience at your service.</div>
                        </a>
                    </li>

                    <li>
                        <a href="https://savvycal.com/benjamincrozat/ask-me-anything" class="hover:bg-indigo-400 dark:hover:bg-indigo-700 block px-4 py-2 hover:text-white duration-500 transition-colors">
                            <div>Search Engine Optimization (SEO)</div>
                            <div class="opacity-75 text-xs">Drive more traffic for more revenues.</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
