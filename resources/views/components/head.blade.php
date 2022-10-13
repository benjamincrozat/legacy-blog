<header class="container flex items-center justify-between">
    <h1>
        <a
            href="{{ route('home') }}"
            {{ $attributes->merge(['class' => 'font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase']) }}
        >
            Benjamin Crozat
        </a>

        <span class="block text-gray-500 text-xs tracking-widest uppercase">
            Everything PHP & Laravel
        </span>
    </h1>

    <x-nav />
</header>
