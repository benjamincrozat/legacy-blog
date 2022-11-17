<nav {{ $attributes->merge(['class' => 'text-sm sm:text-base']) }}>
    <ul class="flex items-center gap-2 sm:gap-3">
        <li>
            <a href="{{ route('home') }}" class="text-indigo-400" @click="window.fathom?.trackGoal('I4R3OAAU', 0)">
                Home
            </a>
        </li>

        {{ $slot }}
    </ul>
</nav>
