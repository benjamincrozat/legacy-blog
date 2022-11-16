<x-app
    title="Best services for AI writing, SEO, web hosting & more"
    description=""
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog-nav class="container mt-4 md:mt-8" />

    <x-breadcrumb class="container mt-8 sm:mt-16">
        <x-breadcrumb-item href="{{ route('posts.index') }}">
            Blog
        </x-breadcrumb-item>

        <x-breadcrumb-item>
            Deals
        </x-breadcrumb-item>
    </x-breadcrumb>

    <article class="container max-w-[960px] mt-8">
        <h1 class="font-thin text-3xl md:text-5xl dark:text-white">
            Best services for AI writing, SEO, web&nbsp;hosting&nbsp;&&nbsp;more
        </h1>

        <div class="flex items-center gap-2 mt-4 text-sm">
            <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

            <span>Article written by <a href="{{ route('home') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a></span>
        </div>

        <div class="content mt-8">
            @foreach ($categories as $category)
                <h2>Best {{ $category->name }} services</h2>

                {!! $category->rendered_description !!}

                <div class="not-prose">
                    <ul class="grid sm:grid-cols-2 gap-4 mt-8">
                        @foreach ($category->deals()->highlightedFirst()->get() as $deal)
                            <li><x-deal :deal="$deal" class="h-full" /></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </article>

    <x-newsletter class="container max-w-[1024px] mt-16" />

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

    <div class="bg-gray-900 dark:bg-black flex-grow mt-16">
        <x-footer class="text-gray-200" />
    </div>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "Best services for AI writing, SEO, web hosting & more",
            "datePublished": "2022-11-15 14:00:00",
            "dateModified": "2022-11-15 14:00:00",
            "author": [
                {
                    "@type": "Person",
                    "name": "Benjamin Crozat",
                    "url": "https://benjamincrozat.com"
                }
            ]
        }
    </script>
</x-app>
