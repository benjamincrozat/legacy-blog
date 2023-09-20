<div {{ $attributes->merge(['class' => 'text-center']) }}>
    <p class="text-lg font-medium sm:text-xl">
        {{ $title }}
    </p>

    <div class="container flex flex-wrap items-center justify-center gap-8 mt-8 md:gap-12 sm:justify-start">
        <a
            href="https://beyondco.de/?utm_source=benjamincrozat&utm_medium=logo&utm_campaign=benjamincrozat"
            target="_blank"
            rel="noopener"
            class="text-center"
        >
            <x-icon-beyond-code class="inline h-9" />
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
                class="inline w-auto h-8"
            />
        </a>

        <a
            href="https://redirect.pizza/?utm_source=benjamincrozat.com&utm_medium=logo&utm_campaign=sponsorship"
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
                class="inline w-auto h-10"
            />
        </a>
    </div>

    <div class="mt-8 text-center">
        <a wire:navigate.hover href="{{ route('media-kit') }}" class="text-2xl sm:-ml-11 sm:text-3xl font-handwriting">
            <x-icon-arrow-to-top-left class="inline w-8 h-8 -translate-y-3" /> <span class="underline decoration-1 underline-offset-2">Showcase your business too!</span>
        </a>
    </div>
</div>
