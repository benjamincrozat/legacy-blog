<li class="opacity-20">/</li>

<li {{ $attributes }}>
    @if ($attributes->get('href'))
        <a
            href="{{ $href }}"
            class="text-indigo-400 line-clamp-1"
        >
            {{ $slot }}
        </a>
    @else
        <span class="text-gray-400 line-clamp-1">
            {{ $slot }}
        </span>
    @endif
</li>
