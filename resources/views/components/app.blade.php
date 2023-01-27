<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
        <meta name="description" content="{{ $description ?? '' }}" />
        <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
        @if (! empty($image))
            <meta property="og:image" content="{{ $image }}" />
        @endif
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ URL::current() }}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:creator" content="@benjamincrozat" />
        <meta name="twitter:description" content="{{ $description ?? '' }}" />
        @if (! empty($image))
            <meta name="twitter:image" content="{{ $image }}" />
        @endif
        <meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />

        <title>{{ $title ?? "The web developer life of Benjamin Crozat" }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @if (! app()->runningUnitTests())
            @googlefonts
            @googlefonts('serif')
        @endif

        <x-feed-links />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/img/apple-touch-icon.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/img/16x16.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/img/32x32.png') }}" />
        <link rel="icon" type="image/png" sizes="48x48" href="{{ Vite::asset('resources/img/48x48.png') }}" />
        <link rel="icon" type="image/png" sizes="96x96" href="{{ Vite::asset('resources/img/96x96.png') }}" />

        <link rel="canonical" href="{{ url()->current() }}" />

        @if (app()->isProduction() && auth()->guest())
            <script defer src="https://save-tonight-hey-jude.benjamincrozat.com/script.js" data-site="{{ config('services.fathom.site_id') }}"></script>

            <script
                defer
                src="https://api.pirsch.io/pirsch.js"
                id="pirschjs"
                data-code="5N2hIsUQsCVX1LQtvPdJ3AGwQZHGxtt5"
                data-dev="benjamincrozat.com"
            ></script>

            <script
                defer
                src="https://api.pirsch.io/pirsch-events.js"
                id="pirscheventsjs"
                data-code="5N2hIsUQsCVX1LQtvPdJ3AGwQZHGxtt5"
                data-dev="benjamincrozat.com"
            ></script>

            <script
                defer
                src="https://api.pirsch.io/pirsch-sessions.js"
                id="pirschsessionsjs"
                data-code="5N2hIsUQsCVX1LQtvPdJ3AGwQZHGxtt5"
                data-dev="benjamincrozat.com"
            ></script>

            <script>
                (function(h,o,t,j,a,r){
                    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                    h._hjSettings={hjid:3333174,hjsv:6};
                    a=o.getElementsByTagName('head')[0];
                    r=o.createElement('script');r.async=1;
                    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                    a.appendChild(r);
                })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
            </script>
        @endif

        @stack('head')
    </head>
    <body {{ $attributes->merge(['class' => 'bg-gray-50 font-light', 'x-data' => '{ searching: false }']) }}>
        {{ $slot }}

        @if (session('status') || request()->convertkit)
            <div
                class="fixed bottom-0 left-0 right-0 z-10"
                x-init="setTimeout(() => open = false, 5000)"
                x-data="{ open: true }"
                x-show="open"
                x-cloak
            >
                <div class="container mb-4">
                    <div class="bg-gray-800 flex items-center justify-between gap-5 px-5 py-4 rounded-lg shadow-lg text-white">
                        <p>
                            @if ('confirmed-subscription' === request()->convertkit)
                                You're all set! Thank you for subscribing!
                            @else
                                {{ session('status') }}
                            @endif
                        </p>

                        <button class="text-indigo-400" @click="open = false">
                            <span class="sr-only">Close</span>
                            <x-heroicon-o-x-mark class="w-5 h-5 translate-y-[-0.5px]" />
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <div
            class="fixed inset-0 backdrop-blur-md backdrop-brightness-110 backdrop-saturate-150 bg-black/50 grid place-items-center overflow-scroll dark:text-gray z-20"
            x-cloak
            x-data="{
                hits: [],
                query: '',
            }"
            x-init="$watch('searching', value => {
                $nextTick(() => {
                    if (value) {
                        $focus.focus($refs.input)
                    } else {
                        $refs.input.blur()
                    }
                })
            }); $watch('query', async value => {
                if ('' === value || value.length < 3) {
                    hits = []
                } else {
                    const index = Algolia.initIndex(window.postsIndexName)

                    index.setSettings({
                        attributesToHighlight: ['title', 'content:100'],
                        highlightPreTag: `<em class='bg-yellow-300/75 dark:bg-indigo-400/30 dark:group-focus:bg-white/10 !not-italic !text-yellow-800 dark:!text-white'>`,
                        highlightPostTag: `</em>`,
                    })

                    const results = await index.search(value)

                    hits = results.hits
                }
            })"
            x-show="searching"
            x-trap="searching"
            x-transition.opacity
            @keyup.escape.window="query = ''; searching = false"
            @keydown.meta.k.window="searching = ! searching; if (! searching) { query = '' }; window.fathom.trackGoal('XEDJAZWO', 0)"
        >
            <div class="container md:max-w-screen-sm pb-20 pt-4 sm:py-4" @click.away="searching = false">
                <div
                    class="bg-white dark:bg-gray-800 pb-2 rounded-lg shadow-xl"
                    @keyup.up="$focus.previous()"
                    @keyup.down="$focus.next()"
                >
                    <input
                        type="search"
                        placeholder="{{ collect([
                            "Getting started with Tailwind CSS",
                            "How to check if a model is soft deleted?",
                            "How to use soft deletes in Laravel?",
                            "What's new in Laravel 10?",
                            "What's new in PHP 8.3?",
                        ])->random() }}"
                        class="bg-transparent border-transparent focus:border-transparent placeholder-gray-300 dark:placeholder-gray-600 px-4 py-3 focus:ring-0 scroll-mt-4 w-full"
                        x-model="query"
                        x-ref="input"
                        @focus="$refs.input.select()"
                        @click="$focus.focus($refs.input); $refs.input.select()"
                    />

                    <p class="cursor-default text-center text-xs">
                        <span class="opacity-50">Powered by</span> <x-icon-algolia class="h-[.85rem] inline" />
                    </p>

                    <template x-if="! hits.length && query.length >= 3">
                        <p class="mt-2 opacity-50 text-center">
                            No results found for your query.
                        </p>
                    </template>

                    <template x-if="hits.length">
                        <ul x-ref="results" class="mt-2">
                            <template x-for="hit in hits">
                                <li class="border-t border-gray-200/50 dark:border-gray-700/50">
                                    <a
                                        :href="`${appUrl}/${hit.slug}`"
                                        class="hover:bg-gray-200/50 dark:hover:bg-gray-700/50 focus:bg-blue-400 dark:focus:bg-blue-400/50 flex items-center justify-between gap-8 group p-4 transition-colors focus:outline-none"
                                    >
                                        <div>
                                            <div class="font-normal inline-block text-indigo-600 dark:text-indigo-400 group-focus:text-white transition-colors" x-html="hit._highlightResult.title.value"></div>
                                            <div class="leading-relaxed mt-2 text-sm group-focus:text-white/75 transition-colors" x-html="hit._highlightResult.content.value"></div>
                                        </div>

                                        <img
                                            loading="lazy"
                                            :src="hit.image.replace('w_auto', 'h_128')"
                                            width="64"
                                            height="64"
                                            :alt="hit.title"
                                            class="aspect-square object-cover"
                                        />
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </template>
                </div>

                <button
                    class="-translate-x-1/2 fixed bottom-4 left-1/2 backdrop-blur-md bg-black/50 dark:bg-white/50 grid place-items-center sm:hidden p-3 rounded-full shadow-lg text-white dark:text-black z-30"
                    @click="searching = false"
                >
                    <x-heroicon-o-x-mark class="w-5 h-5" />
                    <span class="sr-only">Close</span>
                </button>
            </div>
        </div>
    </body>
</html>
