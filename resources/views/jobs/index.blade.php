<x-app
    title="Find your dream job as a web developer"
    description="I gather tons of job offers from various sources and list them in one digestible list."
>
    <x-section class="container mt-16 md:max-w-screen-sm">
        <x-slot:title class="!text-4xl/none mt-8 lg:!text-5xl/none font-bold text-center">
            <x-icon-employees class="h-24 mx-auto" />
            <div class="mt-4">Find your <span class="text-transparent bg-gradient-to-r from-purple-400 to-purple-300 bg-clip-text">dream job</span> as a Laravel&nbsp;developer… soon.</div>
        </x-slot:title>

        {{-- <p class="mt-6 text-center text-xl/tight md:text-2xl/tight lg:text-3xl/tight">
            Get my <strong class="font-medium text-indigo-400">free</strong> application checklist for 2023 built on top of 10+ years of experience.
        </p>

        <form class="mt-8">
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" name="email" placeholder="name@example.com" class="w-full px-4 py-3 text-xl placeholder-gray-300 border-gray-200 rounded-md" />

            <button class="table px-6 py-3 mx-auto mt-2 text-xl font-bold text-white bg-indigo-400 rounded">
                Get the checklist
            </button>
        </form> --}}
    </x-section>

    {{-- <x-section class="container mt-24">
        <x-slot:title class="font-bold text-center text-2xl/tight md:text-3xl/tight">
            Browse the latest job offers
        </x-slot:title>

        @if ($openings->isNotEmpty())
            <ul class="grid gap-16 mt-8 md:grid-cols-2">
                @foreach ($openings as $opening)
                    <li class="flex items-start justify-between gap-6">
                        <div class="flex flex-col">
                            <p class="font-bold">
                                <a href="#" class="text-indigo-600 underline">
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
                    </li>
                @endforeach
            </ul>

            {{ $openings->links() }}
        @else
            <p class="mt-8 text-xl text-center text-gray-400">
                There are no job offers yet. <a wire:navigate.hover href="{{ route('jobs.create') }}" class="text-indigo-600 underline">Post yours.</a>
            </p>
        @endif
    </x-section> --}}
</x-app>
