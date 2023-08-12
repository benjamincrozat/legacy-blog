<footer {{ $attributes->merge(['class' => 'container py-8 text-sm']) }}>
    <p class="text-center">
        <span class="opacity-75">Domain name by</span> <a href="https://benjamincrozat.com/recommends/namecheap">Namecheap</a>, <span class="opacity-75">hosting by</span> <a href="https://benjamincrozat.com/recommends/digitalocean" target="_blank" rel="nofollow noopener noreferrer">DigitalOcean</a><span class="opacity-75">, and&nbsp;analytics&nbsp;by</span>&nbsp;<a href="https://benjamincrozat.com/recommends/fathom-analytics" target="_blank" rel="nofollow noopener noreferrer">Fathom</a><span class="opacity-75">.</span>
    </p>

    <div class="flex flex-wrap items-center justify-between mt-8 sm:flex-nowrap">
        <div class="w-full text-xs tracking-widest text-center uppercase opacity-50 sm:w-auto">
            © Benjamin Crozat {{ date('Y') }}. All&nbsp;rights&nbsp;reserved.
        </div>

        <ul class="flex items-center justify-center w-full gap-2 mt-10 sm:justify-start sm:mt-0 sm:w-auto">
            <li>
                <a href="/feed">
                    <x-icon-rss class="w-8 h-8 fill-current" />
                    <span class="sr-only">Feed</span>
                </a>
            </li>

            <li>
                <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer">
                    <x-icon-github class="w-8 h-8 fill-current" />
                    <span class="sr-only">GitHub</span>
                </a>
            </li>

            <li>
                <a href="https://x.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer">
                    <x-icon-x class="w-8 h-8 fill-current" />
                    <span class="sr-only">X</span>
                </a>
            </li>

            <li>
                <a href="mailto:hello@benjamincrozat.com">
                    <x-icon-email class="w-8 h-8 fill-current" />
                    <span class="sr-only">Email</span>
                </a>
            </li>
        </ul>
    </div>
</footer>
