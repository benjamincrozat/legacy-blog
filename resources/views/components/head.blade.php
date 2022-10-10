<header class="container flex items-center justify-between">
    <a href="{{ route('home') }}" {{ $attributes->merge(['class' => 'translate-y-px text-sm sm:text-base tracking-widest uppercase']) }}>
        Benjamin Crozat
    </a>

    <nav>
        <ul class="flex items-center justify-center font-serif font-normal gap-6 sm:gap-8 text-sm sm:text-base">
            <li>
                <a href="{{ route('home') }}" class="@if (Route::is('home')) text-blue-400 @endif">
                    <x-heroicon-o-home class="sm:hidden w-5 h-5 translate-y-[-.5px]" />
                    <span class="sr-only sm:not-sr-only">Home</span>
                </a>
            </li>

            <li>
                <a href="#newsletter" @click.prevent="$refs.newsletter.focus()">
                    <x-heroicon-o-envelope class="sm:hidden w-5 h-5" />
                    <span class="sr-only sm:not-sr-only">Newsletter</span>
                </a>
            </li>

            <li>
                <a href="https://twitter.com/benjamincrozat" target="_blank" rel="noopener noreferrer">
                    <svg viewBox="0 0 24 24" class="sm:hidden w-[18px] h-[18px]"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    <span class="sr-only sm:not-sr-only">Twitter</span>
                </a>
            </li>
        </ul>
    </nav>
</header>
