<button {{ $attributes->except('@click')->merge([
    'class' => 'flex items-center gap-2 transition-colors group hover:text-indigo-400',
]) }} @click="searching = ! searching">
    <span class="sr-only">Search</span>
    <x-heroicon-s-magnifying-glass class="flex-shrink-0 w-4 h-4 md:w-5 md:h-5" />
</button>

@if (Route::is('home') || Route::is('posts.show'))
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
                        setTimeout(() => $focus.focus($refs.input), 0)
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
            @keydown.meta.k.window="searching = ! searching; if (! searching) { query = '' }"
        >
            <div class="container pt-4 pb-20 md:max-w-screen-sm sm:py-4" @click.away="searching = false">
                <div
                    class="pb-2 bg-white rounded-lg shadow-xl dark:bg-gray-800"
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
                        class="w-full px-4 py-3 placeholder-gray-300 bg-transparent border-transparent focus:border-transparent dark:placeholder-gray-600 focus:ring-0 scroll-mt-4"
                        x-model="query"
                        x-ref="input"
                        @focus="$refs.input.select()"
                        @click="$focus.focus($refs.input); $refs.input.select()"
                    />

                    <p class="text-xs text-center cursor-default">
                        <span class="opacity-50">Powered by</span> <x-icon-algolia class="h-[.85rem] inline" />
                    </p>

                    <template x-if="! hits.length && query.length >= 3">
                        <p class="mt-2 text-center opacity-50">
                            No results found for your query.
                        </p>
                    </template>

                    <template x-if="hits.length">
                        <ul x-ref="results" class="mt-2">
                            <template x-for="hit in hits">
                                <li class="border-t border-gray-200/50 dark:border-gray-700/50">
                                    <a
                                        :href="`${appUrl}/${hit.slug}`"
                                        class="flex items-center justify-between gap-8 p-4 transition-colors hover:bg-gray-200/50 dark:hover:bg-gray-700/50 focus:bg-blue-400 dark:focus:bg-blue-400/50 group focus:outline-none"
                                    >
                                        <div>
                                            <div class="inline-block font-normal text-indigo-600 transition-colors dark:text-indigo-400 group-focus:text-white" x-html="hit._highlightResult.title.value"></div>
                                            <div class="mt-2 text-sm leading-relaxed transition-colors group-focus:text-white/75" x-html="hit._highlightResult.content.value"></div>
                                        </div>

                                        <img
                                            loading="lazy"
                                            :src="hit.image.replace('w_auto', 'h_128')"
                                            width="64"
                                            height="64"
                                            :alt="hit.title"
                                            class="object-cover aspect-square"
                                        />
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </template>
                </div>

                <button
                    class="fixed z-30 grid p-3 text-white -translate-x-1/2 rounded-full shadow-lg bottom-4 left-1/2 backdrop-blur-md bg-black/50 dark:bg-white/50 place-items-center sm:hidden dark:text-black"
                    @click="searching = false"
                >
                    <x-heroicon-o-x-mark class="w-5 h-5" />
                    <span class="sr-only">Close</span>
                </button>
            </div>
        </div>
    @endif
@endif
