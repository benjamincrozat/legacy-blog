@if (! $promotesAffiliateLinks)
    <aside {{ $attributes->merge(['class' => 'text-center text-sm']) }}>
        <x-icon-technologies class="w-4/5 mx-auto md:w-auto" />

        <p class="mt-4">
            <strong class="font-semibold">Hundreds of developers subscribed to my newsletter</strong>.<br /> Join them and enjoy free content about the art of crafting web applications!
        </p>

        <x-form method="POST" action="{{ route('subscribe') }}" class="grid gap-2 mt-4 sm:mt-6" @submit="hide = true">
            <input type="email" name="email" id="email" placeholder="homer@simpson.com" required class="block w-full px-3 py-2 text-sm placeholder-gray-300 border-0 rounded shadow dark:bg-gray-700/40 dark:placeholder-gray-600" />

            <button class="bg-gradient-to-r from-purple-300 dark:from-purple-500 to-purple-400 dark:to-purple-600 hover:-hue-rotate-90 duration-500 transition-[filter] block font-semibold py-2 rounded shadow text-white">
                Subscribe
            </button>
        </x-form>

        <p class="mt-4 text-xs text-center">
            <a href="{{ route('affiliate.show', 'convertkit') }}" target="_blank" rel="nofollow noopener noreferrer">
                Powered by <x-icon-convertkit class="inline h-4 -translate-y-px" />
            </a>
        </p>

        <x-posts::divider class="mt-10" />
    </aside>
@endif
