@if ($recommended->isNotEmpty())
    <div {{ $attributes->except('recommended') }}>
        <div class="text-xl font-semibold text-center">
            Recommended
        </div>

        <div class="grid gap-4 mt-8 md:grid-cols-2 sm:gap-8">
            @foreach ($recommended as $post)
                <x-post :post="$post" />
            @endforeach
        </div>
    </div>
@endif
