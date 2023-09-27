<div {{ $attributes->merge(['class' => 'grid items-center grid-cols-2 gap-4 sm:gap-6 md:gap-8 mt-8 lg:grid-cols-4 md:gap-12']) }}>
    <a
        href="https://beyondco.de/?utm_source=benjamincrozat&utm_medium=logo&utm_campaign=benjamincrozat"
        target="_blank"
        rel="noopener"
        class="text-center"
    >
        <x-icon-beyond-code class="inline h-8 md:h-9" />
        <span class="sr-only">Beyond Code</span>
    </a>

    <a
        href="https://useflipp.com/?utm_campaign=sponsorship&utm_source=benjamincrozat.com&utm_medium=logolink"
        target="_blank"
        rel="noopener"
        class="text-center"
    >
        <img
            loading="lazy"
            src="{{ Vite::asset('resources/img/flipp.png') }}"
            width="400"
            height="124"
            alt="Flipp"
            class="inline w-auto h-7 md:h-8"
        />
    </a>

    <a
        href="https://ploi.io/?utm_campaign=sponsorship&utm_source=benjamincrozat.com&utm_medium=logo"
        target="_blank"
        rel="noopener"
        class="text-center"
    >
        <x-icon-ploi class="inline h-6 md:h-7" />
        <span class="sr-only">Ploi</span>
    </a>

    <a
        href="https://redirect.pizza/?utm_source=benjamincrozat.com&utm_medium=logo&utm_campaign=sponsorship"''
        target="_blank"
        rel="noopener"
        class="text-center"
    >
        <img
            loading="lazy"
            src="{{ Vite::asset('resources/img/redirect-pizza.png') }}"
            width="400"
            height="124"
            alt="redirect.pizza"
            class="inline w-auto h-9 md:h-10"
        />
    </a>
</div>
