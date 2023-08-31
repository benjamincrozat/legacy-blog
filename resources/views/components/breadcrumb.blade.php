<nav {{ $attributes->merge(['class' => 'flex items-center gap-2']) }}>
    <a wire:navigate.hover href="{{ route('home') }}" class="font-medium text-indigo-400 underline">
        Home
    </a>

    <span class="opacity-30">/</span>

    <span class="opacity-50 line-clamp-1">
        {{ $slot }}
    </span>
</nav>
