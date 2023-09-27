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

        @if (! request()->routeIs('home'))
            <x-sponsors />
        @endif

        <p class="mt-8">
            <a wire:navigate.hover href="{{ route('media-kit') }}" class="underline">Media kit</a> <span class="mx-2 text-xs">•</span> <a wire:navigate.hover href="{{ route('privacy') }}" class="underline">Privacy policy</a> <span class="mx-2 text-xs">•</span> <a wire:navigate.hover href="{{ route('terms') }}" class="underline">Terms of service</a>
        </p>

        <p class="mt-8 text-xs tracking-widest uppercase opacity-50">
            © {{ config('app.name') }} {{ date('Y') }}. All rights reserved.
        </p>
    </footer>
</div>
