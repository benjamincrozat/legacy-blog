<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="description" content="{{ $description ?? 'Join more than 20,000 readers and skyrocket your web development skills with frequently updated content.' }}" />
    <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
    @if (! empty($image))
        <meta property="og:image" content="{{ $image }}" />
    @endif
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@benjamincrozat" />
    <meta name="twitter:description" content="{{ $description ?? 'Join more than 20,000 readers and skyrocket your web development skills with frequently updated content.' }}" />
    @if (! empty($image))
        <meta name="twitter:image" content="{{ $image }}" />
    @endif
    <meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />

    <title>{{ $title ?? config('app.name') }}</title>

    @unless(app()->runningUnitTests())
        @googlefonts
        @googlefonts('handwriting')
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

    @if (app()->isProduction() && auth()->id() !== 1)
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

    <link rel="canonical" href="{{ $canonical ?? url()->current() }}" />

    <body {{ $attributes->except(['description', 'image', 'title', 'canonical'])->merge([
        'class' => 'bg-gray-50 font-light',
        'x-data' => '{}',
    ]) }}>
        <div class="flex flex-col min-h-screen">
            @empty($hideNavigation)
                <x-navigation />
            @endempty

            @auth
                <form method="POST" action="{{ route('logout') }}" id="logout" class="hidden">@csrf</form>
            @endauth

            <main>
                {{ $slot }}
            </main>

            @empty($hideFooter)
                <div class="flex-grow mt-16 text-gray-300 @empty ($darkerFooter) bg-gray-900 @else bg-gray-950 @endempty">
                    <footer class="container py-8 text-center">
                        <p>Domain name by <a href="{{ route('merchants.show', 'namecheap') }}" target="_blank" rel="noopener noreferrer" class="font-medium text-white underline">Namecheap</a>, hosting by <a href="{{ route('merchants.show', 'digitalocean') }}" target="_blank" rel="noopener noreferrer" class="font-medium text-white underline">DigitalOcean</a>, tracking by <a href="{{ route('merchants.show', 'pirsch-analytics') }}" target="_blank" rel="noopener noreferrer" class="font-medium text-white underline">Pirsch Analytics</a>, and some illustrations come from <a href="https://www.freepik.com" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">Freepik</a>.</p>

                        <p class="mt-4"><a href="/feed" class="font-medium text-white underline">Subscribe to the feed</a>, and follow me on <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">GitHub</a> and <a href="https://x.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="font-medium text-white underline">X</a>. For inquiries, <a href="mailto:hello@benjamincrozat.com" class="font-medium text-white underline">send&nbsp;me&nbsp;an&nbsp;email</a>.</p>

                        <p class="mt-8">Read my <a wire:navigate.hover href="{{ route('privacy') }}" class="underline">privacy policy</a> and <a wire:navigate.hover href="{{ route('terms') }}" class="underline">terms of service</a>.</p>

                        <p class="mt-8 text-xs tracking-widest uppercase opacity-50">© {{ config('app.name') }} {{ date('Y') }}. All rights reserved.</p>
                    </footer>
                </div>
            @endempty
        </div>
    </body>
</html>
