@empty($funnel)
    <a href="https://smousss.com" target="_blank "class="block text-gray-600 bg-gradient-to-r from-gray-100 dark:from-gray-900 dark:from-gray-700/50 to-gray-200/[.65] dark:to-gray-800/50 font-medium leading-tight text-sm dark:text-white">
        <div class="container flex items-center justify-between gap-4 py-4 ">
            <div>
                <div>“I created an AI assistant for Laravel developers that handles all the boring work.”</div>

                <div class="mt-2 font-medium text-blue-400">
                    Try it for free!
                </div>
            </div>

            <img
                loading="lazy"
                src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=128"
                width="48"
                height="48"
                alt="Smousss"
                class="flex-shrink-0 w-[48px] h-[48px] md:w-[64px] md:h-[64px] rounded-full"
            />
        </div>
    </a>
@endempty

<div {{ $attributes->merge(['class' => 'container flex items-center justify-between'])}}>
    <a
        href="{{ route('home') }}"
        class="flex items-center gap-3 sm:flex-shrink-0"
        @click="window.fathom?.trackGoal('XAQUA2K4', 0)"
    >
        <x-icon-logo class="flex-shrink-0 w-8 h-8 text-black fill-current dark:text-white md:w-10 md:h-10" />

        <span class="text-sm leading-tight sr-only md:not-sr-only">
            <span class="block font-medium text-black dark:text-white">Benjamin Crozat</span>
            <span class="block opacity-75">The art of crafting web applications</span>
        </span>
    </a>

    @empty($funnel)
        <button class="flex items-center gap-2 transition-colors group hover:text-indigo-400" @click="searching = true; window.fathom?.trackGoal('NV4ZNM3W', 0)">
            <x-heroicon-s-magnifying-glass class="-translate-y-[.5px] sm:-translate-y-0 flex-shrink-0 w-4 h-4" />

            Search

            <span class="border dark:border-gray-800 inline-block px-2 py-[.35rem] rounded scale-90 !text-gray-600 dark:!text-gray-300 text-xs sm:translate-y-px uppercase">
                ⌘K
            </span>
        </button>
    @endempty
</div>
