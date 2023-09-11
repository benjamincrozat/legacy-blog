<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="description" content="{{ $description ?? 'Join more than 30,000 readers and skyrocket your web development skills.' }}" />
    <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
    <meta property="og:image" content="{{ $image ?? 'https://i.useflipp.com/gw6mxpkgy4v8.png?watermark=useflipp.com&title=' . urlencode($title ?? '') . '&body=' . urlencode($description ?? '') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@benjamincrozat" />
    <meta name="twitter:description" content="{{ $description ?? 'Join more than 30,000 readers and skyrocket your web development skills.' }}" />
    <meta name="twitter:image" content="{{ $image ?? 'https://i.useflipp.com/gw6mxpkgy4v8.png?watermark=useflipp.com&title=' . urlencode($title ?? '') . '&body=' . urlencode($description ?? '') }}" />
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

        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:3638631,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
    @endif

    @livewireStyles

    @livewireScripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/github-dark.min.css" />

    @if (config('services.adsense.enabled') && app()->isProduction())
        <script
            async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3461630254419592"
            crossorigin="anonymous"
        ></script>
    @endif

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('pre code').forEach(el => hljs.highlightElement(el))
        })

        document.addEventListener('livewire:navigated', () => {
            document.querySelectorAll('pre code').forEach(el => hljs.highlightElement(el))
        })
    </script>

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
                <x-navigation class="mt-4" />
            @endempty

            @auth
                <form method="POST" action="{{ route('logout') }}" id="logout" class="hidden">@csrf</form>
            @endauth

            <main>
                {{ $slot }}
            </main>

            @empty($hideFooter)
                <x-footer class="flex-grow mt-16 text-gray-300 @empty ($darkerFooter) bg-gray-900 @else bg-gray-950 @endempty" />
            @endempty
        </div>

        <x-status />
    </body>
</html>
