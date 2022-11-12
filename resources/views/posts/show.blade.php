<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    :disable-ads="$post->promotes_affiliate_links"
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog.top class="container" />

    <x-blog.breadcrumb class="container mt-8 sm:mt-16">
        <x-blog.breadcrumb-item href="{{ route('posts.index') }}">
            Blog
        </x-blog.breadcrumb-item>

        <x-blog.breadcrumb-item class="truncate">
            {{ $post->title }}
        </x-blog.breadcrumb-item>
    </x-blog.breadcrumb>

    <div class="container lg:grid lg:grid-cols-3 lg:gap-8 mt-8 relative">
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

            @if ($post->features->isNotEmpty())
                <div class="grid sm:grid-cols-2 gap-4 mt-8">
                    @foreach ($post->features as $feature)
                        <div class="border first:border-orange-300 dark:border-gray-800 dark:first:border-orange-900 flex flex-col group gap-2 p-4 rounded text-sm">
                            <div class="text-center">
                                <span class="bg-gradient-to-r from-emerald-400 dark:from-emerald-600 group-first:from-orange-300 to-emerald-500 dark:to-emerald-700 dark:group-first:from-orange-400 group-first:to-orange-400 dark:group-first:to-orange-500 font-bold inline-block px-3 py-1 rounded-full text-white text-xs">
                                    {{ $feature->title }}
                                </span>
                            </div>

                            <div class="flex-grow mt-2">
                                <div class="text-center">
                                    @if ($feature->affiliate->image)
                                        <img loading="lazy" src="{{ $feature->affiliate->image }}" alt="{{ $feature->affiliate->name }}" width="48" height="48" class="inline rounded-lg" />
                                    @endif

                                    <div class="mt-4">
                                        <span class="border-b border-gray-200/50 dark:border-gray-300/30 font-bold">
                                            {{ $feature->affiliate->name }}
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4 text-center sm:text-left">
                                    {{ $feature->description }}
                                </div>
                            </div>

                            <a href="{{ route('affiliate', $feature->affiliate->slug) }}" target="_blank" rel="nofollow noopener noreferrer" class="bg-gradient-to-r from-emerald-400 dark:from-emerald-700 group-first:from-orange-300 dark:group-first:from-orange-400 to-emerald-500 dark:to-emerald-800 group-first:to-orange-400 dark:group-first:to-orange-500 block font-bold leading-tight mt-2 px-4 py-3 rounded-sm shadow-md text-center text-sm text-white">
                                Go to site
                            </a>

                            <div class="mt-3 text-center">
                                <a href="#{{ $feature->affiliate->slug }}" class="flex items-center justify-center gap-2 font-bold">
                                    Read review
                                    <x-heroicon-o-arrow-down class="w-4 h-4" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif (! should_display_ads() && ! $post->promotes_affiliate_links)
                <x-deal :deal="$deals->get(0)" class="md:hidden mt-8 text-sm" />
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

        {{-- Sidebar --}}
        <div class="hidden md:block md:col-span-1 text-sm">
            @if (! should_display_ads() && ! $post->promotes_affiliate_links)
                <x-deal :deal="$deals->get(1) ?? $deals->get(0)" class="mb-8" />
            @endif

            <x-newsletter class="mb-8" />

            @if ($post->promotes_affiliate_links)
                <x-widget class="text-xs">
                    <p>This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal.</p>
                    <p class="mt-2">I only promote products I've personally used and stand behind.</p>
                </x-widget>
            @endif
        </div>
    </div>

    <div class="container md:hidden mt-16">
        <x-newsletter class="text-sm" />
    </div>

    @if ($others->isNotEmpty())
        <div class="container mt-16">
            <h4 class="font-bold text-center text-xl">Other posts to read</h4>

            <div class="grid md:grid-cols-2 gap-4 sm:gap-8 mt-8">
                @foreach ($others as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('LTFJEOM0', 0)" />
                @endforeach
            </div>
        </div>
    @endif

    <x-deals class="md:container mt-16" />

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
