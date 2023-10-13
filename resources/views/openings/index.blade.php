<x-app
    title="Find your dream job as a web developer"
    description="I gather tons of job offers from various sources and list them in one digestible list."
>
    <h1 class="container mt-16 font-bold text-center md:max-w-screen-sm text-4xl/none lg:text-5xl/none">
        <x-icon-employees class="h-24 mx-auto" />
        <div class="mt-4">Find your <span class="text-transparent bg-gradient-to-r from-purple-400 to-purple-300 bg-clip-text">dream job</span> as a web&nbsp;developer</div>
    </h1>

    @if ($openings->isNotEmpty())
        <x-section class="container mt-16">
            <x-slot:title class="font-bold text-center text-2xl/tight md:text-3xl/tight">
                @choice(':count job offer is available|:count job offers are available for web developers', $openings->count())
            </x-slot:title>

            <div class="mt-8">
                <ul class="grid gap-16 md:grid-cols-2">
                    @foreach ($openings as $opening)
                        <li>
                            <x-opening :opening="$opening" />
                        </li>
                    @endforeach
                </ul>
            </div>
        </x-section>
    @else
        <div class="container mt-8 text-center lg:max-w-screen-md">
            <p class="text-2xl">
                There are no job offers at the moment.
            </p>

            <p class="mt-8 text-2xl">
                Do you have a business? Tons of developers are waiting!
            </p>

            <x-button :href="route('openings.create')" class="px-6 mt-10 text-white bg-orange-400">
                Post your job offer
            </x-button>
        </div>
    @endif
</x-app>
