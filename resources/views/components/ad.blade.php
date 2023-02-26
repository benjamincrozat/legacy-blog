@if (! empty($affiliate = $ads->shuffle()->first()))
    <div {{ $attributes->merge(['class' => 'md:max-w-screen-sm md:mx-auto not-prose']) }}>
        <aside class="border border-gray-200 dark:border-gray-800 flex sm:items-center justify-between sm:justify-start gap-4 p-4 rounded-md text-sm">
            <a
                href="{{ route('affiliate', $affiliate) }}"
                target="_blank"
                rel="nofollow noopener noreferral"
                class="flex-shrink-0 order-2 sm:order-none"
                @click="window.fathom?.trackGoal('ODF3S05G', 0)"
            >
                <img
                    src="{{ $affiliate->icon }}"
                    alt="{{ $affiliate->name }}"
                    class="aspect-square rounded w-[64px] h-[64px] sm:w-[48px] sm:h-[48px]"
                />
            </a>

            <div class="sm:flex sm:items-center sm:justify-between sm:gap-4 order-1 sm:order-none">
                <div class="leading-tight w-full">
                    <div class="font-bold">{{ $affiliate->ad_title }}</div>
                    <div class="mt-1">{!! $affiliate->rendered_ad_content !!}</div>
                </div>

                <a
                    href="{{ route('affiliate', $affiliate) }}"
                    class="bg-gradient-to-r from-emerald-400 dark:from-emerald-700 to-emerald-500 dark:to-emerald-800 hover:hue-rotate-90 inline-block !border-0 flex-shrink-0 font-semibold leading-tight mt-4 sm:mt-0 px-3 py-2 rounded shadow-md !text-emerald-50 duration-500 transition-[filter]"
                    target="_blank"
                    rel="nofollow noopener noreferral"
                    @click="window.fathom?.trackGoal('ODF3S05G', 0)"
                >
                    Go to site
                </a>
            </div>
        </aside>
    </div>
@endif
