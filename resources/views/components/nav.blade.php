<div {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-between gap-8']) }}>
    <a href="{{ route('home') }}">
        <x-icon-logo class="h-8 md:h-9" />
    </a>

    <nav class="flex items-center gap-6 sm:gap-8 relative text-white" x-data="{ open: false }" @click.away="open = false">
        <button
            class="flex items-center gap-2 pl-4 pr-3 py-2 text-xs sm:text-sm w-full"
            :class="{
                'bg-gradient-to-r from-indigo-300 dark:from-indigo-500 to-indigo-400 dark:to-indigo-600 hover:-hue-rotate-90 rounded shadow-lg': ! open,
                'bg-gray-800 dark:bg-black rounded-t': open,
            }"
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
            class="absolute top-full right-0 hidden bg-gray-800 dark:bg-black min-w-[320px] py-2 rounded rounded-tr-none shadow-xl text-sm z-10"
            x-bind:class="{ '!block': open }"
            x-transition
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
    </nav>
</div>
