<aside id="newsletter" {{ $attributes->merge(['class' => 'scroll-mt-8']) }}>
    @if (empty($headline))
        <div class="container text-center sm:max-w-screen-xs md:max-w-screen-sm">
            <x-icon-technologies />
        </div>

        <p class="font-medium !leading-tight sm:max-w-screen-xs mt-8 mx-auto text-xl text-center">
            <span class="bg-clip-text bg-gradient-to-r from-gray-600 dark:from-white to-gray-900 dark:to-white"><span class="text-transparent">I share everything I learn about the&nbsp;art&nbsp;of&nbsp;crafting&nbsp;web&nbsp;applications,</span></span> <span class="bg-clip-text bg-gradient-to-r from-indigo-300 to-indigo-400"><span class="text-transparent">for&nbsp;free</span></span>!
        </p>
    @else
        <p class="font-medium !leading-tight sm:max-w-screen-xs mt-8 mx-auto text-xl text-center">
            {{ $headline }}
        </p>
    @endif

    <x-form method="POST" action="{{ route('subscribe') }}" class="mx-auto mt-4 max-w-screen-xs">
        <input type="email" name="email" id="email" placeholder="homersimpson@example.com" required class="block w-full px-4 py-3 placeholder-gray-300 border-0 rounded-md shadow dark:bg-gray-700/40 dark:placeholder-gray-600" />

        <button class="bg-gradient-to-r from-purple-300 dark:from-purple-500 to-purple-400 dark:to-purple-600 hover:-hue-rotate-90 duration-500 transition-[filter] block font-semibold mt-2 px-4 py-3 rounded-md shadow-lg text-white w-full">
            Join hundreds of developers
        </button>
    </x-form>

    <p class="mt-4 text-xs text-center">
        <a href="{{ route('affiliate.show', 'convertkit') }}" target="_blank" rel="nofollow noopener noreferrer">
            Powered by <x-icon-convertkit class="inline h-4 -translate-y-px" />
        </a>
    </p>

    {{ $slot }}
</aside>
