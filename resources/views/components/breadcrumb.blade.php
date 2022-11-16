<nav {{ $attributes->merge(['class' => 'text-sm sm:text-base']) }}>
    <ul class="flex items-center gap-2 sm:gap-3">
        <li>
            <a href="{{ route('home') }}" class="text-indigo-400" @click="window.fathom?.trackGoal('I4R3OAAU', 0)">
                <x-heroicon-o-home class="-translate-y-[.5px] sm:-translate-y-px w-3 sm:w-4 h-3 sm:h-4" />
                <span class="sr-only">Home</span>
            </a>
        </li>

        {{ $slot }}
    </ul>
</nav>
