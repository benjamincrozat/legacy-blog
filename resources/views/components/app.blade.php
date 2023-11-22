<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta name="description" content="{{ $description ?? 'Join more than 50,000 readers and skyrocket your web development skills.' }}" />
        <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
        <meta property="og:image" content="{{ $image ?? 'https://i.useflipp.com/gw6mxpkgy4v8.png?title=' . urlencode($title ?? '') . '&body=' . urlencode($description ?? '') . '&watermark=useflipp.com' }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:creator" content="@benjamincrozat" />
        <meta name="twitter:description" content="{{ $description ?? 'Join more than 50,000 readers and skyrocket your web development skills.' }}" />
        <meta name="twitter:image" content="{{ $image ?? 'https://i.useflipp.com/gw6mxpkgy4v8.png?title=' . urlencode($title ?? '') . '&body=' . urlencode($description ?? '') . '&watermark=useflipp.com' }}" />
        <meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />
        <meta name="theme-color" content="#f9fafb" />

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css'])

        @livewireStyles

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" />

        @vite(['resources/js/app.js'])

        @if (app()->isProduction() && auth()->id() !== 1)
            <script
                defer src="https://api.pirsch.io/pirsch-extended.js"
                id="pirschextendedjs"
                data-code="5N2hIsUQsCVX1LQtvPdJ3AGwQZHGxtt5"
                data-disable-page-views
            ></script>
        @endif

        <x-feed-links />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/img/apple-touch-icon.jpg') }}" />
        <link rel="icon" type="image/jpeg" sizes="16x16" href="{{ Vite::asset('resources/img/16x16.jpg') }}" />
        <link rel="icon" type="image/jpeg" sizes="32x32" href="{{ Vite::asset('resources/img/32x32.jpg') }}" />
        <link rel="icon" type="image/jpeg" sizes="48x48" href="{{ Vite::asset('resources/img/48x48.jpg') }}" />
        <link rel="icon" type="image/jpeg" sizes="96x96" href="{{ Vite::asset('resources/img/96x96.jpg') }}" />

        <link rel="canonical" href="{{ $canonical ?? url()->current() }}" />
    </head>
    <body
        {{ $attributes->except(['description', 'image', 'title', 'canonical'])->merge([
            'class' => 'bg-gray-50 font-light',
        ]) }}
        x-data="{}"
    >
        <div class="flex flex-col min-h-screen">
            @if (! request()->routeIs('dummy-store.*', 'media-kit', 'openings.*', 'pouest', 'sponsors'))
                <div class="block text-sm text-white bg-gradient-to-r from-gray-900 to-gray-800">
                    <div class="container flex items-center justify-center gap-4 py-3 md:gap-8 md:max-w-screen-sm">
                        <div>
                            “Black Friday deals end soon, so <a wire:navigate.hover href="https://benjamincrozat.com/best-black-friday-deals-2023" class="font-medium underline">go check them out</a>!<br />
                            And as always, <a href="https://larajobs.com?utm_source=benjamincrozat&utm_medium=banner&utm_campaign=benjamincrozat" target="_blank" rel="noopener" class="font-medium underline">LaraJobs</a> has plenty of job offers for you!”
                        </div>

                        <img loading="lazy" src="https://www.gravatar.com/avatar/d58b99650fe5d74abeb9d9dad5da55ad?s=84" alt="Benjamin Crozat" class="rounded-full w-[32px] md:w-[34px] h-[32px] md:h-[34px]" />
                    </div>
                </div>
            @endif

            @empty($hideNavigation)
                <x-navigation class="mt-4" />
            @endempty

            <main>
                {{ $slot }}
            </main>

            @empty($hideFooter)
                <div class="mt-16"></div>

                <x-footer class="flex-grow bg-gradient-to-r from-gray-200/[.35] to-gray-200/[.15]" />
            @endempty
        </div>

        @livewireScriptConfig
    </body>
</html>
