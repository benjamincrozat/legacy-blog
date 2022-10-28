<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
>
    <x-header />

    <x-breadcrumb class="mt-16">
        <x-breadcrumb-item>
            {{ $post->title }}
        </x-breadcrumb-item>
    </x-breadcrumb>

    <article class="mt-8">
        {{-- Post --}}
        <div class="container">
            {{-- Title --}}
            <h1 class="font-thin text-3xl md:text-5xl">
                {{ $post->title }}
            </h1>

            {{-- Metadata --}}
            <x-metadata
                :published-at="$post->getPublishedAtDate()"
                :read-time="$post->getReadTime()"
                class="mt-4"
            />

            <x-table-of-contents :post="$post" />

            {{-- Content --}}
            <div class="max-w-full mt-8 prose prose-a:border-b prose-a:border-blue-200 prose-a:text-blue-400 prose-a:no-underline">
                {!! Illuminate\Support\Str::marxdown($post->content) !!}
            </div>
        </div>

        {{-- Newsletter --}}
        <div class="bg-gray-100 mt-16">
            <aside class="container max-w-screen-sm py-8 sm:py-16">
                <x-newsletter class="scroll-mt-8 sm:scroll-mt-16" />
            </aside>
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
