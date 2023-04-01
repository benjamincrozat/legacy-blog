@empty($funnel)
    @php $switch = (bool) mt_rand(0, 1); @endphp

    @if ($switch)
        <a href="https://smousss.com" class="bg-gradient-to-r from-gray-900 dark:from-gray-800/50 to-gray-700 dark:to-gray-700/50 block">
            <div class="container flex items-center justify-between gap-4 leading-tight py-4 text-sm text-white">
                <div class="text-gray-200">
                    <div>
                        <strong class="font-medium">Laravel developers</strong>, <span class="bg-clip-text bg-gradient-to-r from-orange-400 to-yellow-400 text-transparent">let GPT-4 handle repetitive tasks.</span><br class="hidden sm:inline" />

                        <span class="bg-clip-text bg-gradient-to-r from-indigo-200 to-blue-300 text-transparent">Admin panels creation, REST API docs and i18nization, 100% handled by artificial intelligence.</span>
                    </div>

                    <div class="flex items-center gap-[.35rem] mt-2 text-blue-400">
                        <span>Try for free</span>
                        <x-heroicon-o-arrow-right class="w-3 h-3" />
                    </div>
                </div>

                <img
                    loading="lazy"
                    src="{{ Vite::asset('resources/img/smousss.png') }}"
                    width="64"
                    height="64"
                    alt="Smousss"
                    class="flex-shrink-0 rounded-full"
                />
            </div>
        </a>
    @else
        <a href="https://blogging-with-laravel.com" class="bg-gradient-to-r from-gray-900 dark:from-gray-800/50 to-gray-700 dark:to-gray-700/50 block">
            <div class="container flex items-center justify-between gap-4 leading-tight py-4 text-sm text-white">
                <div class="text-gray-200">
                    <div>
                        Maximize your <span class="bg-clip-text bg-gradient-to-r from-red-300 to-red-400 font-normal text-transparent">Laravel</span> blog's potential with <span class="bg-clip-text bg-gradient-to-r from-green-300 to-green-400 font-normal text-transparent">SEO best practices</span> and reach <span class="bg-clip-text bg-gradient-to-r from-orange-300 to-orange-400 font-normal text-transparent">10K monthly clicks</span> on Google.
                    </div>

                    <div class="flex items-center gap-[.35rem] mt-2 text-blue-400">
                        <span>Preview the course for free</span>
                        <x-heroicon-o-arrow-right class="w-3 h-3" />
                    </div>
                </div>

                <div class="flex-shrink-0 relative">
                    <img
                        loading="lazy"
                        src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=128"
                        width="64"
                        height="64"
                        alt="Benjamin Crozat"
                        class="rounded-full"
                    />

                    <span class="absolute left-1/2 bottom-0 -translate-x-1/2 translate-y-[30%]
                    bg-gradient-to-r from-indigo-400 to-blue-300 font-bold inline-block
                    leading-tight px-2 py-1 rounded-full scale-[.65] text-xs uppercase">
                        New!
                    </span>
                </div>
            </div>
        </a>
    @endif
@endempty

<div {{ $attributes->merge(['class' => 'container flex items-center justify-between'])}}>
    <a
        href="{{ route('home') }}"
        class="flex sm:flex-shrink-0 items-center gap-3"
        @click="window.fathom?.trackGoal('XAQUA2K4', 0)"
    >
        <x-icon-logo class="fill-current flex-shrink-0 text-black dark:text-white w-8 h-8 md:w-10 md:h-10" />

        <span class="leading-tight sr-only md:not-sr-only text-sm">
            <span class="block font-medium text-black dark:text-white">Benjamin Crozat</span>
            <span class="block opacity-75">The art of crafting web applications</span>
        </span>
    </a>

    @empty($funnel)
        <button class="flex items-center gap-2 group hover:text-indigo-400 transition-colors" @click="searching = true; window.fathom?.trackGoal('NV4ZNM3W', 0)">
            <x-heroicon-s-magnifying-glass class="-translate-y-[.5px] sm:-translate-y-0 flex-shrink-0 w-4 h-4" />

            Search

            <span class="border dark:border-gray-800 inline-block px-2 py-[.35rem] rounded scale-90 !text-gray-600 dark:!text-gray-300 text-xs sm:translate-y-px uppercase">
                ⌘K
            </span>
        </button>
    @endempty
</div>
