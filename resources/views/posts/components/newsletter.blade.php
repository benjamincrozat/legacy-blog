<div {{ $attributes->merge(['class' => 'text-center text-sm']) }}>
    <x-icon-logos class="mx-auto w-4/5 md:w-auto" />

    <p class="mt-4">
        <strong class="font-semibold">@choice(':count person|:count persons', $subscribersCount) subscribed to my newsletter</strong>.<br /> Join them and enjoy free content about the art of crafting&nbsp;websites!
    </p>

    <x-form method="POST" action="{{ route('subscribe') }}" class="grid gap-2 mt-4 sm:mt-6" @submit="hide = true">
        <input type="email" name="email" id="email" placeholder="homer@simpson.com" required class="dark:bg-gray-700/40 block border-0 placeholder-gray-300 dark:placeholder-gray-600 px-3 py-2 rounded shadow text-sm w-full" />

        <button class="bg-gradient-to-r from-purple-300 dark:from-purple-500 to-purple-400 dark:to-purple-600 hover:-hue-rotate-90 duration-500 transition-all block font-semibold py-2 rounded shadow text-white">
            Subscribe
        </button>
    </x-form>

    <p class="mt-4 text-center text-xs">
        <a href="{{ route('affiliate', 'convertkit') }}" target="_blank" rel="nofollow noopener noreferrer">
            Powered by <x-icon-convertkit class="-translate-y-px h-4 inline" />
        </a>
    </p>

    <x-posts::divider class="mt-10" />
</div>
