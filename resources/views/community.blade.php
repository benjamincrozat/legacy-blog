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

        <div class="grid gap-16 mt-8">
            @foreach ($posts as $post)
                <div>
                    <a
                        href="{{ $post->community_link }}"
                        target="_blank"
                        rel="nofollow noopener noreferrer"
                        class="block ml-[-2px] text-2xl sm:text-3xl md:text-4xl lg:text-5xl underline decoration-1 text-indigo-600 dark:text-indigo-400"
                    >
                        {{ $post->title }}
                    </a>

                    <div class="mt-2 opacity-75">
                        Shared on
                        <a href="{{ route('posts.show', $post) }}" class="font-normal">
                            <time datetime="{{ $post->created_at->toDateTimeString() }}">
                                {{ $post->created_at->isoFormat('ll') }}
                            </time>
                        </a>
                        <span class="mx-1 text-xs">•</span>
                        <span>{{ $post->community_link_domain }}</span>
                    </div>

                    <div class="mt-8 md:text-xl">{{ $post->description }}</div>
                </div>
            @endforeach
        </div>

        {{ $posts->links() }}
    </section>

    <div class="mt-16 bg-gray-900 dark:bg-black">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
