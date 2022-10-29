<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about PHP, Laravel or anything related to its ecosystem? This is the best blog to find your answer."
    class="text-gray-600"
>
    <div class="container sm:flex sm:items-center sm:justify-between py-8 text-center sm:text-left">
        <a href="{{ route('home') }}">
            <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
                Benjamin Crozat
            </span>

            <span class="block opacity-75 text-xs tracking-widest uppercase">
                The web developer life
            </span>
        </a>

        <nav class="flex items-center justify-center sm:justify-start gap-8 mt-8 sm:mt-0">
            <a href="{{ route('home') }}" class="bg-indigo-400 hover:opacity-50 px-3 py-2 rounded text-white tracking-widest transition-opacity text-xs uppercase">
                Hire me!
            </a>
        </nav>
    </div>

    <section id="articles" class="container max-w-[1024px] mt-8 sm:mt-16">
        <p class="font-bold text-center text-xl">Featured posts</p>

        @if ($featured->isNotEmpty())
            <div class="grid sm:grid-cols-2 gap-4 mt-8">
                @foreach ($featured as $post)
                    <a href="{{ route('posts.show', $post->slug) }}" class="hover:opacity-50 overflow-hidden relative rounded-xl transition-opacity">
                        <img
                            src="{{ $post->image }}"
                            alt='Illustration for "{{ $post->title }}"'
                        />

                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black/30 flex items-center justify-between gap-4 font-bold leading-tight p-4 text-white"
                            style="text-shadow: 0 0 3px rgba(0, 0, 0, .3)"
                        >
                            {{ $post->title }}
                            <x-heroicon-o-arrow-right class="flex-shrink-0 w-3 h-3" />
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

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

    <div class="bg-gray-100 mt-16 py-16">
        <x-newsletter class="container scroll-mt-8 sm:scroll-mt-16" />
    </div>

    <div class="bg-gray-900 flex-grow">
        <x-footer class="text-gray-400" links-color="text-gray-300" />
    </div>
</x-app>
