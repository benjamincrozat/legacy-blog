<div {{ $attributes->merge(['class' => 'border dark:border-gray-800 flex flex-col gap-2 p-4 rounded']) }}>
    <div class="flex flex-grow items-center justify-between gap-8">
        <div>
            @if (! empty($title))
                <p {{ $title->attributes->merge(['class' => 'font-bold mb-2']) }}>{{ $title }}</p>
            @endif

            <div>
                {{ $slot }}
            </div>
        </div>

        @if (! empty($image))
            <img src="{{ str_replace('w_auto', 'h_110', $image) }}" width="55" height="55" alt="{{ $deal->affiliate->name }}" class="flex-shrink-0 rounded-lg h-12 sm:h-auto" />
        @endif
    </div>

    @if (! empty($cta))
        <a
            href="{{ $link ?? '#' }}"
            {{ $cta->attributes->merge(['class' => 'bg-gradient-to-r from-emerald-400 dark:from-emerald-700 to-emerald-500 dark:to-emerald-800 block leading-tight mt-2 px-4 py-3 rounded-sm shadow-md text-center text-sm text-white']) }}
        >
            {{ $cta }}
        </a>
    @endif
</div>
