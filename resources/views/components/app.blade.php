<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />

    <title>{{ $title ?? config('app.name') }}</title>

    @googlefonts

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
        <nav class="container relative flex items-center justify-between py-4 sm:static lg:max-w-screen-md">
            <a href="/">
                <span class="sr-only">{{ config('app.name') }}</span>
                <x-icon-logo class="w-10 h-10" />
            </a>

            <div class="flex items-center justify-between gap-8">
                <x-menu trigger="Technologies">
                    @foreach ($categories as $category)
                        <x-menu-item
                            href="{{ route('categories.show', $category) }}"
                            class="hover:!bg-{{ $category->primary_color }} hover:!text-{{ $category->secondary_color }}"
                        >
                            {{ $category->name }}
                        </x-menu-item>
                    @endforeach
                </x-menu>

                <x-menu trigger="For you">
                    <x-menu-item href="https://benjamincrozat.com/best-web-development-tools">
                        See all the tools I use
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
                                src="{{ auth()->user()->gravatar }}?s=64"
                                width="32"
                                height="32"
                                alt="{{ auth()->user()->name }}"
                                class="rounded-full"
                            />
                        </x-slot:trigger>

                        <x-menu-item href="/admin" icon="o-cog">
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

        @auth
            <form method="POST" action="{{ route('logout') }}" id="logout">@csrf</form>
        @endauth

        <main>
            {{ $slot }}
        </main>

        <div class="mt-16 text-gray-300 bg-gray-900">
            <footer class="container py-8 text-center">
                <p>Domain name by <a href="#" class="font-medium text-white underline">Namecheap</a>, hosting by <a href="#" class="font-medium text-white underline">DigitalOcean</a>, and tracking by <a href="#" class="font-medium text-white underline">Fathom Analytics</a>.</p>

                <p class="mt-4">Follow me on <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">GitHub</a> and <a href="https://x.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">X</a>. For inquiries, <a href="mailto:hello@benjamincrozat.com" class="font-medium text-white underline">send&nbsp;me&nbsp;an&nbsp;email</a>.</p>

                <p class="mt-16 text-xs tracking-widest uppercase opacity-50">© {{ config('app.name') }} {{ date('Y') }}. All rights reserved.</p>
            </footer>
        </div>
    </body>
</html>
