<div {{ $attributes->merge(['class' => 'text-sm']) }}>
    <a href="{{ $twitterUrl }}" class="font-normal underline">{{ $name }}</a>
    — Updated on <time datetime="{{ $modifiedAt?->toDateTimeString() }}">{{ $modifiedAt?->isoFormat('ll') }}</time>
</div>
