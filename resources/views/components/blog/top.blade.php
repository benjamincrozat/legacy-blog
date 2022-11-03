<div class="container flex justify-between mt-8">
    <a href="{{ route('home') }}" {{ $attributes }}>
        <span class="font-extrabold translate-y-px text-base tracking-widest uppercase">
            Benjamin Crozat
        </span>

        <span class="block opacity-75 text-xs tracking-widest uppercase">
            The web developer life
        </span>
    </a>

    <nav class="flex items-center gap-8">
        <x-hire-me />
    </nav>
</div>
