<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    :disable-ads="$post->promotes_affiliate_links"
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog.top />

    <x-blog.breadcrumb class="container mt-8 sm:mt-16">
        <x-blog.breadcrumb-item href="{{ route('posts.index') }}">
            Blog
        </x-blog.breadcrumb-item>

        <x-blog.breadcrumb-item class="truncate">
            {{ $post->title }}
        </x-blog.breadcrumb-item>
    </x-blog.breadcrumb>

    <div class="container lg:grid lg:grid-cols-3 lg:gap-16 mt-8 relative">
        <article class="lg:col-span-2">
            <h1 class="font-thin text-3xl md:text-5xl dark:text-white">
                {{ $post->title }}
            </h1>

            <div class="flex items-center gap-2 mt-4 text-sm">
                <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

                <a href="{{ route('home') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>
                —
                <span class="opacity-75">@choice(':count minute|:count minutes', $post->read_time) read</span>
            </div>

            @if (! should_display_ads() && ! $post->promotes_affiliate_links))
                <x-banner :banner="$banners->first()" class="md:hidden mt-8 text-sm" />
            @endif

            <x-blog.toc :toc="$post->getTableOfContents()" class="lg:hidden mt-8" />

            <div
                class="break-words max-w-full mt-8
                prose prose-a:border-b prose-a:border-indigo-400/50 prose-a:text-indigo-400 prose-a:no-underline
                prose-code:dark:text-current prose-headings:dark:text-white prose-thead:dark:border-gray-800
                prose-strong:text-current prose-tr:dark:border-gray-800 dark:text-current"
            >
                {!! Illuminate\Support\Str::marxdown($post->content) !!}
            </div>
        </article>

        {{-- Sidebar --}}
        <div class="hidden md:block md:col-span-1 text-sm">
            @if (! should_display_ads() && ! $post->promotes_affiliate_links)
                <x-banner :banner="$banners->get(1)" class="mb-8" />
            @endif

            <x-blog.toc :toc="$post->getTableOfContents()" class="mb-8" />

            <x-newsletter class="mb-8" />

            @if ($post->promotes_affiliate_links)
                <div class="border dark:border-gray-800 p-4 rounded text-xs">
                    <p>This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal.</p>
                    <p class="mt-2">I only promote products I've personally used and stand behind.</p>
                </div>
            @endif
        </div>
    </div>

    <div class="container md:hidden mt-16">
        <x-newsletter class="text-sm" />
    </div>

    {{-- Other posts to read --}}
    @if ($others->isNotEmpty())
        <div class="container py-16">
            <p class="font-bold text-center text-xl">Other posts to read</p>

            <div class="grid sm:grid-cols-2 gap-4 sm:gap-8 mt-8">
                @foreach ($others as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('LTFJEOM0', 0)" />
                @endforeach
            </div>
        </div>
    @endif

    <div class="bg-gray-900 dark:bg-black flex-grow">
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
