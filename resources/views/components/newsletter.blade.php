<aside {{ $attributes->merge([
    'id' => 'newsletter',
    'class' => 'text-center',
]) }}>
    <p class="font-thin">
        Let me share with you my web development discoveries, <span class="border-b border-indigo-200 font-semibold text-indigo-400">for&nbsp;free</span>.
    </p>

    <x-form method="POST" action="{{ route('subscribe') }}" class="flex gap-2 mt-4 relative">
        <input type="email" name="email" id="email" placeholder="homersimpson@example.com" required class="bg-gradient-to-r from-white to-gray-50/50 border-0 placeholder-gray-300 pl-6 pr-32 py-3 rounded-full shadow shadow-gray-200/50 w-full" x-ref="newsletter" />

        <button type="submit" class="absolute top-1/2 -translate-y-1/2 right-0 bg-gradient-to-r from-indigo-400 to-indigo-300 flex-shrink-0 font-normal h-full px-6 rounded-full shadow-lg text-sm text-white transition-colors">
            Sign me up
        </button>
    </x-form>
</aside>
