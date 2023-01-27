@if ($recommended->isNotEmpty())
    <div {{ $attributes }}>
        <p class="font-semibold text-center text-xl">Recommended</p>

        <div class="grid md:grid-cols-2 gap-4 sm:gap-8 mt-8">
            @foreach ($recommended as $post)
                <x-post :post="$post" @click="window.fathom?.trackGoal('LTFJEOM0', 0)" />
            @endforeach
        </div>
    </div>
@endif
