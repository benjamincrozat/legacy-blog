<div class="sm:relative" x-data="{ open: false }">
    <button class="flex items-center gap-2" x-bind:class="{ 'relative z-20': open }" @click="open = ! open">
        {{ $trigger }}

        @empty($hideIcon)
            <x-heroicon-o-chevron-down
                class="w-3 h-3 transition-transform translate-y-px md:w-4 md:h-4"
                x-bind:class="{ 'rotate-180': open }"
            />
        @endempty
    </button>

    <ul
        {{ $attributes->merge([
            'class' => 'outline outline-1 outline-black/[.025] -mt-4 sm:mt-0 rounded absolute left-4 sm:left-auto right-4 sm:right-0 bg-white shadow-xl top-full sm:min-w-[400px] py-2 z-20 overflow-y-scroll max-h-[50vh] text-base',
        ]) }}
        x-cloak
        x-show="open"
        x-transition.duration.300ms
        @click.away="open = false"
    >
        {{ $slot }}
    </ul>
</div>
