<x-app
    title="{{ $opening->title }}"
>
    <div class="container mt-8 lg:max-w-screen-md">
        <x-breadcrumb>
            <x-slot:middle :href="route('openings.index')">
                Jobs
            </x-slot:middle>

            {{ $opening->title }}
        </x-breadcrumb>

        <x-section class="mt-8">
            <x-slot:title tag="h1">
                <div class="flex gap-16">
                    <div>{{ $opening->title }}</div>

                    <img
                        src="{{ fake()->imageUrl() }}"
                        width="96"
                        height="96"
                        alt="{{ $opening->company }}'s logo"
                        class="mt-1 flex-shrink-0 aspect-square w-[64px] md:w-[96px] h-[64px] md:h-[96px]"
                    />
                </div>
            </x-slot:title>

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

            <div class="mt-8">
                <x-prose>
                    {!! Str::markdown($opening->description) !!}
                </x-prose>
            </div>
        </x-section>
    </div>

    @if ($recommendations->isNotEmpty())
        <x-divider />

        <x-section class="container">
            <x-slot:title class="text-xl text-center">
                More job offers
            </x-slot:title>

            <ul class="grid gap-8 mt-8 md:grid-cols-2 md:gap-16">
                @foreach ($recommendations as $recommendation)
                    <li>
                        <x-opening :opening="$recommendation" />
                    </li>
                @endforeach
            </ul>
        </x-section>
    @endif
</x-app>
