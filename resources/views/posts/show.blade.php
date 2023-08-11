<x-app
    :title="$post->title"
    :description="$post->description"
    :image="$post->image"
    :funnel="$post->promotes_affiliate_links"
>
    <x-posts::breadcrumb
        :promotes-affiliate-links="! $post->promotes_affiliate_links"
        class="container mt-10 sm:mt-16"
    >
        <x-posts::breadcrumb-item>
            {{ $post->title }}
        </x-posts::breadcrumb-item>
    </x-posts::breadcrumb>

    <x-posts::post :highlights="$post->affiliates->where('pivot.highlight', true)" :post="$post" class="mt-10" />

    @if (! $post->community_link)
        <div class="border-b-4 border-dotted border-gray-200 dark:border-gray-700 mt-8 sm:mt-16 mx-auto w-[100px]"></div>

        <x-posts::author
            :description="$post->user->rendered_description"
            :email="$post->user->email"
            :name="$post->user->name"
        />
    @endif

    <x-posts::divider class="mt-0 md:mt-16" />

    @if (! $post->promotes_affiliate_links)
        <x-posts::recommended
            :recommended="$recommended"
            class="container max-w-[1024px] mt-8 sm:mt-16"
        />
    @endif

    <div class="mt-8 bg-gray-900 dark:bg-black sm:mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
