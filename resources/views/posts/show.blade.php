<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog.top />

    <x-breadcrumb class="container mt-8 sm:mt-16">
        <x-breadcrumb-item href="{{ route('posts.index') }}">
            Blog
        </x-breadcrumb-item>

        <x-breadcrumb-item class="truncate">
            {{ $post->title }}
        </x-breadcrumb-item>
    </x-breadcrumb>

    <div class="container lg:grid lg:grid-cols-3 lg:gap-16 mt-8 relative">
        @empty ($post->hideBanners)
            <x-affiliate channel="article" class="flex flex-wrap justify-center gap-4 max-w-[768px] mb-8 py-6 lg:hidden" />
        @endempty

        <article class="lg:col-span-2">
            {{-- Title --}}
            <h1 class="font-thin text-3xl md:text-5xl dark:text-white">
                {{ $post->title }}
            </h1>

            {{-- Metadata --}}
            <div class="flex items-center gap-2 mt-4 text-sm">
                <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

                <a href="{{ route('home') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>
                —
                @choice(':count minute|:count minutes', $post->getReadTime()) read
            </div>

            <x-blog.toc :toc="$post->getTableOfContents()" class="lg:hidden mt-8" />

            {{-- Content --}}
            <div class="break-words max-w-full mt-8 prose prose-a:border-b prose-a:border-indigo-400/50 prose-a:text-indigo-400 prose-a:no-underline prose-img:dark:brightness-75 prose-code:dark:text-gray-300 prose-headings:dark:text-white prose-strong:dark:text-white dark:text-gray-300">
                {!! Illuminate\Support\Str::marxdown($post->content) !!}
            </div>
        </article>

        <div class="hidden md:block md:col-span-1 text-sm">
            <x-blog.toc :toc="$post->getTableOfContents()" />

            @empty ($post->hideBanners)
                <x-affiliate channel="sidebar" class="flex flex-wrap justify-center gap-4 max-w-[768px] sm:mx-auto mt-8 py-6" />
            @endempty

            <div class="border dark:border-gray-800 mt-8 p-4 rounded">
                <p class="font-normal">
                    Let me share with you my discoveries about the art of crafting websites, <span class="text-indigo-400">for&nbsp;free</span>.
                </p>

                <x-form method="POST" action="{{ route('subscribe') }}" class="mt-4">
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="homer@simpson.com"
                        required
                        class="dark:bg-gray-800 block dark:border-0 border-gray-200 placeholder-gray-200 dark:placeholder-gray-600 rounded text-sm w-full"
                    />

                    <button type="submit" class="font-bold mt-4 mx-auto table text-indigo-400">
                        Sign me up!
                    </button>
                </x-form>
            </div>

            @if ($post->hideBanners)
                <div class="border mt-8 p-4 rounded text-xs">
                    <p>This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal.</p>
                    <p class="mt-2">I only promote products I've personally used and stand behind.</p>
                </div>
            @endif
        </div>
    </div>

    <x-newsletter class="container md:hidden sm:max-w-[480px] mt-16" />

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
            "datePublished": "{{ $post->getPublishedAtDate()?->toIso8601String() }}",

            @if ($post->getModifiedAtDate())
                "dateModified": "{{ $post->getModifiedAtDate()?->toIso8601String() }}",
            @endif

            "author": [
                {
                    "@type": "Person",
                    "name": "Benjamin Crozat",
                    "url": "{{ route('home') }}"
                }
            ]
        }
    </script>
</x-app>
