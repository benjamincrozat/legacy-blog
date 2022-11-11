@if (! empty($deal))
    <div {{ $attributes->merge(['class' => 'border dark:border-gray-800 flex flex-col gap-2 p-4 rounded']) }}>
        <div class="flex flex-grow items-center justify-between gap-8">
            <div>
                <p class="font-bold">{{ $deal->affiliate->name }}</p>

                <div class="mt-2 text-sm">
                    {!! Illuminate\Support\Str::lightdown($deal->content) !!}
                </div>
            </div>

            @if ($deal->image)
                <img src="{{ str_replace('w_auto', 'h_110', $deal->image) }}" width="55" height="55" alt="{{ $deal->affiliate->name }}" class="rounded-lg h-12 sm:h-auto" />
            @endif
        </div>

        <a
            href="{{ route('affiliate', $deal->affiliate) }}"
            class="bg-gradient-to-r from-emerald-400 dark:from-emerald-700 to-emerald-500 dark:to-emerald-800 block leading-tight mt-2 px-4 py-3 rounded-sm shadow-md text-center text-sm text-white"
        >
            {!! Illuminate\Support\Str::lightdown($deal->button) !!}
        </a>
    </div>
@endif
