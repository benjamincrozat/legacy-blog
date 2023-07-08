<a
    href="{{ route('home') }}"
    class="flex items-center gap-3 sm:flex-shrink-0"
    @click="window.fathom?.trackGoal('XAQUA2K4', 0)"
>
    <x-icon-logo class="flex-shrink-0 w-8 h-8 text-black fill-current dark:text-white md:w-10 md:h-10" />

    <span class="text-sm leading-tight sr-only md:not-sr-only">
        <span class="block font-medium text-black dark:text-white">Benjamin Crozat</span>
        <span class="block opacity-75">The art of crafting web applications</span>
    </span>
</a>
