<div {{ $attributes->merge(['class' => 'flex items-center gap-2 text-sm']) }}>
    <img src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="20" height="20" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

    <p>
        <a href="https://twitter.com/benjamincrozat" target="_blank" rel="noopener noreferrer" class="font-normal text-black" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>

        —

        Published on

        <time datetime="{{ $publishedAt?->toDateString() }}" class="text-black">
            {{ $publishedAt?->isoFormat('LL') }}
        </time>

        —&nbsp;@choice(':count&nbsp;minute&nbsp;read|:count&nbsp;minutes&nbsp;read', $readTime)
    </p>
</div>
