<aside {{ $attributes->merge([
    'id' => 'newsletter',
    'class' => 'text-center',
]) }}>
    <p class="font-thin">
        Let me share with you my discoveries about the art of crafting&nbsp;websites,&nbsp;<span class="border-b border-indigo-400/50 font-semibold text-indigo-400">for&nbsp;free</span>.
    </p>

    <x-form method="POST" action="{{ route('subscribe') }}" class="flex gap-2 mt-4 relative">
        <input type="email" name="email" id="email" placeholder="homer@simpson.com" required class="dark:bg-gray-800 bg-gradient-to-r from-white dark:from-gray-700/50 to-gray-50/50 dark:to-gray-800 border-0 placeholder-gray-300 dark:placeholder-gray-600 pl-6 pr-32 py-3 rounded-full shadow dark:shadow-none shadow-gray-200/50 w-full" x-ref="newsletter" />

        <button type="submit" class="absolute top-1/2 -translate-y-1/2 right-0 bg-gradient-to-r from-indigo-400 dark:from-indigo-600 to-indigo-300 dark:to-indigo-500 flex-shrink-0 font-normal h-full px-6 rounded-full shadow-lg text-sm text-white transition-colors">
            Sign me up
        </button>
    </x-form>
</aside>
