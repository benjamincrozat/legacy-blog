<footer {{ $attributes->merge(['class' => 'container py-8 md:py-16 text-sm']) }} x-intersect="window.fathom?.trackGoal('08VVENFW', 0)">
    <div class="flex flex-wrap md:flex-wrap md:items-start md:justify-between gap-8 md:gap-16">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <x-icon-logo class="fill-current flex-shrink-0 w-10 h-10" />

            <span class="leading-tight text-sm">
                <span class="block font-medium">Benjamin Crozat</span>
                <span class="block opacity-75">The art of crafting web applications</span>
            </span>
        </a>

        <div class="w-full md:w-auto">
            <div class="font-semibold text-white">My services</div>

            <ul class="grid gap-2 mt-4">
                <li>
                    <a href="{{ route('consulting.cto') }}" class="decoration-white/30 underline underline-offset-4">
                        Virtual on-demand CTO
                    </a>
                </li>

                <li>
                    <a href="{{ route('consulting.laravel') }}" class="decoration-white/30 underline underline-offset-4">
                        Laravel development
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-full md:w-auto">
            <div class="font-semibold text-white">Follow me</div>

            <ul class="grid gap-2 mt-4">
                <li>
                    <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="decoration-white/30 underline underline-offset-4">
                        GitHub
                    </a>
                </li>

                <li>
                    <a href="https://www.instagram.com/benjamincrozat/" target="_blank" rel="nofollow noopener noreferrer" class="decoration-white/30 underline underline-offset-4">
                        Instagram
                    </a>
                </li>

                <li>
                    <a href="https://twitter.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="decoration-white/30 underline underline-offset-4">
                        Twitter
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <p class="mt-8 md:mt-16 text-center">
        <span class="opacity-50">Hosting by</span> <a href="https://benjamincrozat.com/recommends/digitalocean" target="_blank" rel="nofollow noopener noreferrer">DigitalOcean</a> <span class="opacity-50">and analytics by</span> <a href="https://benjamincrozat.com/recommends/fathom-analytics" target="_blank" rel="nofollow noopener noreferrer">Fathom</a><span class="opacity-50">.</span>
    </p>

    <p class="mt-8 opacity-50 text-center text-xs tracking-widest uppercase">
        © Benjamin Crozat {{ date('Y') }}. All&nbsp;rights&nbsp;reserved.
    </p>
</footer>
