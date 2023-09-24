<x-app
    title="Instantly migrate PHPUnit tests to Pest"
    description="Migrate your PHPUnit tests to Pest using a web page instead of a CLI."
    image="{{ Vite::asset('resources/img/pouest-banner.jpg') }}"
    :hide-navigation="true"
    :hide-footer="true"
    class="text-gray-300 bg-gray-900"
>
    <div class="container mt-8 mb-16 lg:max-w-screen-md">
        <div class="text-center">
            <img loading="lazy" src="{{ Vite::asset('resources/img/pouest.jpg') }}" alt="Instantly migrate PHPUnit tests to Pest" class="inline-block w-16 h-16 mx-auto shadow-lg rounded-2xl" />

            <h1 class="mt-6 text-xl font-bold text-white sm:text-2xl md:text-3xl">
                Instantly migrate PHPUnit tests to Pest
            </h1>

            <div class="sm:text-lg md:text-xl">A tool created by <a wire:navigate.hover href="{{ route('home') }}" class="decoration-[#f471b5]/50 text-[#f471b5] underline underline-offset-4">Benjamin Crozat</a> and based on <a href="https://packagist.org/packages/pestphp/pest-plugin-drift" target="_blank" rel="nofollow noopener" class="decoration-[#f471b5]/50 text-[#f471b5] underline underline-offset-4">pestphp/pest-plugin-drift</a></div>
        </div>

        <div class="mt-8 md:mt-16">
            <livewire:pouest :lazy="true" />
        </div>

        <x-prose class="mt-8 md:mt-16 prose-invert prose-a:decoration-[#f471b5]/50 prose-a:text-[#f471b5] prose-a:underline-offset-4">
            <h2>What is Pest?</h2>
            <p><a href="https://pestphp.com" target="_blank" rel="nofollow noopener">Pest</a> is a revolutionary testing framework with a focus on simplicity. It's been meticulously designed to bring back the joy of testing in PHP and go even further than what you can do with PHPUnit.</p>

            <h2>Why switch to Pest?</h2>
            <p>Switching to Pest brings several benefits to your codebase:</p>
            <ul>
                <li>Pest is officially supported by Laravel.</li>
                <li>Your tests become more concise and readable.</li>
                <li>The barrier to entry is lower, thanks to reduced boilerplate and a less intimidating syntax.</li>
                <li>In addition to traditionnal testing, Pest can also help you enforce coding standards thanks to <a href="https://pestphp.com/docs/arch-testing" target="_blank" rel="nofollow noopener">its architecture testing helpers</a>. This will faciliate the collaboration with your team.</li>
            </ul>

            <h2>Is this tool enough to migrate my test suite?</h2>
            <p>The <a href="https://packagist.org/packages/pestphp/pest-plugin-drift" target="_blank" rel="nofollow noopener">pestphp/pest-plugin-drift</a> used under the hood performs a basic conversion, which will help you get started.</p>
            <p>But if you are looking for a miracle solution, I created an even more advanced tool called <a href="https://smousss.com">Smousss</a>, which is based on artificial intelligence and can migrate your test suite way better than any developer.</p>
        </x-prose>
    </div>
</x-app>
