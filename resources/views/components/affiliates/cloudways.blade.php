<x-affiliates.base>
    <p class="flex items-center justify-center gap-2 font-normal leading-tight text-indigo-400">
        <x-heroicon-o-information-circle class="-translate-y-[.5px] flex-shrink-0 w-5 sm:w-4 h-5 sm:h-4" />
        Quick tip for developers who think time is money
    </p>

    <p class="mt-4">
        <strong class="font-semibold">Managing your servers is a waste of your precious time.</strong>
    </p>

    <p class="mt-2">
        <strong class="font-semibold"><a href="{{ route('affiliate', 'cloudways') }}" class="text-indigo-400 underline">Cloudways</a> is here to do it for you</strong> by provisioning PHP-optimized instances within a few clicks.
    </p>

    <p class="mt-2">
        <a href="{{ route('affiliate', 'cloudways') }}" class="text-indigo-400 underline">
            @if (now()->lte(Illuminate\Support\Carbon::parse('2022-11-05')->endOfDay()))
                Get started with <strong class="font-bold">30% off</strong> for 3 months with code <strong class="font-bold italic">TREAT22</strong>.
            @else
                Get started with a <strong class="font-bold">3-day free trial</strong> without credit card.
            @endif
        </a>
    </p>
</x-affiliates.base>
