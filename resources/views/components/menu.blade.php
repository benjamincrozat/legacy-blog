<div class="sm:relative" x-data="{ open: false }" @click.away="open = false">
    <button class="flex items-center gap-2" @click="open = ! open">
        {{ $trigger }}

        <x-heroicon-o-chevron-down
            class="w-4 h-4 transition-transform translate-y-px"
            x-bind:class="{ 'rotate-180': open }"
        />
    </button>

    <ul
        {{ $attributes->merge(['class' => 'absolute z-10 bg-white/90 backdrop-brightness-150 backdrop-saturate-150 dark:bg-black/[.9] backdrop-blur-md rounded-lg overflow-hidden shadow-lg left-4 sm:left-auto sm:w-[300px] md:w-[350px] lg:w-[400px] sm:right-0 right-4 top-full'])->except(['x-cloak', 'x-show', 'x-transition']) }}
        x-cloak
        x-show="open"
        x-transition
    >
        {{ $slot }}
    </ul>
</div>
