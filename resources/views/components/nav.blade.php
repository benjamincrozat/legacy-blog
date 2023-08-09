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
                    See all the tools I use as a developer
                </x-menu-item>

                <x-menu-item href="{{ route('pouest') }}">
                    <x-icon-pouest class="w-8 h-8 text-white rounded md:w-12 md:h-12" />
                    Migrate to Pest in seconds
                </x-menu-item>

                <x-menu-item href="https://superchargedlaravel.com">
                    <x-menu-item-icon bg-color-class="bg-gray-900" icon-color-class="text-yellow-400" icon="s-bolt" />
                    Generate Laravel code with ChatGPT
                </x-menu-item>

                <x-menu-item href="https://github.com/benjamincrozat/benjamincrozat.com">
                    <x-menu-item-icon bg-color-class="bg-orange-400" icon="s-code-bracket" />
                    Hack in my blog's source code
                </x-menu-item>

                <x-menu-item href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day">
                    <x-menu-item-icon bg-color-class="bg-blue-400" icon="s-chart-bar" />
                    See my blog's live analytics dashboard
                </x-menu-item>
            </x-menu>

            @auth
                <x-menu class="sm:!w-[200px] md:!w-[250px] lg:!w-[300px]">
                    <x-slot name="trigger">Admin</x-slot>

                    <x-menu-item href="/horizon">
                        <x-icon-horizon class="text-[#7746ec] group-hover:text-white duration-500 fill-current w-5 h-5 translate-y-[.5px] -mr-1" />
                        Horizon
                    </x-menu-item>

                    <x-menu-item href="/nova">
                        <x-icon-nova class="w-5 h-5 translate-y-[.5px] -mr-1" />
                        Nova
                    </x-menu-item>
                </x-menu>
            @endauth

            <x-search />
        </div>
    @endempty
</div>
