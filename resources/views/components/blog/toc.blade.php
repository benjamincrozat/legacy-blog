@if (! empty($toc))
    <nav {{ $attributes->except('toc')->merge(['class' => 'border rounded text-sm']) }}>
        <h4 class="font-normal py-2 text-center">
            Table of contents
        </h4>

        <ul class="border-t grid gap-3 p-4">
            @foreach ($toc as $item)
                <li>
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
    </nav>
@endif
