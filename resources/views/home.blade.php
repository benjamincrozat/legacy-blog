<x-app
    title="Learn about Laravel and its ecosystem."
>
    <x-section class="container mt-24 text-center">
        <x-slot:title class="font-bold text-center text-3xl/tight md:text-4xl/tight lg:text-5xl/tight">
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
            Join more than <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">20,000</span> readers and skyrocket your web development skills.
        </p>
    </x-section>

    @if ($categories->isNotEmpty())
        <x-section class="container mt-32">
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

            <div class="mt-16 text-center">
                <a wire:navigate href="{{ route('posts.index') }}" class="text-xl font-bold underline">
                    There's even more to read about!
                </a>
            </div>
        </x-section>
    @endif

    @foreach ($categories as $category)
        <x-section class="mt-32">
            <x-slot:title class="container lg:max-w-screen-md">
                <div class="flex items-center gap-4">
                    <a wire:navigate href="{{ route('categories.show', $category) }}" class="flex-shrink-0">
                        <x-category-icon :category="$category" />
                    </a>

                    <span>
                        Learn about <span class="text-{{ $category->presenter()->primaryColor() }}">{{ $category->name }}</span>
                    </span>
                </div>
            </x-slot:title>

            <x-prose class="container mt-4 lg:max-w-screen-md">
                {!! $category->presenter()->longDescription() !!}
            </x-prose>

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
            <img src="https://www.gravatar.com/avatar/{{ md5('hello@benjamincrozat.com') }}?s=256" width="128" height="128" alt="Benjamin Crozat" class="float-right mb-8 ml-8 rounded-full" />

            <p>Hi! I'm Benjamin Crozat. I'm from the South of France and <strong>I've been a self-taught professional web developer for more than 10 years</strong>.</p>

            <p>Coming from a modest family, <strong>being able to educate myself for free on the web changed my life for the better</strong>. <strong>Giving back to the community was a natural direction in my career.</strong> Therefore, I launched this blog in September 2022 with the goal to be in everyone's Google search.</p>

            <p>Follow me on <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer">GitHub</a> and <a href="https://x.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer">X</a>.</p>
        </x-prose>
    </x-section>
</x-app>
