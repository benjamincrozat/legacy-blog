@if ($ads->isNotEmpty() && $affiliate = $ads->random())
    <a href="{{ route('affiliate', $affiliate) }}" {{ $attributes->merge([
        'rel' => 'nofollow noopener noreferrer',
        'class' => 'block container md:max-w-screen-sm'
    ]) }}>
        <div class="border flex items-center gap-4 p-4 rounded-md">
            <img
                src="{{ $affiliate->icon }}"
                alt="{{ $affiliate->name }}"
                class="aspect-square flex-shrink-0 rounded w-[48px] sm:w-[64px] h-[48px] sm:h-[64px]"
            />

            <div class="text-sm">
                <div class="font-bold line-clamp-2">{{ $affiliate->ad_title }}</div>
                <div class="line-clamp-2">{!! $affiliate->rendered_ad_content !!}</div>
            </div>
        </div>
    </a>
@endif
