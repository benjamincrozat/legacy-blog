<div {{ $attributes }}>
    <footer class="container py-8 text-center">
        <p>
            Domain name by <a href="{{ route('merchants.show', 'namecheap') }}" target="_blank" rel="noopener" class="font-medium underline">Namecheap</a>,
            hosting by <a href="{{ route('merchants.show', 'digitalocean') }}" target="_blank" rel="noopener" class="font-medium underline">DigitalOcean</a>,
            tracking by <a href="{{ route('merchants.show', 'pirsch-analytics') }}" target="_blank" rel="noopener" class="font-medium underline">Pirsch Analytics</a>, and some illustrations come from <a href="https://www.freepik.com" target="_blank" rel="nofollow noopener" class="font-medium underline">Freepik</a>.
        </p>

        <p class="mt-4">
            <a href="/feed" class="font-medium underline">Subscribe to the feed</a>, and follow me on <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener" class="font-medium underline">GitHub</a> and <a href="https://x.com/benjamincrozat" target="_blank" rel="nofollow noopener" class="font-medium underline">X</a>. For inquiries, <a href="mailto:hello@benjamincrozat.com" class="font-medium underline">send&nbsp;me&nbsp;an&nbsp;email</a>.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-8 mt-8 md:gap-12">
            <a
                href="https://beyondco.de/?utm_source=benjamincrozat&utm_medium=logo&utm_campaign=benjamincrozat"
                target="_blank"
                rel="noopener"
                class="relative text-center"
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


        <p class="mt-8">
            <a wire:navigate.hover href="{{ route('media-kit') }}" class="underline">Media kit</a> <span class="mx-2 text-xs">•</span> <a wire:navigate.hover href="{{ route('privacy') }}" class="underline">Privacy policy</a> <span class="mx-2 text-xs">•</span> <a wire:navigate.hover href="{{ route('terms') }}" class="underline">Terms of service</a>
        </p>

        <p class="mt-8 text-xs tracking-widest uppercase opacity-50">
            © {{ config('app.name') }} {{ date('Y') }}. All rights reserved.
        </p>
    </footer>
</div>
