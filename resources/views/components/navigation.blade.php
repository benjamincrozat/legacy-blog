<nav {{ $attributes->merge(['class' => 'container relative flex items-center justify-between sm:static lg:max-w-screen-md']) }}>
    <x-logo />

    <div class="flex items-center gap-6 sm:gap-7 md:gap-8">
        <a wire:navigate.hover href="{{ route('posts.index') }}">
            @if (Route::is('posts.index'))
                <x-heroicon-s-fire class="w-6 h-6 mx-auto text-orange-400 md:w-7 md:h-7" />
            @else
                <x-heroicon-o-fire class="w-6 h-6 mx-auto md:w-7 md:h-7" />
            @endif

            <span class="text-xs font-normal @if (Route::is('posts.index')) text-orange-600 @endif">Latest</span>
        </a>

        <x-menu.base class="grid gap-4 py-4">
            <x-slot:trigger>
                <x-heroicon-o-tag class="w-6 h-6 mx-auto md:w-7 md:h-7" x-show="! open" />
                <x-heroicon-s-tag class="w-6 h-6 mx-auto text-emerald-400 md:w-7 md:h-7" x-cloak x-show="open" />
                <span class="text-xs font-normal" x-bind:class="{ 'text-emerald-600': open }">Topics</span>
            </x-slot:trigger>

            @foreach ($categories as $category)
                <x-menu.item
                    href="{{ route('categories.show', $category) }}"
                    class="hover:!bg-transparent hover:!text-inherit !py-0"
                >
                    <x-category-icon :category="$category" class="!w-[48px] !h-[48px]" />
                    {{ $category->name }}
                </x-menu.item>
            @endforeach
        </x-menu.base>

        <a href="{{ route('home') }}#newsletter">
            <x-heroicon-o-envelope class="w-6 h-6 mx-auto md:w-7 md:h-7" />
            <span class="text-xs font-normal">
                News
            </span>
        </a>

        <x-menu.base>
            <x-slot:trigger>
                <x-heroicon-o-gift class="w-6 h-6 mx-auto md:w-7 md:h-7" x-show="! open" />
                <x-heroicon-s-gift class="w-6 h-6 mx-auto text-rose-400 md:w-7 md:h-7" x-cloak x-show="open" />
                <span class="text-xs font-normal" x-bind:class="{ 'text-rose-600': open }">For you</span>
            </x-slot:trigger>

            <x-menu.item href="{{ route('media-kit') }}" icon="s-star" class="text-yellow-400 hover:text-yellow-400">
                <strong class="text-black transition-colors group-hover:text-white">Get more eyes on your business</strong>
            </x-menu.item>

            <x-menu.item no-wire-navigate href="{{ route('home') }}#newsletter" icon="s-envelope" class="text-indigo-400 hover:text-indigo-400">
                <strong class="text-black transition-colors group-hover:text-white">Follow my journey</strong>
            </x-menu.item>

            <x-menu.item href="/best-web-development-tools" icon="o-wrench">
                See all the tools I use
            </x-menu.item>

            <x-menu.item href="{{ route('pouest') }}" icon="o-forward">
                Instantly migrate your tests to Pest for free
            </x-menu.item>

            <x-menu.item href="https://github.com/benjamincrozat/benjamincrozat.com" target="_blank" rel="nofollow noopener" icon="o-code-bracket">
                Hack in my blog's source code
            </x-menu.item>

            <x-menu.item href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day" target="_blank" rel="nofollow noopener" icon="o-chart-pie">
                Look at my blog's live analytics
            </x-menu.item>
        </x-menu.base>

        <x-menu.base>
            <x-slot:trigger @class([
                '-mx-2 sm:mx-0' => auth()->check(),
                '-ml-2 sm:ml-0' => auth()->guest(),
            ])>
                <x-heroicon-o-ellipsis-horizontal
                    class="w-6 h-6 mx-auto transition-transform duration-300 md:w-7 md:h-7"
                    x-bind:class="{ 'rotate-90': open }"
                />

                <span class="sr-only ">More</span>
            </x-slot:trigger>

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
                        src="{{ auth()->user()->presenter()->gravatar() }}?s=64"
                        alt="{{ auth()->user()->name }}"
                        class="rounded-full w-[32px] h-[32px] md:w-[40px] md:h-[40px]"
                    />

                    <span class="sr-only">{{ auth()->user()->name }}</span>
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
