<nav {{ $attributes->merge(['class' => 'flex items-center gap-2']) }}>
    <a wire:navigate.hover href="{{ route('home') }}" class="font-medium text-indigo-400 underline">
        Home
    </a>

    <span class="opacity-30">/</span>

    @if (! empty($middle))
        @if ($middle->attributes->has('href'))
            <a wire:navigate.hover {{ $middle->attributes->merge(['class' => 'font-medium text-indigo-400 underline']) }}>
                {{ $middle }}
            </a>
        @else
            <span {{ $middle->attributes->merge(['class' => 'font-medium opacity-30']) }}>
                {{ $middle }}
            </span>
        @endif

        <span class="opacity-30">/</span>
    @endif

    <span class="opacity-50 line-clamp-1">
        {{ $slot }}
    </span>
</nav>
