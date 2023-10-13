<div class="flex items-start justify-between gap-6">
    <div class="flex flex-col">
        <p class="font-bold">
            <a href="{{ $opening->link ?? '#' }}" @if ($opening->link) target="_blank" rel="noopener" @endif class="text-indigo-600 underline">
                @if ($opening->link)
                    <x-heroicon-o-arrow-top-right-on-square
                        class="inline w-4 h-4 mr-[.425rem] translate-y-[-2px]"
                    />
                @endif

                {{ $opening->title }}
            </a>
        </p>

        <p class="flex-grow">
            {{ $opening->company }} <span class="mx-1 text-xs">•</span>
            {{ money($opening->minimum_salary) }}-{{ money($opening->maximum_salary) }} <span class="mx-1 text-xs">•</span>
            {{ $opening->location }}
        </p>

        <p class="mt-2">
            <a href="#" class="underline">{{ $opening->created_at->diffForHumans() }}</a>
        </p>
    </div>

    <img
        src="{{ fake()->imageUrl() }}"
        width="64"
        height="64"
        alt="{{ $opening->company }}'s logo"
        class="flex-shrink-0 mt-1 aspect-square"
    />
</div>
