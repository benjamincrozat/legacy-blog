<div {{ $attributes->merge(['class' => 'flex items-center gap-2 mt-4 text-sm']) }}>
    <img src="https://www.gravatar.com/avatar/{{ md5($email) }}" width="18" height="18" alt="{{ $name }}" class="rounded-full" />

    <a href="{{ route('consulting.laravel') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">{{ $name }}</a>
    —
    <span class="opacity-75">@choice(':count minute|:count minutes', $readTime) read</span>
</div>
