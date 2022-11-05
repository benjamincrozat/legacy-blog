<x-affiliates.base {{ $attributes }}>
    <x-slot:header>
        Quick tip for business owners
    </x-slot:header>

    <p>
        Google Analytics is clunky, hard to use, and isn't GDPR-compliant.
    </p>

    <p class="mt-2">
        <a href="{{ route('affiliate', 'fathom-analytics') }}" class="text-indigo-400 underline" @click="window.fathom?.trackGoal('K8DBWLRF', 0)">Fathom Analytics</a> does a way better job.
    </p>

    <p class="mt-6">
        <x-slot:button slug="fathom">
            Get started with a <strong class="font-bold">7-day trial & $10&nbsp;discount</strong> on your first invoice.
        </x-slot:button>
    </p>
</x-affiliates.base>
