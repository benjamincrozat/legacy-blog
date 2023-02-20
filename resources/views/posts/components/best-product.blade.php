<div {{ $attributes->except('bestProduct')->merge(['class' => 'border first:border-orange-200 dark:border-gray-800 dark:first:border-orange-900 flex flex-col group gap-2 p-4 rounded text-sm']) }}>
    <h2 class="text-center">
        <span class="bg-gradient-to-r from-emerald-400 dark:from-emerald-600 group-first:from-orange-300 to-emerald-500 dark:to-emerald-700 dark:group-first:from-orange-400 group-first:to-orange-400 dark:group-first:to-orange-500 font-semibold px-3 py-1 rounded-full text-center text-white text-xs">
            {{ $bestProduct->title }}
        </span>
    </h2>

    <div class="flex-grow mt-3">
        <div class="text-center">
            @if ($bestProduct->affiliate->image)
                <img loading="lazy" src="{{ $bestProduct->affiliate->image }}" alt="{{ $bestProduct->affiliate->name }}" width="48" height="48" class="inline rounded-lg" />
            @endif

            <div class="font-semibold mt-4">
                {{ $bestProduct->affiliate->name }}
            </div>
        </div>

        <div class="mt-3 text-center sm:text-left">
            {!! str($bestProduct->description)->marxdown() !!}
        </div>
    </div>

    <a
        href="{{ route('affiliate', $bestProduct->affiliate->slug) }}"
        target="_blank"
        class="bg-gradient-to-r from-emerald-400 dark:from-emerald-700 group-first:from-orange-300 dark:group-first:from-orange-400 to-emerald-500 dark:to-emerald-800 group-first:to-orange-400 dark:group-first:to-orange-500 block font-semibold leading-tight mt-2 px-4 py-3 rounded-sm shadow-md text-center text-sm text-white"
        @click="window.fathom?.trackGoal('XMLHWVO2', 0)"
    >
        Go to site
    </a>

    <div class="mt-3 text-center">
        <a
            href="#{{ $bestProduct->affiliate->slug }}"
            class="flex items-center justify-center gap-2 font-semibold underline"
            @click="window.fathom?.trackGoal('JT627MAN', 0)"
        >
            Read review
            <x-heroicon-o-arrow-down class="w-4 h-4" />
        </a>
    </div>
</div>
