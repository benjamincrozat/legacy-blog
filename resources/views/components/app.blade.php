<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta name="description" content="{{ $description ?? 'Join more than 40,000 readers and skyrocket your web development skills.' }}" />
        <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
        <meta property="og:image" content="{{ $image ?? 'https://i.useflipp.com/gw6mxpkgy4v8.png?title=' . urlencode($title ?? '') . '&body=' . urlencode($description ?? '') . '&watermark=useflipp.com' }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:creator" content="@benjamincrozat" />
        <meta name="twitter:description" content="{{ $description ?? 'Join more than 40,000 readers and skyrocket your web development skills.' }}" />
        <meta name="twitter:image" content="{{ $image ?? 'https://i.useflipp.com/gw6mxpkgy4v8.png?title=' . urlencode($title ?? '') . '&body=' . urlencode($description ?? '') . '&watermark=useflipp.com' }}" />
        <meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css'])

        @livewireStyles

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/themes/prism-twilight.min.css" />

        @unless(app()->runningUnitTests())
            @googlefonts
            @googlefonts('handwriting')
        @endunless

        @vite(['resources/js/app.js'])

        @livewireScripts

        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/prism.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-bash.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-css-extras.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-css.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-git.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-http.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-ini.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-javascript.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-less.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-markup.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-php-extras.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-php.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-scss.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-sql.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-typescript.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-yaml.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Prism.languages['html'] = Prism.languages.markup
                Prism.languages['js'] = Prism.languages.javascript
            })
        </script>

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

        <meta name="theme-color" content="#f9fafb" />
    </head>
    <body
        {{ $attributes->except(['description', 'image', 'title', 'canonical'])->merge([
            'class' => 'bg-gray-50 font-light',
        ]) }}
        x-data="{}"
        x-init="$nextTick(() => Prism.highlightAll())"
    >
        <div class="flex flex-col min-h-screen">
            @if (! request()->routeIs('dummy-store.*', 'jobs.*', 'media-kit', 'sponsors'))
                <aside class="text-sm text-indigo-700 bg-indigo-50">
                    @if ($opening)
                        <a href="{{ $opening->link }}" class="container block py-3 text-center md:max-w-screen-sm">
                            <p>{{ $opening->company }} is looking for a <strong class="font-medium">{{ $opening->description }}</strong>! <x-heroicon-o-megaphone class="inline w-4 h-4 -translate-y-px" /></p>
                        </a>
                    @else
                        <a href="https://larajobs.com?utm_source=benjamincrozat&utm_medium=banner&utm_campaign=benjamincrozat" target="_blank" rel="noopener sponsored" class="container flex items-center justify-between gap-4 py-3 md:gap-8 lg:max-w-screen-md">
                            <span>
                                “Looking for your dream job? I recommend LaraJobs. <span class="font-medium underline">Find it now!</span>”
                            </span>

                            <img loading="lazy" src="https://www.gravatar.com/avatar/d58b99650fe5d74abeb9d9dad5da55ad?s=256" alt="Benjamin Crozat" class="rounded-full w-[48px] h-[48px]" />
                        </a>
                    @endif
                </aside>
            @endif

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
                <x-footer class="flex-grow mt-16 bg-gradient-to-r from-gray-200/[.35] to-gray-200/[.15]" />
            @endempty
        </div>

        <x-status />
    </body>
</html>
