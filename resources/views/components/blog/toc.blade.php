@if (! empty($toc))
    <nav {{ $attributes->except('toc')->merge(['class' => 'text-sm']) }} x-data="{ expanded: false }">
        <h4 class="font-normal">
            Table of contents
        </h4>

        <ul class="grid gap-3 mt-4">
            @foreach ($toc as $item)
                <li
                    @if ($item['level'] > 1) style="margin-left: calc(1rem * {{ $item['level'] - 2 }})" @endif
                    @if ($item['level'] > 2) :class="{ 'hidden': ! expanded }" @endif
                >
                    <a
                        href="#{{ $item['id'] }}"
                        class="flex items-start gap-1 leading-tight text-indigo-900/75"
                        @click="window.fathom?.trackGoal('2WUWXET3', 0)"
                    >
                        <x-heroicon-o-hashtag class="flex-shrink-0 w-3 h-3 text-indigo-900/40 translate-y-[2px]" />
                        {{ $item['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        @if ($toc->where('level', '>', 2)->isNotEmpty())
            <button
                class="flex items-center gap-2 font-normal mt-4"
                @click="expanded = ! expanded; window.fathom?.trackGoal('6ID3DWJV', 0)"
            >
                <span x-text="expanded ? 'Hide' : 'There\'s more'"></span>
                <x-heroicon-o-chevron-down class="w-3 h-3 transition" x-show="! expanded" />
                <x-heroicon-o-chevron-up class="w-3 h-3 transition" x-show="expanded" />
            </button>
        @endif
    </nav>
@endif
