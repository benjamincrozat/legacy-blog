<x-app>
    <x-section class="container mt-16 lg:max-w-screen-md">
        <x-prose>
            {!! Str::markdown(file_get_contents(resource_path('markdown/privacy.md'))) !!}
        </x-prose>
    </x-section>
</x-app>
