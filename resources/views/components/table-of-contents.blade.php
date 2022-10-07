@if (! empty($tableOfContents = $post->getTableOfContents()) && count($tableOfContents) > 1)
    <nav class="mt-8" x-data="{ open: false }">
        <h4 class="font-bold">Table of contents</h4>

        <ol class="grid gap-4 mt-4">
            @php
            $limit = 10;
            @endphp

            @foreach ($tableOfContents as $item)
                <li class="flex items-center gap-3 text-blue-900/75" @if ($loop->index > $limit - 1) x-show="open" @endif style="margin-left: calc(1.5rem * {{ $item['level'] - 2 }})">
                    <span class="bg-blue-100/75 flex flex-shrink-0 items-center justify-center font-normal rounded-full text-xs w-6 h-6">{{ $loop->index + 1 }}</span>

                    <a href="#{{ $item['id'] }}">
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
