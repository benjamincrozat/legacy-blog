@if (! Route::is('consulting.cto'))
    <div
        {{ $attributes->merge([
            'class' => 'fixed inset-0 backdrop-blur-md backdrop-brightness-110 backdrop-saturate-150
            bg-black/50 grid place-items-center overflow-scroll dark:text-gray z-20',
        ]) }}
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
@endif
