<footer {{ $attributes->merge(['class' => 'container py-8 text-sm']) }} x-intersect="window.fathom?.trackGoal('08VVENFW', 0)">
    <p class="text-center">
        <span class="opacity-75">This blog is hosted by</span> <a href="https://benjamincrozat.com/recommends/digitalocean" target="_blank" rel="nofollow noopener noreferrer">DigitalOcean</a> <span class="opacity-75">and Laravel Forge. Analytics are provided by</span> <a href="https://benjamincrozat.com/recommends/fathom-analytics" target="_blank" rel="nofollow noopener noreferrer">Fathom</a><span class="opacity-75">.</span>
    </p>

    <div class="flex flex-wrap items-center justify-between mt-8 sm:flex-nowrap">
        <div class="w-full text-xs tracking-widest text-center uppercase opacity-50 sm:w-auto">
            © Benjamin Crozat {{ date('Y') }}. All&nbsp;rights&nbsp;reserved.
        </div>

        <ul class="flex items-center justify-center w-full gap-2 mt-10 sm:justify-start sm:mt-0 sm:w-auto">
            <li>
                <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="underline decoration-white/30 underline-offset-4">
                    <x-icon-github class="w-8 h-8 fill-current" />
                    <span class="sr-only">GitHub</span>
                </a>
            </li>

            <li>
                <a href="https://twitter.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="underline decoration-white/30 underline-offset-4">
                    <x-icon-twitter class="w-8 h-8 fill-current" />
                    <span class="sr-only">Twitter</span>
                </a>
            </li>
        </ul>
    </div>
</footer>
