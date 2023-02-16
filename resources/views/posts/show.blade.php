<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-nav
        :funnel="$post->promotes_affiliate_links"
        class="container mt-6"
    />

    <x-posts::breadcrumb
        :promotes-affiliate-links="! $post->promotes_affiliate_links"
        class="container mt-8"
    >
        <x-posts::breadcrumb-item>
            {{ $post->title }}
        </x-posts::breadcrumb-item>
    </x-posts::breadcrumb>

    <article class="mt-8">
        <h1 class="@if ($post->ai) before:content-['AI-generated:'] before:text-indigo-400 @endif container font-thin text-3xl md:text-5xl dark:text-white">
            {{ $post->title }}
        </h1>

        <x-posts::metadata
            :email="$post->user->email"
            :name="$post->user->name"
            :read-time="$post->read_time"
            class="container mt-4"
        />

        <x-posts::newsletter
            :promotes-affiliate-links="$post->promotes_affiliate_links"
            :subscribers-count="$subscribersCount"
            class="container max-w-screen-xs mt-10"
        />

        @if ($post->introduction)
            <div class="!container content mt-8">
                {!! $post->rendered_introduction !!}
            </div>
        @endif

        <x-posts::best-products
            :best-products="$bestProducts"
            :promotes-affiliate-links="$post->promotes_affiliate_links"
            class="container mt-8"
        />

        <x-posts::toc
            :toc="$post->table_of_contents"
            class="container mt-8"
        />

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

    <x-posts::recommended
        :recommended="$recommended"
        class="container max-w-[1024px] mt-8 sm:mt-16"
    />

    <div class="bg-gray-900 dark:bg-black mt-8 sm:mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
