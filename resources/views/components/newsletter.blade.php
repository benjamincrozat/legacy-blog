<section id="newsletter" {{ $attributes }}>
    <h2 class="font-semibold sm:max-w-screen-xs mx-auto text-xl sm:text-2xl md:text-3xl text-center">
        I share everything I learn about the&nbsp;art&nbsp;of&nbsp;crafting&nbsp;websites, <span class="text-indigo-400">for&nbsp;free</span>!
    </h2>

    <x-form method="POST" action="{{ route('subscribe') }}" class="max-w-screen-xs mx-auto mt-8">
        <input type="email" name="email" id="email" placeholder="homer@simpson.com" required class="dark:bg-gray-700/40 block border-0 placeholder-gray-300 dark:placeholder-gray-600 px-4 py-3 rounded-md shadow w-full" />

        <button class="bg-gradient-to-r from-purple-300 dark:from-purple-500 to-purple-400 dark:to-purple-600 block font-bold mt-2 px-4 py-3 rounded-md shadow-lg text-white w-full">
            Subscribe
        </button>
    </x-form>

    {{ $slot }}
</section>
