<div {{ $attributes->merge(['class' => 'flex flex-wrap justify-between gap-8']) }}>
    <a href="{{ route('home') }}">
        <span class="font-bold translate-y-px text-sm sm:text-base tracking-widest uppercase">
            Benjamin Crozat
        </span>

        <span class="block opacity-75 text-xs tracking-widest uppercase">
            The art of crafting websites
        </span>
    </a>

    <nav class="flex items-center gap-6 sm:gap-8">
        <a
            href="{{ route('consulting') }}"
            class="bg-gradient-to-r from-indigo-300 dark:from-indigo-500 to-indigo-400 dark:to-indigo-600 font-normal px-3 py-2 rounded shadow-md text-white text-sm"
            @click="window.fathom?.trackGoal('SJKONFQC', 0)"
        >
            Book me
        </a>
    </nav>
</div>
