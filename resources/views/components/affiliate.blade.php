<aside {{ $attributes->merge(['class' => 'border p-4 rounded']) }}>
    <a href="{{ route('affiliate', 'cloudways') }}?chan={{ $channel }}" target="_blank" rel="nofollow noopener noreferrer">
        <x-icon-cloudways class="flex-shrink-0 w-12 h-12" />
    </a>

    <div>
        <p>
            I'm working with <strong class="font-bold">Cloudways</strong> to promote <strong class="font-bold">affordable</strong>, <strong class="font-bold">easy-to-use</strong>, and <strong class="font-bold">scalable</strong> web hosting for developers.
        </p>

        <p class="mt-2">
            <a href="{{ route('affiliate', 'cloudways') }}?chan={{ $channel }}" target="_blank" rel="nofollow noopener noreferrer" class="text-indigo-400 underline">
                @if (now()->lte(Illuminate\Support\Carbon::parse('2022-11-05')->endOfDay()))
                    Get started with <strong class="font-bold">limited 30% off</strong> for 3 months with promo code <strong class="font-bold italic">TREAT22</strong>.
                @else
                    Get started with a <strong class="font-bold">3-day free trial</strong> without credit card.
                @endif
            </a>
        </p>
    </div>
</aside>
