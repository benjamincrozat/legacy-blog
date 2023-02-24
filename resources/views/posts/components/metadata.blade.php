<div {{ $attributes->merge(['class' => 'text-sm']) }}>
    <a href="{{ $twitterUrl }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">{{ $name }}</a>
    — Updated on <time datetime="{{ $modifiedAt?->toDateTimeString() }}">{{ $modifiedAt?->isoFormat('ll') }}</time>
</div>
