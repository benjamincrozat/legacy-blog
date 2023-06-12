<div {{ $attributes->except('highlight')->merge(['class' => 'border first:border-orange-200 dark:border-gray-800 dark:first:border-orange-900 flex flex-col group p-4 rounded text-sm']) }}>
    <div class="text-center">
        <span class="px-3 py-1 text-xs font-semibold text-center text-white rounded-full bg-gradient-to-r from-emerald-400 dark:from-emerald-600 group-first:from-orange-300 to-emerald-500 dark:to-emerald-700 dark:group-first:from-orange-400 group-first:to-orange-400 dark:group-first:to-orange-500">
            {{ $highlight->pivot->highlight_title ?? $highlight->highlight_title }}
        </span>

        <figure class="mt-4">
            <img
                src="{{ $highlight->icon }}"
                alt="{{ $highlight->name }}"
                width="48"
                height="48"
                class="inline rounded-lg aspect-square"
            />

            <figcaption class="mt-4 font-semibold">
                {{ $highlight->name }}
            </figcaption>
        </figure>
    </div>

    <div class="content flex-grow mt-3 !text-sm">
        {!! $highlight->rendered_highlight_text !!}
    </div>

    <a
        href="{{ route('affiliate', $highlight->slug) }}"
        target="_blank"
        class="bg-gradient-to-r from-emerald-400 dark:from-emerald-700 group-first:from-orange-300 dark:group-first:from-orange-400 to-emerald-500 dark:to-emerald-800 hover:hue-rotate-90 group-first:hover:-hue-rotate-90 group-first:to-orange-400 dark:group-first:to-orange-500 block font-semibold leading-tight mt-4 px-4 py-3 rounded-sm shadow-md text-center text-sm text-white duration-500 transition-[filter]"
        @click="window.fathom?.trackGoal('XMLHWVO2', 0)"
    >
        Go to site
    </a>

    <div class="mt-3 text-center">
        <a
            href="#{{ $highlight->slug }}"
            class="flex items-center justify-center gap-2 font-semibold underline"
            @click="window.fathom?.trackGoal('JT627MAN', 0)"
        >
            Read review
            <x-heroicon-o-arrow-down class="w-4 h-4" />
        </a>
    </div>
</div>
