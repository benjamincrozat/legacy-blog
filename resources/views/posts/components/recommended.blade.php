@if (empty($promotesAffiliateLinks) && $recommended->isNotEmpty())
    <div {{ $attributes }}>
        <div class="font-semibold text-center text-xl">
            Recommended
        </div>

        <div class="grid md:grid-cols-2 gap-4 sm:gap-8 mt-8">
            @foreach ($recommended as $post)
                <x-post :post="$post" @click="window.fathom?.trackGoal('LTFJEOM0', 0)" />
            @endforeach
        </div>
    </div>
@endif
