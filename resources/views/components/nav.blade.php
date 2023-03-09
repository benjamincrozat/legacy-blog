<a href="https://blogging-with-laravel.com" class="bg-gradient-to-r from-gray-900 dark:from-gray-800/50 to-gray-700 dark:to-gray-700/50 block">
    <div class="container flex items-center justify-between gap-4 leading-tight py-4 text-sm text-white">
        <div>
            <div class="font-normal">
                Blogging with
                <span class="bg-clip-text bg-gradient-to-r from-red-300 to-red-400 text-transparent">Laravel</span>
            </div>

            <div class="mt-1 text-gray-200">
                Build a better blog with <span class="bg-clip-text bg-gradient-to-r from-red-300 to-red-400 font-normal text-transparent">Laravel</span>. Get <span class="bg-clip-text bg-gradient-to-r from-orange-300 to-orange-600 font-normal text-transparent" style="text-shadow: 0 0 5px rgb(253 186 116 / 50%)">10K monthly visitors</span> from Google in just 6 months.

                <div class="flex items-center gap-[.35rem] mt-2 text-blue-400">
                    Pre-order now

                    <x-heroicon-o-arrow-right class="w-3 h-3" />
                </div>
            </div>
        </div>

        <div class="bg-white/10 flex-shrink-0 overflow-hidden relative rounded-full w-16 h-16">
            <x-icon-blogging-with-laravel
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 mt-2 w-24 h-24"
            />
        </div>
    </div>
</a>

<div {{ $attributes->merge(['class' => 'container flex items-center justify-between'])}}>
    <a
        href="{{ route('home') }}"
        class="flex sm:flex-shrink-0 items-center gap-3"
        @click="window.fathom?.trackGoal('XAQUA2K4', 0)"
    >
        <x-icon-logo class="fill-current flex-shrink-0 text-black dark:text-white w-8 h-8 md:w-10 md:h-10" />

        <span class="leading-tight sr-only md:not-sr-only text-sm">
            <span class="block font-medium text-black dark:text-white">Benjamin Crozat</span>
            <span class="block opacity-75">The art of crafting web applications</span>
        </span>
    </a>

    @if (empty($funnel))
        <div class="flex items-center gap-2">
            <button class="flex items-center gap-2 group hover:text-indigo-400 transition-colors" @click="searching = true; window.fathom?.trackGoal('NV4ZNM3W', 0)">
                <x-heroicon-s-magnifying-glass class="-translate-y-[.5px] sm:-translate-y-0 flex-shrink-0 w-4 h-4" />
                Search
            </button>

            <span class="border dark:border-gray-800 inline-block px-2 py-[.35rem] rounded scale-90 text-xs sm:translate-y-px uppercase">
                ⌘K
            </span>
        </div>
    @endif
</div>
