<div {{ $attributes->except(['@click', 'post'])->merge(['class' => 'bg-gradient-to-r from-white to-gray-50/30 p-4 sm:p-5 rounded-lg shadow-lg shadow-gray-200']) }}>
    <div class="flex items-center gap-2 text-sm">
        <img src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat" class="rounded-full" />

        <p>
            <a href="https://twitter.com/benjamincrozat" target="_blank" rel="noopener noreferrer" class="font-semibold" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>

            —

            @choice(':count&nbsp;minute|:count&nbsp;minutes', $post->getReadTime()) read
        </p>
    </div>

    <a
        href="{{ route('posts.show', $post->slug) }}"
        class="font-normal inline-block mt-4 text-indigo-600"
        {{ $attributes->only('@click') }}
    >
        {{ $post->title }}
    </a>

    <p class="leading-relaxed mt-3 text-sm">{{ $post->description }}</p>
</div>
