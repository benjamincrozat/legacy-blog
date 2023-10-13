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
        <p>There are no job offers yet. Do you have a business? <a wire:navigate.hover href="{{ route('openings.create') }}">Post yours</a>! Or go check <a href="https://larajobs.com?utm_source=benjamincrozat&utm_medium=recommendation&utm_campaign=benjamincrozat">LaraJobs</a>!</p>
    @endif
</x-app>
