<div {{ $attributes->merge(['class' => 'text-sm']) }}>
    <a href="{{ route('consulting.cto') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">{{ $name }}</a>
    — Updated on <time datetime="{{ $updatedAt->toDateTimeString() }}">{{ $updatedAt->isoFormat('ll') }}</time>
</div>
