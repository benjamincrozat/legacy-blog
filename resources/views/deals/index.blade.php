<x-app
    title="Best SaaS products for AI writing, SEO, web hosting & more"
    description=""
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog.top class="container mt-4 md:mt-8" />

    <x-breadcrumb class="container mt-8 sm:mt-16">
        <x-breadcrumb-item href="{{ route('posts.index') }}">
            Blog
        </x-breadcrumb-item>

        <x-breadcrumb-item>
            Deals
        </x-breadcrumb-item>
    </x-breadcrumb>

    <article class="container max-w-[1024px] mt-8 sm:mt-16">
        <h1 class="font-thin text-3xl md:text-5xl dark:text-white">
            Best SaaS products for AI writing, SEO, web hosting & more
        </h1>

        <div class="flex items-center gap-2 mt-4 text-sm">
            <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}" width="18" height="18" alt="Benjamin Crozat's avatar." class="-translate-y-[.5px] rounded-full" />

            Article written by <a href="{{ route('home') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">Benjamin Crozat</a>
        </div>

        @forelse ($categories as $category)
            <h2 class="font-bold mt-8 sm:mt-16 text-xl">
                Best {{ $category->name }} SaaS products
            </h2>

            <div class="break-words max-w-full mt-8 prose prose-a:border-b prose-a:border-indigo-400/50
            prose-a:text-indigo-400 prose-a:no-underline prose-code:dark:text-current prose-headings:dark:text-white
            prose-hr:dark:border-gray-800 prose-thead:dark:border-gray-800 prose-strong:text-current
            prose-tr:dark:border-gray-800 dark:text-current">
                {!! $category->rendered_description !!}
            </div>

            <ul class="grid sm:grid-cols-2 gap-4 mt-8">
                @foreach ($category->deals()->orderByDesc('end_at')->orderByDesc('created_at')->get() as $deal)
                    <li><x-deal :deal="$deal" class="h-full" /></li>
                @endforeach
            </ul>
        @empty
            <p class="mt-8 sm:mt-16 text-center text-gray-400">There's no deal yet.</p>
        @endforelse
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
            "headline": "Best SaaS products for AI writing, SEO, web hosting & more",
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
