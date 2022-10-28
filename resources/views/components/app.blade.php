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

        @if (app()->isProduction())
            <script defer src="https://save-tonight-hey-jude.benjamincrozat.com/script.js" data-site="{{ config('services.fathom.site_id') }}"></script>
        @endif
    </head>
    <body class="bg-gray-50 font-lighttext-gray-600" x-data>
        <div class="bg-gradient-to-r from-gray-800 to-gray-600 border-b text-gray-300 text-sm">
            <div class="container grid sm:grid-cols-3 items-center gap-4 sm:gap-8 py-4">
                <p class="sm:col-span-2 leading-tight text-center sm:text-left sm:text-base">
                    <strong class="font-bold text-white">10+ years of experience</strong> at the service of <strong class="font-bold text-white">your</strong>&nbsp;business.
                </p>

                <a href="mailto:benjamincrozat@me.com" @click="window.fathom?.trackGoal('EWIGDNLB', 0)" class="bg-gradient-to-b from-indigo-300 to-indigo-400 sm:col-span-1 font-bold leading-tight hover:opacity-50 px-3 py-2 rounded shadow-md shadow-blue-900/10 text-center text-white transition-opacity">
                    Get your Laravel consultant
                </a>
            </div>
        </div>

        <div class="flex flex-col min-h-screen mt-8">
            {{ $slot }}

            <div {{ $attributes->merge(['class' => 'bg-gray-900 flex-grow']) }}>
                <footer class="container py-8 text-gray-400 text-sm" x-intersect="window.fathom?.trackGoal('08VVENFW', 0)">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('home') }}" class="translate-y-[2px] tracking-widest uppercase">
                            Benjamin Crozat
                        </a>

                        <ul class="flex items-center gap-1 sm:gap-2 text-gray-300">
                            <li>
                                <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-white transition-all" @click="window.fathom?.trackGoal('COYELHY0', 0);">
                                    <span class="sr-only">GitHub</span>
                                    <x-icon-github class="fill-current w-6 sm:w-8 h-6 sm:h-8" />
                                </a>
                            </li>

                            <li>
                                <a href="https://www.linkedin.com/in/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-white transition-all" @click="window.fathom?.trackGoal('COYELHY0', 0);">
                                    <span class="sr-only">LinkedIn</span>
                                    <x-icon-linkedin class="fill-current w-6 sm:w-8 h-6 sm:h-8" />
                                </a>
                            </li>

                            <li>
                                <a href="https://twitter.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-white transition-all" @click="window.fathom?.trackGoal('COYELHY0', 0);">
                                    <span class="sr-only">Twitter</span>
                                    <x-icon-twitter class="fill-current w-6 sm:w-8 h-6 sm:h-8" />
                                </a>
                            </li>
                        </ul>
                    </div>

                    <p class="mt-8 text-center">
                        Hosting by <a href="https://m.do.co/c/58bbdf89fc72" target="_blank" rel="nofollow noopener noreferrer" class="border-b border-gray-700 text-gray-300 hover:text-white transition-colors">DigitalOcean</a>, analytics by <a href="https://usefathom.com/ref/JTPOCN" target="_blank" rel="nofollow noopener noreferrer" class="border-b border-gray-700 text-gray-300 hover:text-white transition-colors">Fathom&nbsp;Analytics</a> and syntax highlighting by <a href="https://torchlight.dev" target="_blank" rel="nofollow noopener noreferrer" class="border-b border-gray-700 text-gray-300 hover:text-white transition-colors">Torchlight</a>.
                    </p>

                    <p class="leading-relaxed mt-8 text-center text-gray-600 text-xs tracking-widest uppercase">
                        © Benjamin Crozat {{ date('Y') }}. All&nbsp;rights&nbsp;reserved.
                    </p>
                </footer>
            </div>
        </div>

        <x-status />
    </body>
</html>
