<footer {{ $attributes->merge(['class' => 'container py-8 md:py-16 text-sm']) }} x-intersect="window.fathom?.trackGoal('08VVENFW', 0)">
    <div class="grid gap-8 md:gap-16 md:grid-cols-2">
        <div class="col-span-1">
            <div class="font-semibold text-white">My other projects</div>

            <ul class="grid gap-2 mt-4">
                <li>
                    <a href="https://bloggingwithlaravel.com" class="underline decoration-white/30 underline-offset-4">
                        Blogging with Laravel
                    </a>
                </li>

                <li>
                    <a href="https://smousss.com" class="underline decoration-white/30 underline-offset-4">
                        Smousss, an AI assistant for Laravel developers
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-span-1">
            <div class="font-semibold text-white">Follow me</div>

            <ul class="grid gap-2 mt-4">
                <li>
                    <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="underline decoration-white/30 underline-offset-4">
                        GitHub
                    </a>
                </li>

                <li>
                    <a href="https://twitter.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="underline decoration-white/30 underline-offset-4">
                        Twitter
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <p class="mt-8 text-center md:mt-16">
        <span class="opacity-50">Hosting by</span> <a href="https://benjamincrozat.com/recommends/digitalocean" target="_blank" rel="nofollow noopener noreferrer">DigitalOcean</a> <span class="opacity-50">and analytics by</span> <a href="https://benjamincrozat.com/recommends/fathom-analytics" target="_blank" rel="nofollow noopener noreferrer">Fathom</a><span class="opacity-50">.</span>
    </p>

    <p class="mt-8 text-xs tracking-widest text-center uppercase opacity-50">
        © Benjamin Crozat {{ date('Y') }}. All&nbsp;rights&nbsp;reserved.
    </p>
</footer>
