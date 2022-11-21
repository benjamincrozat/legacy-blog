<div {{ $attributes->except('best')->merge(['class' => 'border first:border-orange-200 dark:border-gray-800 dark:first:border-orange-900 flex flex-col group gap-2 p-4 rounded text-sm']) }}>
    <div class="text-center">
        <span class="bg-gradient-to-r from-emerald-400 dark:from-emerald-600 group-first:from-orange-300 to-emerald-500 dark:to-emerald-700 dark:group-first:from-orange-400 group-first:to-orange-400 dark:group-first:to-orange-500 font-bold inline-block px-3 py-1 rounded-full text-white text-xs">
            {{ $best->title }}
        </span>
    </div>

    <div class="flex-grow mt-3">
        <div class="text-center">
            @if ($best->affiliate->image)
                <img loading="lazy" src="{{ $best->affiliate->image }}" alt="{{ $best->affiliate->name }}" width="48" height="48" class="inline rounded-lg" />
            @endif

            <div class="font-bold mt-4">
                {{ $best->affiliate->name }}
            </div>
        </div>

        <div class="mt-3 text-center sm:text-left">
            {!! Illuminate\Support\Str::marxdown($best->description) !!}
        </div>
    </div>

    <a
        href="{{ route('affiliate', $best->affiliate->slug) }}"
        target="_blank"
        rel="nofollow noopener noreferrer"
        class="bg-gradient-to-r from-emerald-400 dark:from-emerald-700 group-first:from-orange-300 dark:group-first:from-orange-400 to-emerald-500 dark:to-emerald-800 group-first:to-orange-400 dark:group-first:to-orange-500 block font-bold leading-tight mt-2 px-4 py-3 rounded-sm shadow-md text-center text-sm text-white"
        @click="window.fathom?.trackGoal('XMLHWVO2', 0)"
    >
        Go to site
    </a>

    <div class="mt-3 text-center">
        <a
            href="#{{ $best->affiliate->slug }}"
            class="flex items-center justify-center gap-2 font-bold underline"
            @click="window.fathom?.trackGoal('JT627MAN', 0)"
        >
            Read review
            <x-heroicon-o-arrow-down class="w-4 h-4" />
        </a>
    </div>
</div>
