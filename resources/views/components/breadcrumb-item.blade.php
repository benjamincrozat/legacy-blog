<li class="opacity-20">/</li>

<li {{ $attributes->merge(['class' => 'truncate']) }}>
    @if ($attributes->get('href'))
        <a
            href="{{ $href }}"
            class="text-indigo-400"
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
