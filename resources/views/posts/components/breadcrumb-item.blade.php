<li class="opacity-20">/</li>

<li {{ $attributes }}>
    @if ($attributes->get('href'))
        <a
            href="{{ $href }}"
            class="line-clamp-1 text-indigo-400"
            @click="window.fathom?.trackGoal('I4R3OAAU', 0)"
        >
            {{ $slot }}
        </a>
    @else
        <span class="line-clamp-1 text-gray-400">
            {{ $slot }}
        </span>
    @endif
</li>
