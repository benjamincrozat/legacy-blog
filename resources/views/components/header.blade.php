<header {{ $attributes->merge(['class' => 'container flex items-center justify-between']) }}>
    <a href="{{ route('home') }}">
        <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
            Benjamin Crozat
        </span>

        <span class="block text-gray-500 text-xs tracking-widest uppercase">
            The web developer life
        </span>
    </a>

    <x-nav />
</header>
