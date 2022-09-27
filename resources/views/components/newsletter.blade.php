<aside {{ $attributes->merge([
    'id' => 'newsletter',
    'class' => 'container max-w-screen-sm text-center',
]) }}>
    <h4 class="font-semibold text-lg sm:text-xl">
        Let me share with you what I learn, <span class="border-b border-blue-200 font-semibold text-blue-400">for&nbsp;free</span>
    </h4>

    <x-form method="POST" action="{{ route('subscribe') }}" class="flex gap-2 mt-8 relative">
        <input type="email" name="email" id="email" placeholder="homer@simpson.com" required class="border-0 placeholder-gray-300 pl-6 pr-32 py-3 rounded-full w-full" x-ref="newsletter" />

        <button type="submit" class="absolute top-1/2 -translate-y-1/2 right-0 bg-blue-400 hover:bg-blue-300 flex-shrink-0 font-normal h-full px-6 rounded-full text-sm text-white transition-colors">
            Sign me up
        </button>
    </x-form>
</aside>
