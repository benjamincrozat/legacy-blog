<html class="text-gray-600 bg-gray-50">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container py-16">
        {{ $slot }}
    </div>
</html>
