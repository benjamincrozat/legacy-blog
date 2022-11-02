<aside {{ $attributes->merge(['class' => 'border p-4 rounded']) }}>
    @if ($name === 'cloudways')
        <a href="{{ route('affiliate', 'cloudways') }}?chan={{ $channel }}" target="_blank" rel="nofollow noopener noreferrer">
            <x-icon-cloudways class="flex-shrink-0 w-12 h-12" />
        </a>

        <div>
            <p>
                <strong class="font-bold">Cloudways</strong> provides <strong class="font-bold">affordable</strong>, <strong class="font-bold">easy-to-use</strong>, and <strong class="font-bold">scalable</strong> web hosting for PHP developers.
            </p>

            <p class="mt-1">
                <a href="{{ route('affiliate', 'cloudways') }}?chan={{ $channel }}" target="_blank" rel="nofollow noopener noreferrer" class="text-indigo-400 underline">
                    @if (now()->lte(Illuminate\Support\Carbon::parse('2022-11-05')->endOfDay()))
                        Get started with <strong class="font-bold">30% off</strong> for 3 months with code <strong class="font-bold italic">TREAT22</strong>.
                    @else
                        Get started with a <strong class="font-bold">3-day free trial</strong> without credit card.
                    @endif
                </a>
            </p>
        </div>
    @elseif ($name === 'fathom-analytics')
        <a href="{{ route('affiliate', 'fathom-analytics') }}" target="_blank" rel="nofollow noopener noreferrer">
            <x-icon-fathom-analytics class="flex-shrink-0 h-12 mt-2" />
        </a>

        <div class="mt-3">
            <p>
                <strong class="font-bold">Just like Laravel & GitHub</strong>, <strong class="font-bold">avoid a GDPR fine</strong> by using <strong class="font-bold">Fathom Analytics</strong>, an analytics tool that doesn't track your users.
            </p>

            <p class="mt-1">
                <a href="{{ route('affiliate', 'fathom-analytics') }}" target="_blank" rel="nofollow noopener noreferrer" class="text-indigo-400 underline">
                    Get started with a $10 discount
                </a>
            </p>
        </div>
    @elseif ($name === 'kinsta')
        <a href="{{ route('affiliate', 'kinsta') }}" target="_blank" rel="nofollow noopener noreferrer">
            <x-icon-kinsta class="flex-shrink-0 h-4 mt-2" />
        </a>

        <div class="mt-3">
            <p>
                <strong class="font-bold">Focus on writing</strong> to promote your business, <strong class="font-bold">let Kinsta worry about managing your WordPress</strong>.
            </p>

            <p class="mt-1">
                <a href="{{ route('affiliate', 'kinsta') }}" target="_blank" rel="nofollow noopener noreferrer" class="text-indigo-400 underline">
                    Get started with 2 months free.
                </a>
            </p>
        </div>
    @endif
</aside>
