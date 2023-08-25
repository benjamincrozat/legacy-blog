<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="description" content="{{ $description ?? '' }}" />
    <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
    @if (! empty($image))
        <meta property="og:image" content="{{ $image }}" />
    @endif
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@benjamincrozat" />
    <meta name="twitter:description" content="{{ $description ?? '' }}" />
    @if (! empty($image))
        <meta name="twitter:image" content="{{ $image }}" />
    @endif
    <meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />

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

    <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/img/apple-touch-icon.jpg') }}" />
    <link rel="icon" type="image/jpeg" sizes="16x16" href="{{ Vite::asset('resources/img/16x16.jpg') }}" />
    <link rel="icon" type="image/jpeg" sizes="32x32" href="{{ Vite::asset('resources/img/32x32.jpg') }}" />
    <link rel="icon" type="image/jpeg" sizes="48x48" href="{{ Vite::asset('resources/img/48x48.jpg') }}" />
    <link rel="icon" type="image/jpeg" sizes="96x96" href="{{ Vite::asset('resources/img/96x96.jpg') }}" />

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
                                    class="hover:!bg-transparent hover:!text-inherit"
                                >
                                    <x-category-icon :category="$category" class="!w-[48px] !h-[48px]" />
                                    {{ $category->name }}
                                </x-menu-item>
                            @endforeach
                        </x-menu>

                        <a wire:navigate href="{{ route('posts.index') }}">
                            Latest
                        </a>

                        <x-menu trigger="For you">
                            <x-menu-item href="/best-web-development-tools" icon="o-cog">
                                See all the tools I use
                            </x-menu-item>

                            <x-menu-item href="{{ route('pouest') }}" icon="o-forward">
                                Instantly migrate PHPUnit tests to Pest for free
                            </x-menu-item>

                            <x-menu-item href="https://github.com/benjamincrozat/benjamincrozat.com" target="_blank" rel="nofollow noopener noreferrer" icon="o-code-bracket">
                                Hack in my blog's source code
                            </x-menu-item>

                            <x-menu-item href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day" target="_blank" rel="nofollow noopener noreferrer" icon="o-chart-pie">
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
