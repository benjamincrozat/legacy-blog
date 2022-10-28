<footer {{ $attributes->merge(['class' => 'container py-8 text-sm']) }} x-intersect="window.fathom?.trackGoal('08VVENFW', 0)">
    <div class="flex items-center justify-between">
        <a href="{{ route('home') }}" class="hover:text-white transition-colors tracking-widest uppercase">
            Benjamin Crozat
        </a>

        <ul class="flex items-center gap-1 sm:gap-2">
            <li>
                <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-white transition-all" @click="window.fathom?.trackGoal('COYELHY0', 0);">
                    <span class="sr-only">GitHub</span>
                    <x-icon-github class="fill-current w-6 sm:w-8 h-6 sm:h-8" />
                </a>
            </li>

            <li>
                <a href="https://www.linkedin.com/in/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-white transition-all" @click="window.fathom?.trackGoal('COYELHY0', 0);">
                    <span class="sr-only">LinkedIn</span>
                    <x-icon-linkedin class="fill-current w-6 sm:w-8 h-6 sm:h-8" />
                </a>
            </li>

            <li>
                <a href="https://twitter.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-white transition-all" @click="window.fathom?.trackGoal('COYELHY0', 0);">
                    <span class="sr-only">Twitter</span>
                    <x-icon-twitter class="fill-current w-6 sm:w-8 h-6 sm:h-8" />
                </a>
            </li>
        </ul>
    </div>

    <p class="mt-8 opacity-50 text-center text-xs tracking-widest uppercase">
        © Benjamin Crozat {{ date('Y') }}. All&nbsp;rights&nbsp;reserved.
    </p>
</footer>
