@if ($ads->isNotEmpty() && $affiliate = $ads->random())
    <a href="{{ route('affiliate', $affiliate) }}" {{ $attributes->merge([
        'rel' => 'nofollow noopener noreferrer',
        'class' => 'block container md:max-w-screen-sm'
    ]) }}>
        <div class="border sm:flex sm:items-center sm:gap-4 p-4 rounded-md text-sm">
            <img
                src="{{ $affiliate->icon }}"
                alt="{{ $affiliate->name }}"
                class="aspect-square flex-shrink-0 rounded w-[48px] sm:w-[64px] h-[48px] sm:h-[64px]"
            />

            <div class="mt-4 sm:mt-0">
                <div class="font-bold">{{ $affiliate->ad_title }}</div>
                <div>{!! $affiliate->rendered_ad_content !!}</div>
            </div>
        </div>
    </a>
@endif
