<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-nav class="container mt-4 sm:mb-8 sm:mt-6" />

    @if (! $post->promotes_affiliate_links)
        <x-breadcrumb class="container mt-8">
            <x-breadcrumb-item class="truncate">
                {{ $post->title }}
            </x-breadcrumb-item>
        </x-breadcrumb>
    @endif

    <article class="container mt-8">
        <h1 class="font-thin text-3xl md:text-5xl dark:text-white">
            {{ $post->title }}
        </h1>

        <div class="flex items-center gap-2 mt-4 text-sm">
            <img src="https://www.gravatar.com/avatar/{{ md5($post->user->email) }}" width="18" height="18" alt="{{ $post->user->name }}" class="rounded-full" />

            <a href="{{ route('consulting') }}" class="font-normal underline" @click="window.fathom?.trackGoal('LNRXVF3B', 0)">{{ $post->user->name }}</a>
            —
            <span class="opacity-75">@choice(':count minute|:count minutes', $post->read_time) read</span>
        </div>

        @if (! $post->promotes_affiliate_links)
            <div class="sm:max-w-screen-xs mt-10 sm:mx-auto text-center text-sm md:text-base">
                <x-icon-logos class="mx-auto w-4/5 md:w-auto" />

                <p class="mt-4">
                    <strong class="font-semibold">@choice(':count person|:count persons', $subscribersCount) subscribed to my newsletter</strong>.<br /> Join them and enjoy free content about the art of crafting websites!
                </p>

                <x-form method="POST" action="{{ route('subscribe') }}" class="flex items-stretch gap-2 mt-4 sm:mt-6">
                    <input type="email" name="email" id="email" placeholder="homer@simpson.com" required class="dark:bg-gray-700/40 block border-0 placeholder-gray-300 dark:placeholder-gray-600 px-3 md:px-4 py-2 md:py-3 rounded shadow text-sm md:text-base w-full" />

                    <button class="bg-gradient-to-r from-purple-300 dark:from-purple-500 to-purple-400 dark:to-purple-600 block font-semibold px-3 md:px-4 py-2 md:py-3 rounded shadow text-white">
                        Subscribe
                    </button>
                </x-form>

                <div class="border-b-4 border-dotted border-gray-200 dark:border-gray-700 mt-10 mx-auto w-[100px]"></div>
            </div>
        @endif

        @if ($post->introduction)
            <div class="content mt-8">
                {!! $post->rendered_introduction !!}
            </div>
        @endif

        @if ($post->promotes_affiliate_links && ($bestProducts = $post->bestProducts()->with('affiliate')->get())->isNotEmpty())
            <div
                class="grid
                @if (1 === $bestProducts->count()) sm:max-w-[320px] sm:mx-auto @endif
                @if ($bestProducts->count() > 1) sm:grid-cols-2 @endif
                @if ($bestProducts->count() > 2) md:grid-cols-3 @endif
                gap-4 mt-8"
            >
                @foreach ($bestProducts as $bestProduct)
                    <x-best-product :best-product="$bestProduct" />
                @endforeach

                <p class="col-span-full opacity-75 text-center text-xs">
                    This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal. @if ($bestProducts->count() > 1) <br class="hidden md:inline" /> @endif
                    I only promote products I've personally used and stand behind.
                </p>
            </div>
        @endif

        <x-toc :toc="$post->table_of_contents" class="mt-8" />

        @if (! $post->promotes_affiliate_links && $post->image)
            <img src="{{ $post->image }}" width="1280" height="720" alt="{{ $post->title }}" class="aspect-video mt-8 object-cover" />
        @endif

        <div class="content mt-8">
            {!! $post->rendered_content !!}
        </div>
    </article>

    <div class="container mt-16">
        <aside class="border dark:border-gray-800 flex flex-wrap sm:flex-nowrap items-center justify-between gap-4 sm:gap-8 px-4 py-6 sm:p-6 rounded">
            <div class="order-2 sm:order-none">
                <p class="font-semibold text-xl">
                    Article written by {{ $post->user->name }}
                </p>

                <div class="content !leading-normal">
                    {!! $post->user->rendered_description !!}
                </div>
            </div>

            <img src="https://www.gravatar.com/avatar/{{ md5($post->user->email) }}?s=192" width="96" height="96" alt="{{ $post->user->name }}" class="-translate-y-[.5px] flex-shrink-0 w-16 h-16 sm:w-24 sm:h-24 order-1 sm:order-none rounded-full" />
        </aside>
    </div>

    @if ($others->isNotEmpty())
        <div class="container max-w-[1024px] mt-16">
            <p class="font-semibold text-center text-xl">Other posts to read</p>

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
