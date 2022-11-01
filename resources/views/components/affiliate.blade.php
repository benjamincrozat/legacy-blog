<aside {{ $attributes->merge(['class' => 'border p-4 rounded']) }}>
    <a href="https://www.cloudways.com/en/?id=1242932&a_bid=b3d8379c&chan={{ $channel }}" target="_blank" rel="nofollow noopener noreferrer">
        <x-icon-cloudways class="flex-shrink-0 w-12 h-12" />
    </a>

    <div>
        <p>
            I'm working with <strong class="font-bold">Cloudways</strong> to promote <strong class="font-bold">affordable</strong>, <strong class="font-bold">easy-to-use</strong>, and <strong class="font-bold">scalable</strong> web hosting for developers.
        </p>

        <p class="mt-2">
            <a href="https://www.cloudways.com/en/?id=1242932&a_bid=b3d8379c&chan={{ $channel }}" target="_blank" rel="nofollow noopener noreferrer" class="text-indigo-400 underline">
                @if (now()->lte(\Illuminate\Support\Carbon::create(2022, 11, 5)))
                    <strong class="font-bold">Set up yours</strong> right now with a <strong class="font-bold">limited 30% off for 3 months</strong> with promo code TREAT22.
                @else
                    <strong class="font-bold">Set up yours</strong> right now with a <strong class="font-bold">3-day free trial</strong> without credit card.
                @endif
            </a>
        </p>
    </div>
</aside>
