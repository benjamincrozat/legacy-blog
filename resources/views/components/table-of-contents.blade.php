@if (! empty($toc = $post->getTableOfContents()) && count($toc) > 1)
    <ul class="grid gap-3 mt-4">
        @foreach ($toc as $item)
            <li
                @if ($item['level'] > 1) style="margin-left: calc(1rem * {{ $item['level'] - 2 }})" @endif
            >
                <a
                    href="#{{ $item['id'] }}"
                    class="flex items-start gap-2 leading-tight text-indigo-900/75 hover:text-indigo-900/40 transition-colors"
                >
                    <x-heroicon-o-hashtag
                        class="flex-shrink-0 w-3 h-3 text-indigo-900/40 translate-y-[2px]"
                    />

                    {{ $item['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
