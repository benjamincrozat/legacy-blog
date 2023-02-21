<div {{ $attributes->merge(['class' => 'text-sm']) }}>
    Published by <a href="{{ route('consulting.cto') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">{{ $name }}</a>
    — Updated on <time datetime="{{ $updatedAt->toIso8601String() }}">{{ $updatedAt->isoFormat('ll') }}</time>
    <span class="opacity-75">— @choice(':count minute|:count minutes', $readTime) read</span>
</div>
