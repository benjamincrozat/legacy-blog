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

    <nav class="flex items-center gap-6 text-sm">
        @if (empty($funnel))
            <button class="hover:text-indigo-400 transition-colors" @click="searching = true; window.fathom?.trackGoal('NV4ZNM3W', 0)">
                Search
            </button>

            <a href="https://blogging-with-laravel.com" class="decoration-indigo-400/30 relative text-indigo-400 underline underline-offset-4">
                Blogging with Laravel

                <span class="-mr-2 bg-gradient-to-r from-indigo-300 to-indigo-400 inline-block leading-tight px-3 py-1 rounded-full scale-75 text-white text-xs uppercase">
                    New
                </span>
            </a>
        @endif
    </nav>
</div>
