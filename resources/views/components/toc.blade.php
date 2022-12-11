@if ($toc->isNotEmpty())
    <div {{ $attributes->except('toc') }}>
        <div class="font-semibold mb-2">
            Table of contents
        </div>

        <nav class="mt-3">
            <ul class="grid gap-2">
                @foreach ($toc as $item)
                    <li>
                        <a
                            href="#{{ $item['id'] }}"
                            class="inline-flex items-start gap-1 leading-tight text-indigo-900/75 dark:text-indigo-400"
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
    </div>
@endif
