<a href="{{ route('media-kit') }}#write" {{ $attributes->except('post') }}>
    <div class="flex items-start gap-6 lg:gap-8">
        <div class="flex-grow">
            <p
                class="font-bold text-orange-400"
                x-data="{ animate: false }"
            >
                <x-heroicon-s-star
                    class="inline h-4 mr-[.175rem] transition-transform duration-[2s] translate-y-[-2px]"
                    x-bind:class="{ 'rotate-[360deg]': animate }"
                    x-intersect="animate = true"
                />

                <span class="underline">{{ $title }}</span>
            </p>

            <p class="mt-2">{{ $description }}</p>

            <div class="h-[1rem] w-1/2 mt-4 mb-2 bg-gray-200/50"></div>
        </div>

        <div class="flex-shrink-0 w-[64px] lg:w-[96px] h-[64px] lg:h-[96px] bg-gray-200/50"></div>
    </div>

    <ul class="flex gap-1 mt-4">
        <li>
            <span
                class="inline-block px-2 py-1 text-xs font-bold leading-normal text-white uppercase rounded bg-gradient-to-r from-orange-400 to-yellow-400"
            >
                Sponsored
            </span>
        </li>

        <li>
            <span
                class="inline-block px-2 py-1 text-xs font-bold leading-normal text-white uppercase rounded bg-gray-200/50"
            >
                <span class="opacity-0">Category</span>
            </span>
        </li>
    </ul>
</a>
