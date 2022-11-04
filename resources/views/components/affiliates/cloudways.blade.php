<x-affiliates.base {{ $attributes }}>
    <x-slot:header>
        Quick tip for developers whose time is money
    </x-slot:header>

    <p>
        Managing your servers is a waste of your precious time.
    </p>

    <p class="mt-2">
        <a href="{{ route('affiliate', 'cloudways') }}" class="text-indigo-400 underline" @click="window.fathom?.trackGoal('K8DBWLRF', 0)">Cloudways</a> is here to do it for you by provisioning PHP-optimized instances within a few clicks.
    </p>

    <p class="mt-6">
        <x-slot:button slug="cloudways">
            @if (now()->lte(Illuminate\Support\Carbon::parse('2022-11-05')->endOfDay()))
                Get started with <strong class="font-bold">30% off</strong> for 3 months with code <strong class="font-bold italic">TREAT22</strong>.
            @else
                Get started with a <strong class="font-bold">3-day free trial</strong> without credit card.
            @endif
        </x-slot:button>
    </p>
</x-affiliates.base>
