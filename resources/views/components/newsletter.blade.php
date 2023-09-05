<x-section {{ $attributes->merge([
    'id' => 'newsletter',
    'class' => 'scroll-mt-8',
]) }}>
    <x-slot:title class="text-3xl sm:!text-4xl md:!text-5xl text-center">
        <x-icon-envelope class="h-32 mx-auto" />

        <div class="mt-8">
            I share what I learn, <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">for free</span>!
        </div>
    </x-slot:title>

    <p class="container mt-6 text-center lg:max-w-screen-md sm:text-xl">
        <span class="font-medium">Join 400+ developers.</span> <span class="font-medium text-indigo-400 bg-indigo-200/30">Get exclusive, interesting and insightful information</span> in your inbox about my experiences building with Laravel and its ecosystem.
    </p>

    <div class="container mt-8 md:max-w-screen-sm">
        <form method="POST" action="{{ route('subscribe') }}" class="flex items-stretch justify-center gap-2">
            @csrf

            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="johndoe@example.com" required class="flex-grow block px-4 py-3 placeholder-gray-300 border-0 rounded shadow shadow-black/5" />

            <x-button class="px-6 text-white bg-indigo-400 shadow-lg sm:px-8 shadow-blue-700/20">
                Subscribe
            </x-button>
        </form>

        @error('email')
            <p class="text-center text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{ $slot }}
</x-section>
