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

        @if (! app()->runningUnitTests())
            @googlefonts
            @googlefonts('serif')
        @endif

        <x-feed-links />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/img/apple-touch-icon.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/img/16x16.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/img/32x32.png') }}" />
        <link rel="icon" type="image/png" sizes="48x48" href="{{ Vite::asset('resources/img/48x48.png') }}" />
        <link rel="icon" type="image/png" sizes="96x96" href="{{ Vite::asset('resources/img/96x96.png') }}" />

        <link rel="canonical" href="{{ url()->current() }}" />

        @if (app()->isProduction() && auth()->guest())
            <script defer src="https://save-tonight-hey-jude.benjamincrozat.com/script.js" data-site="{{ config('services.fathom.site_id') }}"></script>

            <script>
                (function(h,o,t,j,a,r){
                    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                    h._hjSettings={hjid:3333174,hjsv:6};
                    a=o.getElementsByTagName('head')[0];
                    r=o.createElement('script');r.async=1;
                    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                    a.appendChild(r);
                })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
            </script>
        @endif

        @stack('head')
    </head>
    <body {{ $attributes->merge(['class' => 'bg-gray-50 font-light', 'x-data' => '{ searching: false }']) }}>
        {{ $slot }}

        <x-status />

        <x-search />
    </body>
</html>
