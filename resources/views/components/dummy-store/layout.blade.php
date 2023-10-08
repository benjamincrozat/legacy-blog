<html class="text-gray-600 bg-gray-50">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (app()->isProduction() && auth()->id() !== 1)
        <script
            defer src="https://api.pirsch.io/pirsch-extended.js"
            id="pirschextendedjs"
            data-code="5N2hIsUQsCVX1LQtvPdJ3AGwQZHGxtt5"
            data-disable-page-views
        ></script>
    @endif

    <div class="container py-16">
        {{ $slot }}
    </div>
</html>
