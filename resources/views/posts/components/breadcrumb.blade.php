@if ($promotesAffiliateLinks)
    <nav {{ $attributes->merge(['class' => 'text-sm sm:text-base']) }}>
        <ul class="@container flex items-center gap-2 sm:gap-3">
            <li>
                <a href="{{ route('home') }}" class="text-indigo-400">
                    Home
                </a>
            </li>

            {{ $slot }}
        </ul>
    </nav>
@endif
