<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
>
    <div class="container sm:flex sm:items-center sm:justify-between mt-8 text-center sm:text-left">
        <a href="{{ route('home') }}">
            <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
                {{ config('app.name') }}
            </span>

            <span class="block opacity-75 text-xs tracking-widest uppercase">
                The web developer life
            </span>
        </a>

        <nav class="flex items-center justify-center sm:justify-start gap-8 mt-8 sm:mt-0">
            <a href="{{ route('posts.index') }}" class="hover:opacity-50 text-xs tracking-widest transition-opacity uppercase">
                Blog
            </a>

            <x-hire-me />
        </nav>
    </div>

    <x-breadcrumb class="container max-w-[1024px] mt-8 sm:mt-16">
        <x-breadcrumb-item href="{{ route('posts.index') }}">
            Blog
        </x-breadcrumb-item>

        <x-breadcrumb-item class="truncate">
            {{ $post->title }}
        </x-breadcrumb-item>
    </x-breadcrumb>

    <div class="container md:grid md:grid-cols-3 md:gap-16 max-w-[1024px] mt-8 relative">
        <article class="md:col-span-2">
            {{-- Title --}}
            <h1 class="font-thin text-3xl md:text-5xl">
                {{ $post->title }}
            </h1>

            {{-- Metadata --}}
            <div class="flex items-center gap-2 mt-4 text-sm">
                <img src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

                <p>
                    <a href="https://twitter.com/benjamincrozat" target="_blank" rel="noopener noreferrer" class="font-normal" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>

                    <span class="mx-1">—</span>

                    @choice(':count minute|:count minutes', $post->getReadTime()) read
                </p>
            </div>

            <div class="md:hidden mt-8 text-sm">
                <p class="font-normal">
                    Table of contents
                </p>

                <x-table-of-contents :post="$post" />
            </div>

            {{-- Content --}}
            <div class="max-w-full mt-8 prose prose-a:border-b prose-a:border-indigo-200 prose-a:text-indigo-400 prose-a:no-underline">
                {!! Illuminate\Support\Str::marxdown($post->content) !!}
            </div>
        </article>

        <div class="hidden md:block md:col-span-1">
            <div class="sticky top-8 text-sm">
                <nav>
                    <p class="font-normal">
                        Table of contents
                    </p>

                    <x-table-of-contents :post="$post" />
                </nav>

                <div>
                    <p class="font-normal mt-8">
                        Learn more about building websites, <span class="text-indigo-400">for free</span>.
                    </p>

                    <x-form method="POST" action="{{ route('subscribe') }}" class="mt-4">
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="homersimpson@example.com"
                            required
                            class="block border-gray-200 placeholder-gray-200 rounded text-sm w-full"
                        />

                        <button type="submit" class="font-bold mt-4 mx-auto table text-indigo-400">
                            Sign me up!
                        </button>
                    </x-form>
                </div>
            </div>
        </div>
    </div>

    <x-newsletter class="border-y border-gray-200/50 sm:hidden max-w-screen-sm mt-16 mx-4 py-8" />

    {{-- Other posts to read --}}
    @if ($others->isNotEmpty())
        <div class="container max-w-[1024px] py-16">
            <p class="font-bold text-center text-xl">Other posts to read</p>

            <div class="grid sm:grid-cols-2 gap-12 sm:gap-8 mt-8">
                @foreach ($others as $post)
                    <x-post :post="$post" />
                @endforeach
            </div>
        </div>
    @endif

    <div class="bg-gray-900 flex-grow">
        <x-footer class="text-gray-200" />
    </div>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Blog"
            }, {
                "@type": "ListItem",
                "position": 2,
                "name": "{{ $post->title }}"
            }]
        }
    </script>

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
