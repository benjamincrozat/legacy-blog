<div {{ $attributes->merge(['class' => 'text-sm']) }}>
    <a href="{{ $twitterUrl }}" class="font-medium"><img
        src="{{ $gravatar }}?s=40"
        width="40"
        height="40"
        alt="{{ $name }}"
        class="mr-2 -translate-y-[1.5px] w-[20px] h-[20px] rounded-full inline"
    />{{ $name }}</a> — Updated on <time datetime="{{ $modifiedAt?->toDateTimeString() }}">{{ $modifiedAt?->isoFormat('ll') }}</time>
</div>
