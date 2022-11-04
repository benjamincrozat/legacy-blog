<x-affiliates.base {{ $attributes }}>
    <x-slot:header>
        Quick tip for productive bloggers
    </x-slot:header>

    <p class="mt-2">
        I use <a href="{{ route('affiliate', 'jasper') }}" class="text-indigo-400 underline" @click="window.fathom?.trackGoal('K8DBWLRF', 0)">Jasper AI</a> to create SEO-optimized blog posts 10x faster.
    </p>

    <p class="mt-6">
        <x-slot:button slug="jasper">
            Get started with <strong class="font-bold">10,000 bonus credits</strong>
        </x-slot:button>
    </p>
</x-affiliates.base>
