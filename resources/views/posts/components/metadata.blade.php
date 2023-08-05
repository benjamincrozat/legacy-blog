<div {{ $attributes->merge(['class' => 'text-sm']) }}>
    <a href="{{ $twitterUrl }}" class="font-normal underline"><img
        src="{{ $gravatar }}?s=40"
        width="40"
        height="40"
        alt="{{ $name }}"
        class="mr-1 -translate-y-px w-[20px] h-[20px] rounded-full inline"
    /> {{ $name }}</a> — Updated on <time datetime="{{ $modifiedAt?->toDateTimeString() }}">{{ $modifiedAt?->isoFormat('ll') }}</time>
</div>
