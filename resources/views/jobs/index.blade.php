<x-app
    title="Find your dream job as a web developer"
    description="I gather tons of job offers from various sources and list them in one digestible list."
>
    <h1 class="container mt-16 font-bold text-center md:max-w-screen-sm text-4xl/none lg:text-5xl/none">
        <x-icon-employees class="h-24 mx-auto" />
        <div class="mt-4">Find your <span class="text-transparent bg-gradient-to-r from-purple-400 to-purple-300 bg-clip-text">dream job</span> as a Laravel&nbsp;developer</div>
    </h1>

    <x-section class="container mt-24">
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
            <div class="mt-8 text-xl text-center text-gray-400">
                <p>
                    There are no job offers yet.
                </p>

                <p class="mt-8">
                    Are you a business owner? <a wire:navigate.hover href="{{ route('jobs.create') }}" class="text-indigo-600 underline">Post yours</a> and be featured on every page of the blog.
                </p>
            </div>
        @endif
    </x-section>
</x-app>
