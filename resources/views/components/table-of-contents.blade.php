@if (! empty($toc = $post->getTableOfContents()) && count($toc) > 1)
    <nav class="text-sm" x-data="{ open: false }">
        <p class="font-bold">
            Table of contents
        </p>

        <ol class="grid gap-2 mt-4">
            @foreach ($toc as $item)
                <li
                    @if ($item['level'] > 1) style="margin-left: calc(1rem * {{ $item['level'] - 2 }})" @endif
                >
                    <a
                        href="#{{ $item['id'] }}"
                        class="flex items-center gap-2 text-indigo-900/75 hover:text-indigo-900/40 transition-colors"
                    >
                        <x-heroicon-o-hashtag
                            class="-translate-y-px flex-shrink-0 w-3 h-3 text-indigo-900/40"
                        />

                        {{ $item['title'] }}
                    </a>
                </li>
            @endforeach
        </ol>
    </nav>
@endif
