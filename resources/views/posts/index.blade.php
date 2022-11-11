<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <x-blog.top />

    <div class="container md:hidden mt-8 sm:mt-16">
        <x-newsletter class="text-sm" />
    </div>

    @if ($highlights->isNotEmpty())
        <section class="md:container mt-8 sm:mt-16">
            <h2 class="font-bold px-4 md:px-0 text-center text-xl">
                Featured articles
            </h2>

            <div class="flex md:grid md:grid-cols-2 gap-2 mt-8 px-4 md:px-0 overflow-x-scroll md:overflow-x-visible snap-x md:snap-none snap-mandatory">
                @foreach ($highlights as $highlight)
                    <x-blog.highlighted :post="$highlight->post" :first="$loop->first" />
                @endforeach
            </div>
        </section>
    @endif

    <section class="container mt-8 sm:mt-16">
        <h2 class="font-bold px-4 sm:px-0 text-center text-xl">
            Latest deals
        </h2>

        @if ($deals->isNotEmpty())
            <div class="grid md:grid-cols-2 gap-4 mt-8">
                @foreach ($deals as $deal)
                    <div class="border dark:border-gray-800 flex flex-col gap-2 p-4 rounded">
                        <div class="flex flex-grow items-center justify-between gap-8">
                            <div>
                                <p class="font-bold">{{ $deal->affiliate->name }}</p>

                                <div class="text-sm">
                                    {!! Illuminate\Support\Str::lightdown($deal->content) !!}
                                </div>
                            </div>

                            @if ($deal->image)
                                <img src="{{ str_replace('w_auto', 'h_110', $deal->image) }}" width="55" height="55" alt="{{ $deal->affiliate->name }}" class="rounded-lg" />
                            @endif
                        </div>

                        <a
                            href="{{ route('affiliate', $deal->affiliate) }}"
                            class="bg-gradient-to-r from-emerald-400 dark:from-emerald-700 to-emerald-500 dark:to-emerald-800 block leading-tight mt-2 px-4 py-3 rounded-sm shadow-md text-center text-sm text-white"
                        >
                            {!! Illuminate\Support\Str::lightdown($deal->button) !!}
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <section class="container mt-8 sm:mt-16">
        <h2 class="font-bold px-4 sm:px-0 text-center text-xl">
            Latest articles
        </h2>

        @if ($posts->isNotEmpty())
            <div class="grid md:grid-cols-2 gap-4 mt-8">
                @foreach ($posts as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('HH0P1ACM', 0)" />
                @endforeach
            </div>
        @endif
    </section>

    <div class="container md:hidden mt-16">
        <x-newsletter class="text-sm" />
    </div>

    <div class="bg-gray-900 dark:bg-black flex-grow mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
