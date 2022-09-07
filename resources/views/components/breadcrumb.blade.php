<nav {{ $attributes->merge(['class' => 'container']) }}>
    <ul class="flex items-center gap-2">
        <li>
            <a href="{{ route('home') }}" class="text-blue-400" @click="window.fathom?.trackGoal('I4R3OAAU', 0)">
                <x-heroicon-o-home class="-translate-y-[.5px] w-4 h-4" />
                <span class="sr-only">Home</span>
            </a>
        </li>

        {{ $slot }}
    </ul>
</nav>
