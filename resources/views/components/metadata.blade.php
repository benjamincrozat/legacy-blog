<div {{ $attributes->merge(['class' => 'flex items-center gap-2 text-sm']) }}>
    <img src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

    <p>
        <a href="https://twitter.com/benjamincrozat" target="_blank" rel="noopener noreferrer" class="border-b border-blue-200 text-blue-400" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>

        —

        <time datetime="{{ $publishedAt?->toDateString() }}">
            {{ $publishedAt?->isoFormat('ll') }}
        </time>

        —&nbsp;@choice(':count&nbsp;min|:count&nbsp;mins', $readTime)
    </p>
</div>
