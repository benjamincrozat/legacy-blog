<x-app
    title="Learn about Laravel and its ecosystem."
>
    <x-section class="container mt-24 text-center">
        <x-slot:title class="text-5xl font-bold text-center">
            <div class="flex items-center justify-center gap-8 mt-8">
                <x-icon-laravel class="h-[3.25rem]" />
                <x-icon-livewire class="h-12 mx-2" />
                <x-icon-alpine-js class="h-8 mr-1" />
                <x-icon-tailwind-css class="h-12 mr-1" />
                <x-icon-vue-js class="h-12" />
            </div>

            <div class="mt-8">Learn about Laravel and its ecosystem.</div>
        </x-slot:title>

        <p class="mt-2 text-3xl">
            Join more than <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">20,000</span> readers and skyrocket your web development skills.
        </p>
    </x-section>

    <x-section class="container mt-32">
        <x-slot:title class="text-center">
            An endless amount of content for web developers.
        </x-slot:title>

        <ul class="grid grid-cols-3 mt-8 gap-x-8 gap-y-16">
            @foreach ($categories as $category)
                <li class="h-full">
                    <x-home.category :category="$category" />
                </li>
            @endforeach
        </ul>
    </x-section>

    @foreach ($categories as $category)
        <x-section class="mt-32">
            <x-slot:title class="container lg:max-w-screen-md">
                Learn <span class="text-{{ $category->primary_color }}">{{ $category->name }}</span>
            </x-slot:title>

            <div class="container mt-2 lg:max-w-screen-md">
                {!! $category->long_description !!}
            </div>

            <ul class="container grid grid-cols-2 gap-8 mt-16">
                @foreach ($category->posts()->limit(4)->get() as $post)
                    <li>
                        <x-post :post="$post" />
                    </li>
                @endforeach
            </ul>

            <p class="mt-16 text-center">
                <x-button href="{{ route('categories.show', $category) }}" class="bg-{{ $category->primary_color ?? 'bg-black' }} text-{{ $category->secondary_color ?? 'white' }}">
                    Read more about {{ $category->name }}
                </x-button>
            </p>
        </x-section>
    @endforeach

    <x-divider class="mt-[4.5rem]" />

    <x-section class="container lg:max-w-screen-md">
        <x-slot:title class="text-center">
            About Benjamin Crozat
        </x-slot:title>

        <x-prose class="mt-8">
            <img src="https://www.gravatar.com/avatar/{{ md5('hello@benjamincrozat.com') }}?s=256" width="128" height="128" alt="Benjamin Crozat" class="float-right mb-8 ml-8 rounded-full" />

            <p>Hi! I'm Benjamin Crozat. I'm coming from the South of France and <strong>I've been a self-taught professional web developer for more than 10 years</strong>.</p>

            <p>Coming from a modest family, <strong>being able to educate myself for free on the web changed my life for the better</strong>. <strong>Transmitting this knowledge to the community was a natural direction in my career.</strong> Therefore, I launched this blog in September 2022 with the goal to be in everyone's Google search.</p>
        </x-prose>
    </x-section>
</x-app>
