<nav {{ $attributes->merge(['class' => 'container relative flex items-center justify-between sm:static lg:max-w-screen-md']) }}>
    <x-logo />

    <div class="flex items-baseline gap-6 sm:gap-7 md:gap-8">
        <a wire:navigate.hover href="{{ route('posts.index') }}">
            @if (Route::is('posts.index'))
                <x-heroicon-s-fire class="h-6 mx-auto text-orange-400 md:h-7" />
            @else
                <x-heroicon-o-fire class="h-6 mx-auto md:h-7" />
            @endif

            <div class="text-xs font-normal @if (Route::is('posts.index')) text-orange-600 @endif">Latest</div>
        </a>

        <x-menu.base class="grid gap-4 py-4 leading-none">
            <x-slot:trigger>
                <x-heroicon-o-tag class="h-6 mx-auto md:h-7" x-show="! open" />
                <x-heroicon-s-tag class="h-6 mx-auto text-emerald-400 md:h-7" x-cloak x-show="open" />
                <div class="text-xs font-normal" x-bind:class="{ 'text-emerald-600': open }">Topics</div>
            </x-slot:trigger>

            @foreach ($categories as $category)
                <x-menu.item
                    href="{{ route('categories.show', $category->slug) }}"
                    class="hover:!bg-transparent hover:!text-inherit !py-0"
                >
                    <x-category-icon :category="$category" class="!w-[48px] !h-[48px]" />
                    {{ $category->name }}
                </x-menu.item>
            @endforeach
        </x-menu.base>

        <x-menu.base>
            <x-slot:trigger>
                <x-heroicon-o-gift class="h-6 mx-auto md:h-7" x-show="! open" />
                <x-heroicon-s-gift class="h-6 mx-auto text-rose-400 md:h-7" x-cloak x-show="open" />
                <div class="text-xs font-normal" x-bind:class="{ 'text-rose-600': open }">For you</div>
            </x-slot:trigger>

            <x-menu.item href="{{ route('media-kit') }}" icon="s-star" class="text-yellow-400 hover:text-yellow-400">
                <strong class="text-black transition-colors group-hover:text-white">Get more eyes on your business</strong>
            </x-menu.item>

            <x-menu.item href="/best-web-development-tools" icon="s-wrench" class="text-emerald-400 hover:text-emerald-400">
                <strong class="text-black transition-colors group-hover:text-white">See all the tools I use</strong>
            </x-menu.item>

            <x-menu.item href="{{ route('pouest') }}" icon="o-forward">
                Migrate your tests to Pest for free
            </x-menu.item>

            <x-menu.item href="https://github.com/benjamincrozat/benjamincrozat.com" target="_blank" rel="nofollow noopener" icon="o-code-bracket">
                Fork this blog on GitHub
            </x-menu.item>

            <x-menu.item href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day" target="_blank" rel="nofollow noopener" icon="o-chart-pie">
                Look at my blog's live analytics
            </x-menu.item>
        </x-menu.base>

        <x-menu.base :self-center="true">
            <x-slot:trigger @class([
                '-mx-1 sm:mx-0' => auth()->check(),
                '-ml-1 sm:ml-0' => auth()->guest(),
            ])>
                <x-heroicon-o-ellipsis-horizontal
                    class="h-6 mx-auto transition-transform duration-300 md:h-7"
                    x-bind:class="{ 'rotate-90': open }"
                />
                <div class="sr-only ">More</div>
            </x-slot:trigger>

            <x-menu.item no-wire-navigate href="https://benjamincrozat.lemonsqueezy.com/checkout/buy/eb4c5ce9-c87e-4497-ab6b-b0922654e658?discount=0" icon="s-heart" class="text-rose-400">
                <strong class="text-black transition-colors group-hover:text-white">Support my efforts</strong>
            </x-menu.item>

            <x-menu.item no-wire-navigate href="/feed" icon="s-rss" class="text-orange-400">
                <strong class="text-black transition-colors group-hover:text-white">Never miss new content</strong>
            </x-menu.item>

            <x-menu.item
                href="{{ route('home') }}#about"
                :no-wire-navigate="true"
                icon="o-question-mark-circle"
            >
                About
            </x-menu.item>

            <x-menu.item href="https://x.com/benjamincrozat" target="_blank" rel="nofollow noopener">
                <x-icon-x class="flex-shrink-0 w-5 h-5 translate-y-[.5px]" />
                Follow me on X
            </x-menu.item>
        </x-menu.base>

        @auth
            <x-menu.base :hide-icon="true">
                <x-slot:trigger>
                    <img
                        loading="lazy"
                        src="{{ auth()->user()->presenter()->gravatar() }}?s=64"
                        alt="{{ auth()->user()->name }}"
                        class="rounded-full w-[32px] h-[32px] md:w-[40px] md:h-[40px]"
                    />

                    <div class="sr-only">{{ auth()->user()->name }}</div>
                </x-slot:trigger>

                <x-menu.item href="/admin/posts" icon="o-cog" :no-wire-navigate="true">
                    Admin
                </x-menu.item>

                <x-menu.item href="/horizon" icon="o-queue-list" :no-wire-navigate="true">
                    Horizon
                </x-menu.item>

                <x-menu.divider />

                <x-menu.item
                    type="submit" form="logout"
                    class="hover:!bg-red-400"
                    icon="o-arrow-left-on-rectangle"
                >
                    Log out
                </x-menu.item>
            </x-menu.base>
        @endauth
    </div>
</nav>
