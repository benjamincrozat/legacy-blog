<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog-nav class="container mt-4 sm:my-8" />

    @if (! $post->promotes_affiliate_links)
        <x-breadcrumb class="container mt-8">
            <x-breadcrumb-item class="truncate">
                {{ $post->title }}
            </x-breadcrumb-item>
        </x-breadcrumb>
    @endif

    <article class="container mt-8">
        <h1 class="font-thin text-3xl md:text-5xl dark:text-white">
            {{ $post->title }}
        </h1>

        <div class="flex items-center gap-2 mt-4 text-sm">
            <img src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

            <a href="{{ route('consulting') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>
            —
            <span class="opacity-75">@choice(':count minute|:count minutes', $post->read_time) read</span>
        </div>

        @if (! $post->promotes_affiliate_links)
            <x-newsletter-notice class="mt-8" />

            @if ($post->image)
                <img src="{{ $post->image }}" width="1280" height="720" alt="{{ $post->title }}" class="aspect-video mt-8 object-cover" />
            @endif
        @endif

        @if ($post->introduction)
            <div class="content mt-8">
                {!! $post->rendered_introduction !!}
            </div>
        @endif

        @if ($post->promotes_affiliate_links && ($bestProducts = $post->bestProducts()->with('affiliate')->get())->isNotEmpty())
            <div
                class="grid
                @if (1 === $bestProducts->count()) sm:max-w-[320px] sm:mx-auto @endif
                @if ($bestProducts->count() > 1) sm:grid-cols-2 @endif
                @if ($bestProducts->count() > 2) md:grid-cols-3 @endif
                gap-4 mt-8"
            >
                @foreach ($bestProducts as $bestProduct)
                    <x-best-product :best-product="$bestProduct" />
                @endforeach

                <p class="col-span-full opacity-75 text-center text-xs">
                    This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal. @if ($bestProducts->count() > 1) <br class="hidden md:inline" /> @endif
                    I only promote products I've personally used and stand behind.
                </p>
            </div>
        @endif

        <x-toc :toc="$post->table_of_contents" class="mt-8" />

        <div class="content mt-8">
            {!! $post->rendered_content !!}
        </div>
    </article>

    <x-newsletter class="container max-w-[1024px] mt-16" />

    @if ($others->isNotEmpty())
        <div class="container max-w-[1024px] mt-16">
            <p class="font-bold text-center text-xl">Other posts to read</p>

            <div class="grid md:grid-cols-2 gap-4 sm:gap-8 mt-8">
                @foreach ($others as $other)
                    <x-post :post="$other" @click="window.fathom?.trackGoal('LTFJEOM0', 0)" />
                @endforeach
            </div>
        </div>
    @endif

    <div class="bg-gray-900 dark:bg-black mt-8 sm:mt-16">
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
