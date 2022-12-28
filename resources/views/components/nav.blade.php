<div {{ $attributes->merge(['class' => 'flex flex-wrap justify-between gap-8']) }}>
    <a href="{{ route('home') }}">
        <x-icon-logo class="h-8 md:h-9" />
    </a>

    <nav class="flex items-center gap-6 sm:gap-8">
        <a
            href="{{ route('laravel-consulting') }}"
            class="bg-gradient-to-r from-indigo-300 dark:from-indigo-500 to-indigo-400 dark:to-indigo-600 font-semibold px-4 sm:px-6 py-2 rounded shadow-lg text-sm text-white w-full"
            @click="window.fathom?.trackGoal('SJKONFQC', 0)"
        >
            Book me
        </a>
    </nav>
</div>
