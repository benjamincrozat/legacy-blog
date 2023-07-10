@if (($count = count($tree)) && $count > 1)
    <div {{ $attributes->except('tree') }}>
        <p class="mb-2 font-semibold">
            Table of contents
        </p>

        <ul class="grid gap-2 mt-3">
            @foreach ($tree as $item)
                <li>
                    <a
                        href="#{{ $item['id'] }}"
                        class="inline-flex items-center gap-1 leading-tight text-indigo-900/75 dark:text-indigo-400"
                        @if ($item['level'] > 2) style="margin-left: calc(1rem * {{ $item['level'] - 2 }})" @endif
                    >
                        <x-heroicon-o-hashtag class="flex-shrink-0 w-3 h-3 text-indigo-900/40 dark:text-indigo-400/50" />
                        {{ $item['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
