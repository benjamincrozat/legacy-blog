<header {{ $attributes->merge(['class' => 'container sm:flex sm:items-center sm:justify-between']) }}>
    <a href="{{ route('home') }}">
        <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
            Benjamin Crozat
        </span>

        <span class="block opacity-75 text-xs tracking-widest uppercase">
            {{ $subtitle }}
        </span>
    </a>

    <x-nav class="mt-8 sm:mt-0" :highlight-classes="$highlightClasses ?? ''" />
</header>
