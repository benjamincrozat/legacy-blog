<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    :disable-ads="$post->promotes_affiliate_links"
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog.top class="container mt-4 md:mt-8" />

    <x-blog.breadcrumb class="container mt-8 sm:mt-16">
        <x-blog.breadcrumb-item href="{{ route('posts.index') }}">
            Blog
        </x-blog.breadcrumb-item>

        <x-blog.breadcrumb-item class="truncate">
            {{ $post->title }}
        </x-blog.breadcrumb-item>
    </x-blog.breadcrumb>

    <article class="container mt-8">
        <h1 class="font-thin text-3xl md:text-5xl dark:text-white">
            {{ $post->title }}
        </h1>

        <div class="flex items-center gap-2 mt-4 text-sm">
            <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

            <a href="{{ route('home') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>
            —
            <span class="opacity-75">@choice(':count minute|:count minutes', $post->read_time) read</span>
        </div>

        @if ($post->introduction)
            <div class="break-words max-w-full mt-8
            prose prose-a:border-b prose-a:border-indigo-400/50 prose-a:text-indigo-400 prose-a:no-underline
            prose-code:dark:text-current prose-headings:dark:text-white prose-hr:dark:border-gray-800 prose-thead:dark:border-gray-800 prose-strong:text-current prose-tr:dark:border-gray-800 dark:text-current">
                {!! $post->rendered_introduction !!}
            </div>
        @endif

        @if ($post->promotes_affiliate_links && $post->features->isNotEmpty())
            <div
                class="grid
                @if (1 === $post->features->count()) sm:max-w-[320px] sm:mx-auto @endif
                @if ($post->features->count() > 1) sm:grid-cols-2 @endif
                @if ($post->features->count() > 2) md:grid-cols-3 @endif
                gap-4 mt-8"
            >
                @foreach ($post->features as $feature)
                    <x-feature :feature="$feature" />
                @endforeach

                <p class="col-span-full opacity-75 text-center text-xs">
                    This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal. @if ($post->features->count() > 1) <br class="hidden md:inline" /> @endif
                    I only promote products I've personally used and stand behind.
                </p>
            </div>
        @elseif (! should_display_ads() && ! $post->promotes_affiliate_links)
            <x-deal :deal="$deals->get(0)" class="sm:max-w-screen-xs mt-8 sm:mx-auto text-sm" />
        @endif

        <x-blog.toc :toc="$post->getTableOfContents()" class="mt-8 text-sm" />

        <div
            class="break-words max-w-full mt-8
            prose prose-a:border-b prose-a:border-indigo-400/50 prose-a:text-indigo-400 prose-a:no-underline
            prose-code:dark:text-current prose-headings:dark:text-white prose-hr:dark:border-gray-800 prose-thead:dark:border-gray-800
            prose-strong:text-current prose-tr:dark:border-gray-800 dark:text-current"
        >
            {!! $post->rendered_content !!}
        </div>
    </article>

    <div class="container max-w-[1024px] mt-16">
        <div class="border-y dark:border-gray-800 py-16">
            <x-newsletter />
        </div>
    </div>

    @if ($others->isNotEmpty())
        <div class="container max-w-[1024px] mt-16">
            <h4 class="font-bold text-center text-xl">Other posts to read</h4>

            <div class="grid md:grid-cols-2 gap-4 sm:gap-8 mt-8">
                @foreach ($others as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('LTFJEOM0', 0)" />
                @endforeach
            </div>
        </div>
    @endif

    <x-deals class="md:container md:max-w-[1024px] mt-16" />

    <div class="bg-gray-900 dark:bg-black flex-grow mt-8 sm:mt-16">
        <x-footer class="text-gray-200" />
    </div>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "{{ $post->title }}",
            "datePublished": "{{ $post->created_at?->toIso8601String() }}",

            @if ($post->modified_at)
                "dateModified": "{{ $post->modified_at->toIso8601String() }}",
            @endif

            "author": [
                {
                    "@type": "Person",
                    "name": "{{ $post->user_name }}",
                    "url": "{{ route('home') }}"
                }
            ]
        }
    </script>
</x-app>
