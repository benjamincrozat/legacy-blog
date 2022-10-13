<aside {{ $attributes->merge([
    'id' => 'newsletter',
    'class' => 'text-center',
]) }}>
    <h3 class="sm:text-lg md:text-xl">
        <span class="font-semibold">Subscribe <span class="border-b border-blue-200 font-semibold text-blue-400">for free</span> to my newsletter.</span><br />
        Receive regular updates about&nbsp;PHP&nbsp;and&nbsp;Laravel
    </h3>

    <x-form method="POST" action="{{ route('subscribe') }}" class="flex gap-2 mt-8 relative">
        <input type="email" name="email" id="email" placeholder="homersimpson@example.com" required class="border-0 placeholder-gray-300 pl-6 pr-32 py-3 rounded-full w-full" x-ref="newsletter" />

        <button type="submit" class="absolute top-1/2 -translate-y-1/2 right-0 bg-blue-400 hover:bg-blue-300 flex-shrink-0 font-normal h-full px-6 rounded-full text-sm text-white transition-colors">
            Sign me up
        </button>
    </x-form>
</aside>
