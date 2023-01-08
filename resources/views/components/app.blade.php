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
        @endif

        <script defer src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

        @if (should_display_ads())
            <script defer src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3461630254419592" crossorigin="anonymous"></script>
        @endif
    </head>
    <body {{ $attributes->merge(['class' => 'bg-gray-50 font-light', 'x-data' => '']) }}>
        {{ $slot }}

        @if (session('status') || request()->convertkit)
            <div
                class="fixed bottom-0 left-0 right-0 z-10"
                x-init="setTimeout(() => open = false, 5000)"
                x-data="{ open: true }"
                x-show="open"
                x-cloak
            >
                <div class="container mb-4">
                    <div class="bg-gray-800 flex items-center justify-between gap-5 px-5 py-4 rounded-lg shadow-lg text-white">
                        <p>
                            @if ('confirmed-subscription' === request()->convertkit)
                                You're all set! Thank you for subscribing!
                            @else
                                {{ session('status') }}
                            @endif
                        </p>

                        <button class="text-indigo-400" @click="open = false">
                            <span class="sr-only">Close</span>
                            <x-heroicon-o-x-mark class="w-5 h-5 translate-y-[-0.5px]" />
                        </button>
                    </div>
                </div>
            </div>
        @endif

    </body>
</html>
