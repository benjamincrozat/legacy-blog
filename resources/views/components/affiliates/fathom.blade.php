<x-affiliates.base {{ $attributes }}>
    <p class="flex items-center justify-center gap-2 font-normal leading-tight text-indigo-400">
        <x-heroicon-o-information-circle class="-translate-y-[.5px] flex-shrink-0 w-5 sm:w-4 h-5 sm:h-4" />
        Quick tip for business owners
    </p>

    <p class="mt-4">
        Google Analytics isn't GDPR-compliant, it's clunky and hard to use.
    </p>

    <p class="mt-2">
        <strong class="font-semibold"><a href="{{ route('affiliate', 'fathom') }}" class="text-indigo-400 underline">Fathom Analytics</a> does a way better job.</strong>
    </p>

    <p class="mt-2">
        <a href="{{ route('affiliate', 'fathom') }}" class="text-indigo-400 underline">
            Get started with a <strong class="font-bold dark:text-indigo-300">7-day trial & $10&nbsp;discount</strong> on your first invoice.
        </a>
    </p>
</x-affiliates.base>
