<div class="container flex justify-between mt-8">
    <div {{ $attributes }}>
        <span class="font-extrabold translate-y-px text-base tracking-widest uppercase">
            Benjamin Crozat
        </span>

        <span class="block opacity-75 text-xs tracking-widest uppercase">
            The web developer life
        </span>
    </div>

    <nav class="flex items-center gap-8">
        @if (auth()->check() && 'benjamincrozat@me.com' === auth()->user()?->email)
            <a href="/nova" class="font-normal text-xs uppercase">
                Nova
            </a>
        @endif

        <x-hire-me />
    </nav>
</div>
