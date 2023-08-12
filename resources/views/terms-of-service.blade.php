<x-app>
    <div class="!container content mt-8 md:mt-16">
        {!! str(file_get_contents(resource_path('markdown/terms-of-service.md')))->marxdown() !!}
    </div>

    <div class="mt-8 bg-gray-900 dark:bg-black sm:mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
