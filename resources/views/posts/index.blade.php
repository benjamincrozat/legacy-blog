<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="text-gray-600"
>
    <div class="container flex justify-between mt-8">
        <x-blog.title />

        <nav class="flex items-center gap-8">
            <x-hire-me />
        </nav>
    </div>

    <section id="articles" class="container mt-8 sm:mt-16">
        <h2 class="font-bold text-center text-xl">
            Featured posts
        </h2>

        @if ($featured->isNotEmpty())
            <div class="grid sm:grid-cols-2 gap-4 mt-8">
                @foreach ($featured as $post)
                    <figure>
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img
                                src="{{ $post->image }}"
                                alt='Illustration for "{{ $post->title }}"'
                                class="rounded-md"
                            />
                        </a>

                        <figcaption class="bg-gray-900 flex items-center justify-between gap-4 leading-tight mt-2 p-3 rounded-md text-sm text-white">
                            <a href="{{ route('posts.show', $post->slug) }}" class="line-clamp-1">
                                {{ $post->title }}
                            </a>

                            <x-heroicon-o-arrow-right class="flex-shrink-0 w-3 h-3" />
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        @endif

        {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3461630254419592" crossorigin="anonymous"></script>

        <ins
            class="adsbygoogle"
            style="display:block"
            data-ad-format="autorelaxed"
            data-ad-client="ca-pub-3461630254419592"
            data-ad-slot="3016389119"
        ></ins>

        <script>(adsbygoogle = window.adsbygoogle || []).push({})</script> --}}

        <h2 class="font-bold mb-4 mt-16 text-center text-xl">
            Latest posts
        </h2>

        @if ($posts->isNotEmpty())
            <div class="grid sm:grid-cols-2 gap-8 mt-8">
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
            </div>
        @endif
    </section>

    <x-newsletter class="container max-w-screen-sm mt-16" />

    <div class="bg-gray-900 flex-grow mt-16">
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
            }]
        }
    </script>
</x-app>
