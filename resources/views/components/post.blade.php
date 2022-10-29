<div class="bg-gradient-to-r from-white to-gray-50/30 p-5 rounded-lg shadow-lg shadow-gray-200">
    <div class="flex items-center gap-2 text-sm">
        <img src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat" class="-translate-y-[.5px] rounded-full" />

        <p>
            <a href="https://twitter.com/benjamincrozat" target="_blank" rel="noopener noreferrer" class="font-semibold" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>

            —

            @choice(':count&nbsp;minute|:count&nbsp;minutes', $post->getReadTime()) read
        </p>
    </div>

    <a
        href="{{ route('posts.show', $post->slug) }}"
        class="font-normal inline-block mt-4 hover:opacity-50 text-indigo-600 transition-opacity"
        @click="window.fathom?.trackGoal('WQ8HQTOO', 0)"
    >
        {{ $post->title }}
    </a>

    <p class="mt-3">{{ $post->description }}</p>
</div>
