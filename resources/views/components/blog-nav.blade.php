<div {{ $attributes->merge(['class' => 'flex flex-wrap justify-between']) }}>
    <a href="{{ route('home') }}">
        <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
            Benjamin Crozat
        </span>

        <span class="block opacity-75 text-xs tracking-widest uppercase">
            The web developer life
        </span>
    </a>

    <nav class="flex items-center gap-6 sm:gap-8">
        <x-hire-me />
    </nav>
</div>
