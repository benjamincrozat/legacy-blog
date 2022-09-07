<li>
    <x-heroicon-o-chevron-right
        class="-translate-y-[.5px] text-gray-400 w-4 h-4"
    />
</li>

<li {{ $attributes->merge(['class' => 'truncate']) }}>
    @if ($attributes->get('href'))
        <a
            href="{{ $href }}"
            class="text-blue-400"
            @click="window.fathom?.trackGoal('I4R3OAAU', 0)"
        >
            {{ $slot }}
        </a>
    @else
        <span class="text-gray-400">
            {{ $slot }}
        </span>
    @endif
</li>
