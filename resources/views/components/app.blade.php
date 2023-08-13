@php
use App\Models\Category;
@endphp

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
                    @foreach (Category::whereHas('posts')->get() as $category)
                        <x-menu-item
                            href="{{ route('categories.show', $category) }}"
                            class="hover:!bg-{{ $category->primary_color }} hover:!text-{{ $category->secondary_color }}"
                        >
                            {{ $category->name }}
                        </x-menu-item>
                    @endforeach
                </x-menu>

                <button class="flex items-center gap-2">
                    For you
                    <x-heroicon-o-chevron-down class="w-4 h-4 translate-y-px" />
                </button>
            </div>
        </nav>

        <main>
            {{ $slot }}
        </main>

        <div class="mt-16 text-gray-300 bg-gray-900">
            <footer class="container py-8 text-center">
                <p>Domain name by <a href="#" class="font-medium text-white underline">Namecheap</a>, hosting by <a href="#" class="font-medium text-white underline">DigitalOcean</a>, and tracking by <a href="#" class="font-medium text-white underline">Fathom Analytics</a>.</p>

                <p class="mt-4">Follow me on <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">GitHub</a> and <a href="https://x.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">X</a>. For inquiries, <a href="mailto:hello@benjamincrozat.com" class="font-medium text-white underline">send me an email</a>.</p>

                <p class="mt-16 text-xs tracking-widest uppercase opacity-50">© {{ config('app.name') }} {{ date('Y') }}. All rights reserved.</p>
            </footer>
        </div>
    </body>
</html>
