@if (empty($funnel))
    <div {{ $attributes->merge(['class' => 'container flex items-center justify-between'])}}>
        <a href="{{ route('home') }}" class="font-bold !leading-none dark:text-white text-sm md:text-base">
            <div class="md:inline">Benjamin</div>
            <div class="md:inline mt-[.15rem] md:mt-0">Crozat</div>
        </a>

        <nav class="flex items-center gap-6 text-sm">
            <a href="{{ route('home') }}" class="hover:text-indigo-400 transition-colors">
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
                    <x-heroicon-o-chevron-down
                        class="duration-500 inline transition-transform translate-y-px w-3 h-3"
                        x-bind:class="{ 'rotate-180': open }"
                    />
                </button>

                <div
                    class="absolute top-full right-0 backdrop-blur-md backdrop-brightness-150 backdrop-saturate-150 bg-black/75 min-w-[300px] mt-2 py-2 rounded-lg shadow-xl text-gray-300 z-10"
                    x-cloak
                    x-show="open"
                    x-transition
                >
                    <div class="my-2 px-4 opacity-50 text-xs">What services do you need?</div>

                    <ul>
                        <li>
                            <a href="{{ route('consulting.laravel') }}" class="hover:bg-indigo-400 dark:hover:bg-indigo-700 flex items-center gap-3 group px-4 py-2 hover:text-white duration-500 transition-colors">
                                <div class="flex-shrink-0 text-red-400 group-hover:text-white transition-colors w-6"><x-heroicon-o-code-bracket-square class="w-6 h-6" /></div>

                                <div>
                                    <div>Laravel developer</div>
                                    <div class="opacity-75 text-xs">Extra workforce for your business.</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('consulting.cto') }}" class="hover:bg-indigo-400 dark:hover:bg-indigo-700 flex items-center gap-3 group px-4 py-2 hover:text-white duration-500 transition-colors">
                                <div class="flex-shrink-0 text-yellow-400 group-hover:text-white transition-colors w-6"><x-heroicon-o-bolt class="w-6 h-6" /></div>

                                <div>
                                    <div>On-demand virtual CTO</div>
                                    <div class="opacity-75 text-xs">10+ years of technical experience at your service.</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="https://savvycal.com/benjamincrozat/ask-me-anything" class="hover:bg-indigo-400 dark:hover:bg-indigo-700 flex items-center gap-3 group px-4 py-2 hover:text-white duration-500 transition-colors">
                                <div class="flex-shrink-0 text-blue-400 group-hover:text-white transition-colors w-6"><x-heroicon-o-presentation-chart-line class="w-6 h-6" /></div>

                                <div>
                                    <div>Search Engine Optimization (SEO)</div>
                                    <div class="opacity-75 text-xs">Drive more traffic for more revenues.</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
@else
    <div class="-mb-2 mt-8 text-center">
        <a href="{{ route('home') }}" class="font-bold !leading-none text-lg dark:text-white">
            Benjamin Crozat
        </a>

        <div class="opacity-75">The art of crating web applications</div>
    </div>
@endif
