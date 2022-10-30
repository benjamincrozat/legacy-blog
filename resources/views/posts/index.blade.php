<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="text-gray-600"
>
    <div class="container flex justify-between mt-8">
        <a href="{{ route('home') }}">
            <span class="font-extrabold translate-y-px text-base tracking-widest uppercase">
                Benjamin Crozat
            </span>

            <span class="block opacity-75 text-xs tracking-widest uppercase">
                The web developer life
            </span>
        </a>

        <nav class="flex items-center gap-8">
            <x-hire-me />
        </nav>
    </div>

    <section id="articles" class="container max-w-[1024px] mt-8 sm:mt-16">
        <p class="font-bold text-center text-xl">Featured posts</p>

        @if ($featured->isNotEmpty())
            <div class="grid sm:grid-cols-2 gap-4 mt-8">
                @foreach ($featured as $post)
                    <a href="{{ route('posts.show', $post->slug) }}" class="overflow-hidden relative rounded-xl">
                        <img
                            src="{{ $post->image }}"
                            alt='Illustration for "{{ $post->title }}"'
                        />

                        <div
                            class="absolute bottom-2 left-2 right-2 bg-black/40 backdrop-blur-md flex items-center justify-between gap-4 leading-tight p-3 rounded-md text-sm text-white"
                            style="text-shadow: 0 0 3px rgba(0, 0, 0, .1)"
                        >
                            {{ $post->title }}
                            <x-heroicon-o-arrow-right class="flex-shrink-0 w-3 h-3" />
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3461630254419592" crossorigin="anonymous"></script>

        <ins
            class="adsbygoogle"
            style="display:block"
            data-ad-format="autorelaxed"
            data-ad-client="ca-pub-3461630254419592"
            data-ad-slot="3016389119"
        ></ins>

        <script>(adsbygoogle = window.adsbygoogle || []).push({})</script>

        <p class="font-bold mb-4 mt-16 text-center text-xl">
            Latest posts
        </p>

        @if ($posts->isNotEmpty())
            <div class="grid sm:grid-cols-2 gap-8 mt-8">
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
            </div>
        @endif
    </section>

    <div class="container max-w-[1024px] mt-16">
        <x-newsletter class="max-w-screen-sm mx-auto" />
    </div>

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
