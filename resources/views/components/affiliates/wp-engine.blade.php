<x-affiliates.base {{ $attributes }}>
    <x-slot:header>
        Quick tip for serious bloggers
    </x-slot:header>

    <p>It's essential to get the right hosting to carry you through success.</p>

    <p class="mt-2"><a href="{{ route('affiliate', 'wp-engine') }}" class="text-indigo-400 underline">WP Engine</a> provides managed, fast and secure WordPress to help you focus on content.</p>

    <p class="mt-6">
        <x-slot:button slug="wp-engine">
            Get <strong class="font-bold text-white">4 months free</strong><br />
            on annual shared plans
        </x-slot:button>
    </p>
</x-affiliates.base>
