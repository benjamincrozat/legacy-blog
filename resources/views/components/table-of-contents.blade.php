@if (! empty($tableOfContents = $post->getTableOfContents()) && count($tableOfContents) > 1)
    <nav class="mt-8" x-data="{ open: false }">
        <h4 class="font-bold">Table of contents</h4>

        <ol class="grid gap-4 mt-4">
            @php
            $limit = 10;
            @endphp

            @foreach ($tableOfContents as $item)
                <li class="text-blue-900/75" @if ($item['level'] > 1) style="margin-left: calc(1rem * {{ $item['level'] - 2 }})" @endif @if ($loop->index > $limit - 1) x-show="open" @endif>
                    <a href="#{{ $item['id'] }}" class="flex items-center gap-2">
                        <x-heroicon-o-hashtag class="-translate-y-[.5px] w-3 h-3 text-blue-900/40" />

                        {{ $item['title'] }}
                    </a>
                </li>
            @endforeach
        </ol>

        @if (count($tableOfContents) > $limit)
            <button class="flex items-center gap-2 font-normal mt-4 text-sm" @click="open = ! open">
                <span x-show="! open">There's more</span>
                <span x-show="open">Hide</span>
                <x-heroicon-o-chevron-down class="w-3 h-3" x-show="! open" />
                <x-heroicon-o-chevron-up class="w-3 h-3" x-show="open" />
            </button>
        @endif
    </nav>
@endif
