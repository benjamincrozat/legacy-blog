<x-app
    title="Web development articles from the community"
>
    <section class="container lg:max-w-[1024px] mt-16">
        <div class="px-4 text-xl font-semibold text-center sm:px-0">
            @if ($posts->onFirstPage())
                From the community
            @else
                Page {{ $posts->currentPage() }}
            @endif
        </div>

        <div class="grid gap-4 mt-8 md:grid-cols-2">
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
        </div>

        {{ $posts->links() }}
    </section>

    <div class="mt-16 bg-gray-900 dark:bg-black">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
