@if (! $funnel)
    <div {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-between gap-8']) }}>
        <a href="{{ route('home') }}">
            <x-icon-logo class="h-7 sm:h-8 md:h-9" />
        </a>

        <nav
            class="flex items-center gap-4 sm:gap-6 text-xs sm:text-sm"
            @click.away="open = false"
            x-data="{ open: false }"
        >
            <button class="hover:text-indigo-400 transition-colors" @click="searching = true; window.fathom?.trackGoal('NV4ZNM3W', 0)">
                <x-heroicon-o-magnifying-glass class="h-5 inline" />
                <span class="sr-only">Search</span>
            </button>

            <a
                href="{{ route('consulting.laravel') }}"
                class="bg-gradient-to-r from-indigo-300 dark:from-indigo-500 to-indigo-400 dark:to-indigo-600 hover:-hue-rotate-90 flex items-center gap-2 font-medium px-4 py-2 rounded shadow-lg text-white transition-all"
            >
                Work with me
            </a>
        </nav>
    </div>
@else
    <div {{ $attributes->merge(['class' => 'text-center']) }}>
        <a href="{{ route('home') }}">
            <x-icon-logo-alt class="h-20 inline" />
        </a>
    </div>
@endif
