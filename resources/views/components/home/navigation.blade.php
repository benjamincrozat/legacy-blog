<div {{ $attributes->merge(['class' => 'bg-indigo-500 md:sticky top-0 z-10']) }}>
    <div class="container sm:flex sm:items-center sm:justify-between py-4 text-center sm:text-left">
        <a href="{{ route('home') }}">
            <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
                Benjamin Crozat
            </span>

            <span class="block opacity-75 text-xs tracking-widest uppercase">
                Full-stack Laravel developer
            </span>
        </a>

        <nav class="flex items-center justify-center sm:justify-start gap-8 mt-8 sm:mt-0">
            <a href="{{ route('posts.index') }}" class="text-indigo-100 text-xs tracking-widest uppercase">
                Read my blog
            </a>

            <a href="mailto:benjamincrozat@me.com" class="border-b border-white/50 font-normal leading-loose text-white text-xs tracking-widest uppercase" @click="window.fathom?.trackGoal('EWIGDNLB', 0)">
                Contact me!
            </a>
        </nav>
    </div>
</div>
