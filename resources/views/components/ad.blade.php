@if ($ads->isNotEmpty() && $affiliate = $ads->random())
    <div {{ $attributes->merge(['class' => 'container md:max-w-screen-sm']) }}>
        <div class="border border-gray-200 dark:border-gray-800 flex flex-wrap sm:flex-nowrap items-center justify-center sm:justify-start sm:gap-4 p-4 rounded-md text-center sm:text-left text-sm">
            <a
                href="{{ route('affiliate', $affiliate) }}"
                rel="nofollow noopener noreferral"
                class="flex-shrink-0"
                @click="window.fathom?.trackGoal('ODF3S05G', 0)"
            >
                <img
                    src="{{ $affiliate->icon }}"
                    alt="{{ $affiliate->name }}"
                    class="aspect-square rounded w-[48px] h-[48px]"
                />
            </a>

            <div class="leading-tight mt-4 sm:mt-0 w-full">
                <div class="font-bold">{{ $affiliate->ad_title }}</div>
                <div class="mt-1">{!! $affiliate->rendered_ad_content !!}</div>
            </div>

            <a
                href="{{ route('affiliate', $affiliate) }}"
                class="bg-gradient-to-r from-emerald-400 dark:from-emerald-700 to-emerald-500 dark:to-emerald-800 hover:hue-rotate-90 inline-block !border-0 flex-shrink-0 font-semibold leading-tight mt-4 sm:mt-0 sm:mx-auto px-4 py-2 rounded shadow-md sm:table text-center !text-emerald-50 duration-500 transition-[filter]"
                rel="nofollow noopener noreferral"
                @click="window.fathom?.trackGoal('ODF3S05G', 0)"
            >
                Go to site
            </a>
        </div>
    </div>
@endif
