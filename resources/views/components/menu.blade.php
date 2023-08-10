<div class="sm:relative" x-data="{ open: false }" @click.away="open = false">
    <button class="flex items-center gap-2" @click="open = ! open">
        {{ $trigger }}

        @if (empty($hideIcon))
            <x-heroicon-o-chevron-down
                class="w-3 h-3 transition-transform translate-y-px md:w-4 md:h-4"
                x-bind:class="{ 'rotate-180': open }"
            />
        @endif
    </button>

    <ul
        {{ $attributes->merge(['class' => 'absolute z-10 bg-white/90 backdrop-brightness-150 backdrop-saturate-150 dark:bg-black/[.9] backdrop-blur-md rounded-lg overflow-hidden shadow-lg left-4 sm:left-auto sm:w-[400px] sm:right-0 right-4 top-full py-2'])->except(['x-cloak', 'x-show', 'x-transition']) }}
        x-cloak
        x-show="open"
        x-transition
    >
        {{ $slot }}
    </ul>
</div>
