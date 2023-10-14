<x-app
    title="Format and beautify your PHP code with Pint Express"
    description="Pint Express lets you use Laravel Pint to quickly format and beautify any PHP code snippet using the Laravel, PER, PSR-12, or Symfony coding style presets."
    :hide-navigation="true"
    :hide-footer="true"
    class="py-8"
>
    <div class="container lg:max-w-screen-md">
        <x-breadcrumb class="mb-7 md:mb-14">
            Format and beautify your PHP code with Pint Express
        </x-breadcrumb>

        <h1 class="text-2xl text-center sm:text-3xl md:text-4xl lg:text-5xl">Pint Express</h1>

        <h2 class="text-lg font-thin text-center sm:text-xl md:text-2xl lg:text-3xl">Format and beautify your PHP code</h2>
    </div>

    <x-section class="container mt-8 md:mt-16 lg:max-w-screen-md">
        <livewire:pint-express />
    </x-section>
</x-app>
