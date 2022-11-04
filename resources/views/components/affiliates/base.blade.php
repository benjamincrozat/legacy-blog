<div {{ $attributes->merge(['class' => 'border dark:border-gray-800 rounded']) }}>
    <div class="flex items-center justify-center gap-2 font-normal leading-tight p-2 text-indigo-400">
        <x-heroicon-o-information-circle class="-translate-y-[.5px] flex-shrink-0 w-5 sm:w-4 h-5 sm:h-4" />
        {{ $header }}
    </div>

    <div class="border-t md:max-w-screen-md mx-auto p-4">
        {{ $slot }}

        <p class="mt-6">
            <a
                href="{{ route('affiliate', $button->attributes->get('slug')) }}"
                class="bg-gradient-to-r from-indigo-300 to-indigo-400 block leading-tight md:max-w-screen-sm mt-2 mx-auto px-4 py-3 rounded text-center text-green-50 shadow-md"
                @click="window.fathom?.trackGoal('K8DBWLRF', 0)"
            >
                {{ $button }}
            </a>
        </p>
    </div>
</div>
