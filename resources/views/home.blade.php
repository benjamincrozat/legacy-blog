<x-app
    title="Learn about Laravel and its ecosystem."
>
    <x-section class="container mt-24 text-center">
        <x-slot:title class="font-bold text-center text-3xl/none md:text-4xl/none lg:text-5xl/none">
            <div class="flex items-center justify-center gap-4 mt-8 md:gap-8">
                <x-icon-laravel class="h-10 md:h-[3.25rem]" />
                <x-icon-livewire class="h-10 mx-2 md:h-12" />
                <x-icon-alpinejs class="h-6 mr-1 md:h-8" />
                <x-icon-tailwind-css class="h-8 mr-1 md:h-12" />
                <x-icon-vuejs class="h-10 md:h-12" />
            </div>

            <div class="mt-8">Learn about Laravel and its&nbsp;ecosystem.</div>
        </x-slot:title>

        <p class="mt-2 text-xl/tight md:text-2xl/tight lg:text-3xl/tight">
            Join more than <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">30,000</span> readers and skyrocket your web&nbsp;development&nbsp;skills.
        </p>

        <div class="flex items-center justify-between gap-4 mt-16">
            <x-icon-dashed-circle class="w-16 h-16 opacity-10" />
            <x-icon-dashed-circle class="w-16 h-16 opacity-10" />
            <x-icon-dashed-circle class="w-16 h-16 opacity-10" />
            <x-icon-dashed-circle class="w-16 h-16 opacity-10" />
            <x-icon-dashed-circle class="w-16 h-16 opacity-10" />
            <x-icon-dashed-circle class="hidden w-16 h-16 sm:inline opacity-10" />
            <x-icon-dashed-circle class="hidden w-16 h-16 sm:inline opacity-10" />
            <x-icon-dashed-circle class="hidden w-16 h-16 md:inline opacity-10" />
            <x-icon-dashed-circle class="hidden w-16 h-16 md:inline opacity-10" />
            <x-icon-dashed-circle class="hidden w-16 h-16 lg:inline opacity-10" />
        </div>

        <div class="flex items-center justify-center gap-4 mt-8 text-3xl text-center font-handwriting">
            <a wire:navigate.hover href="{{ route('sponsors') }}">
                <x-icon-arrow-to-top-left class="inline w-8 h-8 -translate-y-3" /> <span class="underline decoration-1 underline-offset-2">Be the first to showcase your business!</span>
            </a>
        </div>
    </x-section>

    @if ($categories->isNotEmpty())
        <x-section class="container mt-16">
            <x-slot:title class="text-center">
                An endless amount of content for web&nbsp;developers.
            </x-slot:title>

            <ul class="grid gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 md:gap-16">
                @foreach ($categories as $category)
                    <li class="h-full">
                        <x-home.category :category="$category" />
                    </li>
                @endforeach
            </ul>
        </x-section>
    @endif

    @foreach ($categories as $category)
        <x-section class="mt-32">
            <x-slot:title class="container lg:max-w-screen-md">
                <div class="flex items-center gap-4">
                    <a wire:navigate.hover href="{{ route('categories.show', $category) }}" class="flex-shrink-0">
                        <x-category-icon :category="$category" />
                    </a>

                    <span>
                        Learn about <span class="text-{{ $category->presenter()->primaryColor() }}">{{ $category->name }}</span>
                    </span>
                </div>
            </x-slot:title>

            <div class="container mt-4 lg:max-w-screen-md">
                <x-prose>
                    {!! $category->presenter()->longDescription() !!}
                </x-prose>
            </div>

            <ul class="container grid gap-8 mt-16 md:gap-16 md:grid-cols-2">
                @foreach ($category->latestPosts->take(4) as $post)
                    <li>
                        <x-post :post="$post" />
                    </li>
                @endforeach
            </ul>

            <p class="mt-16 text-center">
                <x-button href="{{ route('categories.show', $category) }}" class="bg-{{ $category->presenter()->primaryColor() ?? 'bg-black' }} text-{{ $category->presenter()->secondaryColor() ?? 'white' }}">
                    Read more about {{ $category->name }}
                </x-button>
            </p>
        </x-section>
    @endforeach

    <x-divider class="mt-[4.5rem]" />

    <x-section id="about" class="container lg:max-w-screen-md">
        <x-slot:title class="text-center">
            About Benjamin Crozat
        </x-slot:title>

        <x-prose class="mt-8">
            <x-about />
        </x-prose>
    </x-section>
</x-app>
