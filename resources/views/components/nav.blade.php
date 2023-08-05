@empty($funnel)
    <x-announcement />
@endempty

<div {{ $attributes->merge(['class' => 'container flex items-center justify-between relative sm:static text-sm sm:text-base'])}}>
    <x-logo />

    @empty($funnel)
        <div class="flex items-center gap-6 md:gap-8">
            <x-menu>
                <x-slot name="trigger">For you</x-slot>

                <x-menu-item href="https://benjamincrozat.com/best-web-development-tools">
                    <x-menu-item-icon bg-color-class="bg-emerald-400" icon="s-wrench-screwdriver" />

                    <div class="leading-tight">
                        <div class="font-medium">
                            The tools I use
                        </div>

                        <div class="text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">
                            Here are the best free and paid tools I use in 2023 to do my job.
                        </div>
                    </div>
                </x-menu-item>

                <x-menu-item href="{{ route('pouest') }}">
                    <x-icon-pouest class="w-12 h-12 text-white rounded" />

                    <div class="leading-tight">
                        <div class="font-medium">
                            Pouest
                        </div>

                        <div class="text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">
                            Instantly migrate your tests to Pest for free.
                        </div>
                    </div>
                </x-menu-item>

                <x-menu-item href="https://superchargedlaravel.com">
                    <x-menu-item-icon bg-color-class="bg-gray-900" icon-color-class="text-yellow-400" icon="s-bolt" />

                    <div class="leading-tight">
                        <div class="font-medium">
                            Supercharged Laravel
                        </div>

                        <div class="text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">
                            Learn how to generate production-ready Laravel code faster, and be your company's hero.
                        </div>
                    </div>
                </x-menu-item>

                <x-menu-item href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=today&scale=day">
                    <x-menu-item-icon bg-color-class="bg-blue-400" icon="s-chart-bar" />

                    <div class="leading-tight">
                        <div class="font-medium">
                            My blog's live analytics dashboard
                        </div>

                        <div class="text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">
                            Curious? See the growth of my blog for yourself.
                        </div>
                    </div>
                </x-menu-item>
            </x-menu>

            @auth
                <x-menu class="sm:!w-[200px] md:!w-[250px] lg:!w-[300px]">
                    <x-slot name="trigger">Admin</x-slot>

                    <x-menu-item href="/horizon">
                        Horizon
                    </x-menu-item>

                    <x-menu-item href="/nova">
                        Nova
                    </x-menu-item>
                </x-menu>
            @endauth

            <x-search-btn />
        </div>
    @endempty
</div>
