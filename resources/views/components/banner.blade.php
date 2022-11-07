@if (! empty($banner))
    <div {{ $attributes->merge(['class' => 'border dark:border-gray-800 rounded']) }}>
        <div class="border-b dark:border-gray-800 flex items-center justify-center gap-2 font-normal leading-tight p-2 text-emerald-500">
            <x-heroicon-o-information-circle class="-translate-y-[.5px] flex-shrink-0 w-4 h-5 h-4" />
            {{ $banner->title }}
        </div>

        <div class="grid place-items-center gap-4 p-4">
            <div class="grid place-items-center gap-4 md:max-w-screen-sm md:mx-auto">
                @if ($banner->image)
                    <img src="{{ str_replace('w_auto', 'h_110', $banner->image) }}" width="55" height="55" alt="{{ $banner->affiliate->name }}" class="rounded-lg" />
                @endif

                <div>
                    {!! Illuminate\Support\Str::lightdown($banner->content) !!}
                </div>
            </div>

            <div>
                <a
                    href="{{ route('affiliate', $banner->affiliate) }}"
                    class="bg-gradient-to-r from-emerald-400 dark:from-emerald-700 to-emerald-500 dark:to-emerald-800 block leading-tight sm:max-w-screen-xs mx-auto px-4 py-3 rounded shadow-md text-center text-white"
                    @click="window.fathom?.trackGoal('K8DBWLRF', 0)"
                >
                    {!! Illuminate\Support\Str::lightdown($banner->button) !!}
                </a>
            </div>
        </div>
    </div>
@endif
