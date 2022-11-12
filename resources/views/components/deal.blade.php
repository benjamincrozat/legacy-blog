@if (! empty($deal))
    <div {{ $attributes->merge([
        'class' => $deal->end_at ? 'border border-orange-300 dark:border-orange-900 flex flex-col gap-2 p-4 rounded' : 'border dark:border-gray-800 flex flex-col gap-2 p-4 rounded'
    ]) }}>
        <div class="flex flex-grow items-center justify-between gap-8">
            <div>
                <p>
                    <span class="border-b border-gray-200/50 font-bold @if ($deal->end_at) border-orange-400/30 text-orange-400 @else @endif">{{ $deal->affiliate->name }}</span>

                    @if ($deal->end_at)
                        <span class="bg-gradient-to-r from-orange-300 dark:from-orange-400 to-orange-400 dark:to-orange-500 inline-block ml-2 px-3 py-1 rounded-full text-white text-xs"><span class="font-bold">@choice(':count day|:count days', $deal->end_at->diffInDays())</span> left</span>
                    @endif
                </p>

                <div class="mt-2 text-sm">
                    {!! Illuminate\Support\Str::lightdown($deal->content) !!}
                </div>
            </div>

            @if ($deal->image)
                <img src="{{ str_replace('w_auto', 'h_96', $deal->image) }}" width="48" height="48" alt="{{ $deal->affiliate->name }}" class="flex-shrink-0 rounded-lg" />
            @endif
        </div>

        <a
            href="{{ route('affiliate', $deal->affiliate) }}"
            class="bg-gradient-to-r @if ($deal->end_at) from-orange-300 dark:from-orange-400 to-orange-400 dark:to-orange-500 @else from-emerald-400 dark:from-emerald-700 to-emerald-500 dark:to-emerald-800 @endif block leading-tight mt-2 px-4 py-3 rounded-sm shadow-md text-center text-sm text-white"
            @click="window.fathom?.trackGoal('K8DBWLRF', 0)"
        >
            {!! Illuminate\Support\Str::lightdown($deal->button) !!}
        </a>
    </div>
@endif
