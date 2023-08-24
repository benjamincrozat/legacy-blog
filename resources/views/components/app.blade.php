<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <title>{{ $title ?? config('app.name') }}</title>

    @unless(app()->runningUnitTests())
        @googlefonts
    @endunless

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            corePlugins: [
                'accentColor',
                'backgroundColor',
                'borderColor',
                'boxShadowColor',
                'caretColor',
                'divideColor',
                'gradientColorStops',
                'outlineColor',
                'placeholderColor',
                'ringColor',
                'ringOffsetColor',
                'textDecorationColor',
                'textColor',
            ],
        }
    </script>

    @if (app()->isProduction())
        <script
            defer src="https://api.pirsch.io/pirsch-extended.js"
            id="pirschextendedjs"
            data-code="5N2hIsUQsCVX1LQtvPdJ3AGwQZHGxtt5"
            data-disable-page-views
        ></script>
    @endif

    @livewireStyles

    @livewireScripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <x-feed-links />

    <link rel="canonical" href="{{ url()->current() }}" />

    <body {{ $attributes->except(['description', 'image', 'title'])->merge(['class' => 'bg-gray-50 font-light']) }} x-data="{}">
        <div class="flex flex-col min-h-screen">
            @empty($hideNavigation)
                <nav class="container relative flex items-center justify-between py-4 sm:static lg:max-w-screen-md">
                    <a wire:navigate href="/">
                        <span class="sr-only">{{ config('app.name') }}</span>
                        <x-icon-logo class="w-8 h-8 fill-current md:w-10 md:h-10" />
                    </a>

                    <div class="flex items-center justify-between gap-8 text-sm md:text-base">
                        <x-menu trigger="Topics">
                            @foreach ($categories as $category)
                                <x-menu-item
                                    href="{{ route('categories.show', $category) }}"
                                    class="hover:!bg-{{ $category->primary_color }} hover:!text-{{ $category->secondary_color }}"
                                >
                                    {{ $category->name }}
                                </x-menu-item>
                            @endforeach

                            @if ($categories->isNotEmpty())
                                <x-menu-divider />
                            @endif

                            <x-menu-item href="{{ route('posts.index') }}">
                                All
                            </x-menu-item>
                        </x-menu>

                        <a wire:navigate href="{{ route('posts.index') }}">
                            Latest
                        </a>

                        <x-menu trigger="For you">
                            <x-menu-item href="/best-web-development-tools">
                                See all the tools I use
                            </x-menu-item>

                            <x-menu-item href="{{ route('pouest') }}">
                                Instantly migrate PHPUnit tests to Pest for free
                            </x-menu-item>

                            <x-menu-item href="https://github.com/benjamincrozat/benjamincrozat.com" target="_blank" rel="nofollow noopener noreferrer">
                                Hack in my blog's source code
                            </x-menu-item>

                            <x-menu-item href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day" target="_blank" rel="nofollow noopener noreferrer">
                                Look at my blog's live analytics
                            </x-menu-item>
                        </x-menu>

                        @auth
                            <x-menu :hide-icon="true">
                                <x-slot:trigger>
                                    <img
                                        src="{{ auth()->user()->presenter()->gravatar() }}?s=64"
                                        width="32"
                                        height="32"
                                        alt="{{ auth()->user()->name }}"
                                        class="rounded-full"
                                    />
                                </x-slot:trigger>

                                <x-menu-item href="/admin/posts" icon="o-cog" :no-wire-navigate="true">
                                    Admin
                                </x-menu-item>

                                <x-menu-divider />

                                <x-menu-item
                                    type="submit" form="logout"
                                    class="hover:!bg-red-400"
                                    icon="o-arrow-left-on-rectangle"
                                >
                                    Log out
                                </x-menu-item>
                            </x-menu>
                        @endauth
                    </div>
                </nav>
            @endempty

            @auth
                <form method="POST" action="{{ route('logout') }}" id="logout">@csrf</form>
            @endauth

            <main>
                {{ $slot }}
            </main>

            <div class="flex-grow mt-16 text-gray-300 @empty ($darkerFooter) bg-gray-900 @else bg-gray-950 @endempty">
                <footer class="container py-8 text-center">
                    <p>Domain name by <a href="#" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">Namecheap</a>, hosting by <a href="#" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">DigitalOcean</a>, tracking by <a href="#" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">Pirsch Analytics</a>, and some illustrations come from <a href="#" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">Freepik</a>.</p>

                    <p class="mt-4"><a href="/feed" class="font-medium text-white underline">Subscribe to feed</a>, and follow me on <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">GitHub</a> and <a href="https://x.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">X</a>. For inquiries, <a href="mailto:hello@benjamincrozat.com" class="font-medium text-white underline">send&nbsp;me&nbsp;an&nbsp;email</a>.</p>

                    <p class="mt-8">Read my <a wire:navigate href="{{ route('privacy') }}" class="underline">privacy policy</a> and <a wire:navigate href="{{ route('terms') }}" class="underline">terms of service</a>.</p>

                    <p class="mt-8 text-xs tracking-widest uppercase opacity-50">© {{ config('app.name') }} {{ date('Y') }}. All rights reserved.</p>
                </footer>
            </div>
        </div>
    </body>
</html>
