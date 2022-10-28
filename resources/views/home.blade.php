<x-app
    description="Have you ever had a question about PHP, Laravel or anything related to its ecosystem? This is the best blog to find your answer."
>
    <x-header />

    @php
    $featured = $posts->filter(fn ($p) => $p->image && $p->featured);
    @endphp

    @if ($featured->isNotEmpty())
        <div class="container mt-8 sm:mt-16">
            <a href="{{ route('posts.show', $featured->first()->slug) }}">
                <img
                    src="{{ $featured->first()->image }}"
                    alt='Illustration for "{{ $featured->first()->title }}"'
                />

                <div
                    class="bg-gray-800 flex items-center gap-2 leading-tight p-3 text-sm text-white"
                    style="text-shadow: 1px 1px 1px rgba(0, 0, 0, .1)"
                >
                    <span>{{ $featured->first()->title }}</span>
                    <x-heroicon-o-arrow-right class="w-3 h-3" />
                </div>
            </a>

            <div class="grid grid-cols-2 gap-1 mt-1">
                @foreach ($featured->nth(1, 1)->take(2) as $post)
                    <a href="{{ route('posts.show', $post->slug) }}">
                        <img
                            src="{{ $post->image }}"
                            alt='Illustration for "{{ $post->title }}"'
                        />

                        <div
                            class="bg-gray-800 flex items-center gap-2 leading-tight p-2 sm:p-3 text-xs sm:text-sm text-white"
                            style="text-shadow: 1px 1px 1px rgba(0, 0, 0, .1)"
                        >
                            <span class="line-clamp-1">{{ $post->title }}</span>
                            <x-heroicon-o-arrow-right class="w-3 h-3" />
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @if ($posts->isNotEmpty())
        <ul class="container grid gap-8 sm:gap-16 mt-16">
            @foreach ($posts as $post)
                <li><x-post :post="$post" /></li>
            @endforeach
        </ul>
    @endif

    <div class="bg-gray-100 mt-8 sm:mt-16 py-8 sm:py-16">
        <x-newsletter class="container max-w-screen-sm scroll-mt-8 sm:scroll-mt-16" />
    </div>
</x-app>
