@if ($ads->isNotEmpty() && $affiliate = $ads->random())
    <a href="{{ route('affiliate', $affiliate) }}" {{ $attributes->merge(['class' => 'block container md:max-w-screen-sm']) }}>
        <div class="border flex items-center gap-4 p-4 rounded-md">
            <img
                src="{{ $affiliate->icon }}"
                alt="{{ $affiliate->name }}"
                width="64"
                height="64"
                class="aspect-square flex-shrink-0 rounded"
            />

            <div class="text-sm">
                <div class="font-bold line-clamp-1">{{ $affiliate->ad_title }}</div>
                <div class="line-clamp-2">{!! $affiliate->rendered_ad_content !!}</div>
            </div>
        </div>
    </a>
@endif
