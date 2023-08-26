<x-app title="Terms of service">
    <x-section class="container mt-8 lg:max-w-screen-md">
        <x-prose>
            {!! Str::markdown(file_get_contents(resource_path('markdown/terms.md'))) !!}
        </x-prose>
    </x-section>
</x-app>
