<x-app
    title=""
    description=""
>
    <x-section class="container mt-16 xl:max-w-screen-lg">
        <x-slot:title class="text-center">
            The latest job offers
        </x-slot:title>

        @if ($openings->isNotEmpty())
            <ul class="grid mt-8 gap-x-16 gap-y-8 md:grid-cols-2">
                @foreach ($openings as $opening)
                    <li>
                        <a href="{{ $opening->link }}" class="flex items-center gap-6">
                            <img
                                src="{{ fake()->imageUrl() }}"
                                width="64"
                                height="64"
                                alt="{{ $opening->company }}'s logo"
                                class="flex-shrink-0 aspect-square"
                            />

                            <div>
                                <p class="font-bold text-indigo-600 underline">{{ ucfirst($opening->description) }}</p>
                                <p>{{ $opening->company }} <span class="mx-1 text-xs">•</span> {{ $opening->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="mt-8 text-xl text-center">
                There are no job offers yet. <a wire:navigate.hover href="{{ route('jobs.create') }}" class="text-indigo-600 underline">Post yours.</a>
            </p>
        @endif
    </x-section>
</x-app>
