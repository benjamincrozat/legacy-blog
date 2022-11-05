<div {{ $attributes->merge(['class' => 'border dark:border-gray-800 rounded']) }}>
    <div class="border-b dark:border-gray-800 flex items-center justify-center gap-2 font-normal leading-tight p-2 text-indigo-400">
        <x-heroicon-o-information-circle class="-translate-y-[.5px] flex-shrink-0 w-4 h-5 h-4" />
        {{ $header }}
    </div>

    <div class="md:max-w-screen-sm mx-auto p-4">
        {{ $slot }}

        <p class="mt-6">
            <a
                href="{{ route('affiliate', $button->attributes->get('slug')) }}"
                class="bg-gradient-to-r from-indigo-300 dark:from-indigo-500 to-indigo-400 dark:to-indigo-600 block leading-tight sm:max-w-screen-xs mt-2 mx-auto px-4 py-3 rounded shadow-md text-center text-green-50"
                @click="window.fathom?.trackGoal('K8DBWLRF', 0)"
            >
                {{ $button }}
            </a>
        </p>
    </div>
</div>
