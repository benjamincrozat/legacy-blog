<p {{ $attributes->merge(['class' => 'flex items-center gap-2 text-sm']) }}>
    <img src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="20" height="20" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

    <span>
        <span class="text-black">Benjamin Crozat</span>,

        @if ($modifiedAt)
            updated on
        @endif

        <time datetime="{{ $modifiedAt?->toDateString() ?? $publishedAt?->toDateString() }}" class="text-black">
            {{ $modifiedAt?->isoFormat('LL') ?? $publishedAt?->isoFormat('LL') }}
        </time>

        —&nbsp;@choice(':count&nbsp;minute&nbsp;read|:count&nbsp;minutes&nbsp;read', $readTime)
    </span>
</p>
