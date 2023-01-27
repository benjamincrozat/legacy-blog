<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-posts::nav
        :funnel="$post->promotes_affiliate_links"
        class="container mt-6"
    />

    @if (! $post->promotes_affiliate_links)
        <x-posts::breadcrumb class="container mt-8">
            {{ $post->title }}
        </x-posts::breadcrumb>
    @endif

    <article class="mt-8">
        <h1 class="container font-thin text-3xl md:text-5xl dark:text-white">
            {{ $post->title }}
        </h1>

        <x-posts::metadata
            :email="$post->user->email"
            :name="$post->user->name"
            :read-time="$post->read_time"
            class="container"
        />

        @if (! $post->promotes_affiliate_links)
            <x-posts::newsletter
                :subscribers-count="$subscribersCount"
                class="container max-w-screen-xs mt-10"
            />
        @endif

        @if ($post->introduction)
            <div class="!container content mt-8">
                {!! $post->rendered_introduction !!}
            </div>
        @endif

        @if ($post->promotes_affiliate_links && ($bestProducts = $post->bestProducts()->with('affiliate')->get())->isNotEmpty())
            <div class="container grid sm:grid-cols-2 md:grid-cols-3 gap-4 mt-8">
                @foreach ($bestProducts as $bestProduct)
                    <x-best-product :best-product="$bestProduct" class="sm:col-span-1" />
                @endforeach
            </div>

            <p class="container mt-4 opacity-75 text-center text-xs">
                This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal. @if ($bestProducts->count() > 1) <br class="hidden md:inline" /> @endif
                I only promote products I've personally used and stand behind.
            </p>
        @endif

        <x-toc :toc="$post->table_of_contents" class="container mt-8" />

        @if (! $post->promotes_affiliate_links && $post->image)
            <div class="container text-center">
                <img src="{{ $post->image }}" width="1280" height="720" alt="{{ $post->title }}" class="aspect-video inline mt-8 object-cover" />
            </div>
        @endif

        <div class="!container content mt-8">
            {!! $post->rendered_content !!}
        </div>
    </article>

    <div class="border-b-4 border-dotted border-gray-200 dark:border-gray-700 mt-8 sm:mt-16 mx-auto w-[100px]"></div>

    <x-posts::author
        :description="$post->user->rendered_description"
        :email="$post->user->email"
        :name="$post->user->name"
    />

    <x-posts::divider class="-mt-4" />

    @if ($others->isNotEmpty())
        <div class="container max-w-[1024px] mt-8 sm:mt-16">
            <p class="font-semibold text-center text-xl">Recommended</p>

            <div class="grid md:grid-cols-2 gap-4 sm:gap-8 mt-8">
                @foreach ($others as $other)
                    <x-post :post="$other" @click="window.fathom?.trackGoal('LTFJEOM0', 0)" />
                @endforeach
            </div>
        </div>
    @endif

    <div class="bg-gray-900 dark:bg-black mt-8 sm:mt-16">
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
                    "name": "{{ $post->user->name }}",
                    "url": "{{ route('home') }}"
                }
            ]
        }
    </script>
</x-app>
