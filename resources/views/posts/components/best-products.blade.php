@if ($promotesAffiliateLinks && $bestProducts->isNotEmpty())
    <div {{ $attributes }}>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($bestProducts as $bestProduct)
                <x-posts::best-product
                    :best-product="$bestProduct"
                    class="sm:col-span-1"
                />
            @endforeach
        </div>

        <p class="container mt-4 opacity-75 text-center text-xs">
            This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal. @if ($bestProducts->count() > 1) <br class="hidden md:inline" /> @endif
            I only promote products I've personally used and stand behind.
        </p>
    </div>
@endif
