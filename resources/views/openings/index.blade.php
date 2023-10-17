<x-app
    title="Find your dream job as a web developer"
    description="I gather tons of job offers from various sources and list them in one digestible list."
>
    <div class="container mt-8 lg:max-w-screen-md">
        <x-breadcrumb>
            Jobs
        </x-breadcrumb>

        <h1 class="mt-8 font-bold text-center text-4xl/none lg:text-5xl/none">
            <x-icon-employees class="h-24 mx-auto" />
            <div class="mt-4">Find your <span class="text-transparent bg-gradient-to-r from-purple-400 to-purple-300 bg-clip-text">dream job</span> as a web&nbsp;developer</div>
        </h1>
    </div>

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
        <p class="container mt-8 text-2xl text-center lg:max-w-screen-md">
            There are no job offers at the moment.
        </p>
    @endif
</x-app>
