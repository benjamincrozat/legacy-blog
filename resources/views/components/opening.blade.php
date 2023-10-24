<div class="flex items-start gap-6">
    <a wire:navigate.hover href="{{ route('openings.show', $opening) }}" class="flex-shrink-0">
        <img
            src="{{ fake()->imageUrl() }}"
            width="64"
            height="64"
            alt="{{ $opening->company }}'s logo"
            class="mt-1 aspect-square w-[48px] md:w-[64px] h-[48px] md:h-[64px]"
        />
    </a>

    <div class="flex flex-col">
        <p class="font-bold">
            <a wire:navigate.hover href="{{ route('openings.show', $opening) }}" class="text-indigo-600 underline">
                {{ $opening->title }}
            </a>
        </p>

        <p class="flex-grow mt-2">
            <strong class="font-bold">Company:</strong> {{ $opening->company }}
        </p>

        <p class="mt-2">
            <strong class="font-bold">Salary:</strong> {{ money($opening->minimum_salary) }}-{{ money($opening->maximum_salary) }}
        </p>

        <p class="mt-2">
            <strong class="font-bold">Location:</strong> {{ $opening->location }}
        </p>

        <p class="mt-2">
            Published {{ $opening->created_at->diffForHumans() }}
        </p>
    </div>
</div>
