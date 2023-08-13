<div class="sm:relative" x-data="{ open: false }">
    <button class="flex items-center gap-2" @click="open = ! open">
        {{ $trigger }}
        <x-heroicon-o-chevron-down
            class="w-4 h-4 transition-transform duration-500 translate-y-px"
            x-bind:class="{ 'rotate-180': open }"
        />
    </button>

    <ul
        class="-mt-4 sm:mt-0 rounded absolute left-4 sm:left-auto right-4 sm:right-0 bg-white duration-500 shadow-lg top-full sm:min-w-[300px] py-2"
        x-cloak
        x-show="open"
        x-transition
        @click.away="open = false"
    >
        {{ $slot }}
    </ul>
</div>
