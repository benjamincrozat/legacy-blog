<header class="container">
    <a href="{{ route('home') }}" {{ $attributes->merge(['class' => 'leading-none text-center']) }}>
        @if (Route::is('home'))<h1 @else<p @endif
            class="tracking-widest uppercase"
        >
            Benjamin Crozat's blog
        @if (Route::is('home')) </h1> @else </p> @endif

        @if (Route::is('home'))<h2 @else<p @endif
            class="mt-1 text-2xl tracking-tight"
        >
            Everything PHP & Laravel
        @if (Route::is('home'))</h2>@else</p>@endif
    </a>

    <nav>
        <ul class="flex items-center justify-center font-serif font-normal gap-8 mt-6">
            <li>
                <a href="{{ route('home') }}" class="@if (Route::is('home')) text-blue-400 @endif">
                    Home
                </a>
            </li>

            <li>
                <a href="#newsletter" @click.prevent="$refs.newsletter.focus()">
                    Newsletter
                </a>
            </li>

            <li>
                <a href="https://twitter.com/benjamincrozat" target="_blank" rel="noopener noreferrer">
                    Twitter
                </a>
            </li>
        </ul>
    </nav>
</header>
