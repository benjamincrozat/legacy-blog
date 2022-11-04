<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
        <meta name="description" content="{{ $description ?? '' }}" />
        <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
        @if (! empty($image))
            <meta property="og:image" content="{{ $image }}" />
        @endif
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ URL::current() }}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:creator" content="@benjamincrozat" />
        <meta name="twitter:description" content="{{ $description ?? '' }}" />
        @if (! empty($image))
            <meta name="twitter:image" content="{{ $image }}" />
        @endif
        <meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />

        <title>{{ $title ?? "The web developer life of Benjamin Crozat" }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @googlefonts
        @googlefonts('serif')

        <x-feed-links />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('/img/apple-touch-icon.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('/img/favicons/16x16.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('/img/favicons/32x32.png') }}" />
        <link rel="icon" type="image/png" sizes="48x48" href="{{ secure_asset('/img/favicons/48x48.png') }}" />
        <link rel="icon" type="image/png" sizes="96x96" href="{{ secure_asset('/img/favicons/96x96.png') }}" />

        <link rel="canonical" href="{{ url()->current() }}" />

        @if (app()->isProduction() && auth()->guest())
            <script defer src="https://save-tonight-hey-jude.benjamincrozat.com/script.js" data-site="{{ config('services.fathom.site_id') }}"></script>
        @endif
    </head>
    <body {{ $attributes->merge(['class' => 'bg-gray-50 font-light']) }} x-data>
        <div class="flex flex-col min-h-screen">
            {{ $slot }}
        </div>

        <x-status />
    </body>
</html>
