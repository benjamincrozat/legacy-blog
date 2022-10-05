<x-app
    :title="$post->title"
    :description="$post->description"
>
    <x-head />

    <x-breadcrumb class="mt-16">
        <x-breadcrumb-item>
            {{ $post->title }}
        </x-breadcrumb-item>
    </x-breadcrumb>

    <article class="mt-8">
        {{-- Post --}}
        <div class="container">
            <h1 class="font-thin text-3xl md:text-5xl">{{ $post->title }}</h1>

            <x-metadata :published-at="$post->getPublishedAtDate()" :modified-at="$post->getModifiedAtDate()" :read-time="$post->getReadTime()" class="mt-4" />

            <p class="font-normal font-serif mt-8 text-blue-400 text-xl">
                {{ $post->description }}
            </p>

            @if (! empty($tableOfContents = $post->getTableOfContents()))
                <nav class="mt-8" x-data="{ open: false }">
                    <h4 class="font-bold">Table of contents</h4>

                    <ol class="grid gap-4 mt-4">
                        @php
                        $limit = 10;
                        @endphp

                        @foreach ($tableOfContents as $item)
                            <li class="flex items-center gap-3 text-blue-900/75" @if ($loop->index > $limit - 1) x-show="open" @endif style="margin-left: calc(1.5rem * {{ $item['level'] - 2 }})">
                                <span class="bg-blue-100/75 flex flex-shrink-0 items-center justify-center font-normal rounded-full text-xs w-6 h-6">{{ $loop->index + 1 }}</span>

                                <a href="#{{ $item['id'] }}">
                                    {{ $item['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ol>

                    @if (count($tableOfContents) > $limit)
                        <button class="flex items-center gap-2 font-normal mt-4 text-sm" @click="open = ! open">
                            <span x-show="! open">There's more</span>
                            <span x-show="open">Hide</span>
                            <x-heroicon-o-chevron-down class="w-3 h-3" x-show="! open" />
                            <x-heroicon-o-chevron-up class="w-3 h-3" x-show="open" />
                        </button>
                    @endif
                </nav>
            @endif

            <div class="max-w-full mt-8 prose prose-a:border-b prose-a:border-blue-200 prose-a:text-blue-400 prose-a:no-underline">
                {!! Illuminate\Support\Str::marxdown($post->content) !!}
            </div>
        </div>

        {{-- Author --}}
        <aside class="container mt-16">
            <figure class="flex items-center gap-2">
                <img src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="24" height="24" alt="Benjamin Crozat's avatar." class="flex-shrink-0 rounded-full" />

                <figcaption>
                    Post written by
                    <a href="https://twitter.com/benjamincrozat" target="_blank" rel="noopener noreferrer" class="font-bold text-black" @click="window.fathom?.trackGoal('LNRXVF3B', 0);">
                        Benjamin Crozat
                    </a>
                </figcaption>
            </figure>

            <p class="bg-white font-normal font-serif mt-4 p-4 rounded-lg shadow-md shadow-black/5">
                Hi! I'm Benjamin Crozat. I'm a freelance full-stack Laravel developer. <a href="mailto:benjamincrozat@me.com" class="border-b border-blue-200 text-blue-400">Contact me</a> if you need a consultant to help you with your project.
            </p>
        </aside>

        {{-- Newsletter --}}
        <div class="bg-gray-100 mt-16">
            <div class="container py-8 sm:py-16">
                <x-newsletter class="scroll-mt-8 sm:scroll-mt-16" />
            </div>
        </div>

        {{-- Other posts to read --}}
        @if ($others->isNotEmpty())
            <div class="container py-16">
                <h4 class="font-bold text-center text-xl">Other posts to read</h4>

                <ul class="grid gap-12 mt-8">
                    @foreach ($others as $post)
                        <li><x-post :post="$post" /></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </article>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "{{ $post->title }}"
            }]
        }
    </script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "{{ $post->title }}",
            "datePublished": "{{ $post->getPublishedAtDate()->toIso8601String() }}",

            @if ($post->getModifiedAtDate())
                "dateModified": "{{ $post->getModifiedAtDate()->toIso8601String() }}",
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
