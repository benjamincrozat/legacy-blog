<section id="newsletter" {{ $attributes->merge(['class' => 'scroll-mt-8']) }}>
    @if (empty($headline))
        <div class="container sm:max-w-screen-xs md:max-w-screen-sm text-center">
            <x-icon-technologies />
        </div>

        <p class="font-medium !leading-tight sm:max-w-screen-xs mt-8 mx-auto text-xl text-center">
            <span class="bg-clip-text bg-gradient-to-r from-gray-600 dark:from-white to-gray-900 dark:to-white"><span class="text-transparent">I share everything I learn about the&nbsp;art&nbsp;of&nbsp;crafting&nbsp;websites,</span></span> <span class="bg-clip-text bg-gradient-to-r from-indigo-300 to-indigo-400"><span class="text-transparent">for&nbsp;free</span></span>!
        </p>
    @else
        <p class="font-medium !leading-tight sm:max-w-screen-xs mt-8 mx-auto text-xl text-center">
            {{ $headline }}
        </p>
    @endif

    <x-form method="POST" action="{{ route('subscribe') }}" class="max-w-screen-xs mx-auto mt-4">
        <input type="email" name="email" id="email" placeholder="homer@simpson.com" required class="dark:bg-gray-700/40 block border-0 placeholder-gray-300 dark:placeholder-gray-600 px-4 py-3 rounded-md shadow w-full" />

        <button class="bg-gradient-to-r from-purple-300 dark:from-purple-500 to-purple-400 dark:to-purple-600 hover:-hue-rotate-90 duration-500 transition-[filter] block font-semibold mt-2 px-4 py-3 rounded-md shadow-lg text-white w-full">
            Join hundreds of developers
        </button>
    </x-form>

    <p class="mt-4 text-center text-xs">
        <a href="{{ route('affiliate', 'convertkit') }}" target="_blank" rel="nofollow noopener noreferrer">
            Powered by <x-icon-convertkit class="-translate-y-px h-4 inline" />
        </a>
    </p>

    {{ $slot }}
</section>
