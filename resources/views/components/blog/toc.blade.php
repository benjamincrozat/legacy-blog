@if ($toc->isNotEmpty())
    <x-widget {{ $attributes->except('toc') }}>
        <x-slot:title>
            Table of contents
        </x-slot:title>

        <nav>
            <ul>
                @foreach ($toc as $item)
                    <li class="mt-2">
                        <a
                            href="#{{ $item['id'] }}"
                            class="flex items-start gap-1 leading-tight text-indigo-900/75 dark:text-indigo-400"
                            @if ($item['level'] > 2) style="margin-left: calc(1rem * {{ $item['level'] - 2 }})" @endif
                            @click="window.fathom?.trackGoal('2WUWXET3', 0)"
                        >
                            <x-heroicon-o-hashtag class="flex-shrink-0 w-3 h-3 text-indigo-900/40 dark:text-indigo-400/50 translate-y-[2px]" />
                            {{ $item['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </x-widget>
@endif
