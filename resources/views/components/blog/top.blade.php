<div {{ $attributes->merge(['class' => 'flex justify-between']) }}>
    <div>
        <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
            Benjamin Crozat
        </span>

        <span class="block opacity-75 text-xs tracking-widest uppercase">
            The web developer life
        </span>
    </div>

    <nav class="flex items-center gap-6 sm:gap-8">
        <a
            href="{{ config('deals.index') }}"
            class="font-normal relative text-sm sm:text-base"
            @click="window.fathom?.trackGoal('Y4RZQNDR', 0)"
        >
            <span>Deals</span>
            <span class="absolute -top-4 -right-6 bg-gradient-to-r from-orange-300 dark:from-orange-400 to-orange-400 dark:to-orange-500 font-bold inline-block leading-tight px-2 py-1 rounded-full text-white text-xs transform scale-75">New</span>
        </a>

        <x-hire-me />
    </nav>
</div>
