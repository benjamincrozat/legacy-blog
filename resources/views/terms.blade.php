<x-app>
    <x-section class="container mt-16 lg:max-w-screen-md">
        <x-prose>
            {!! Str::markdown(file_get_contents(resource_path('markdown/terms.md'))) !!}
        </x-prose>
    </x-section>
</x-app>
