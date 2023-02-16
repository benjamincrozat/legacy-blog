<div {{ $attributes->except('first', 'post')->merge(['class' => 'block flex-shrink-0 overflow-hidden relative snap-start sm:snap-center md:snap-normal scroll-ml-4 md:scroll-ml-0 w-[90%] sm:w-[70%] md:w-auto']) }}>
    <a href="{{ route('posts.show', $post->slug) }}" @click="window.fathom?.trackGoal('OKJIR46O', 0)">
        <img
            @if (empty($first)) loading="lazy" @endif
            src="{{ str_replace('w_auto', 'w_600', $post->image) }}"
            alt="{{ $post->title }}"
            class="aspect-video object-cover rounded-md shadow-lg dark:shadow-none w-full"
        />
    </a>

    <a href="{{ route('posts.show', $post->slug) }}" class="font-semibold inline-block mt-3">{{ $post->title }}</a>

    <div class="flex items-center gap-2 mt-2 text-sm">
        <img
            loading="lazy"
            src="https://www.gravatar.com/avatar/{{ md5($post->user->email) }}"
            width="18"
            height="18"
            alt="{{ $post->user->name }}"
            class="-translate-y-[.5px] rounded-full"
        />

        <div>
            <a href="{{ route('consulting.cto') }}" target="_blank" rel="noopener noreferrer" class="font-medium" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">{{ $post->user->name }}</a> — <span class="opacity-75">@choice(':count&nbsp;min|:count&nbsp;mins', $post->read_time) read</span>
        </div>
    </div>
</div>
