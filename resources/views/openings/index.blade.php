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
                @choice(':count job offer is available|:count job offers are available', $openings->count())
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
            Wait, there are no job offers at the moment!
        </p>

        <p class="mt-16 font-bold text-center text-xl/tight md:text-2xl/tight">Meanwhile…</p>

        <div class="container mt-16 sm:text-xl lg:max-w-screen-md">
            <p class="font-bold text-xl/tight md:text-2xl/tight">Developers,<br /> get ready to be interviewed.</p>
            <x-icon-checklist class="float-right w-16 h-16 mt-1 mb-8 ml-8 -mr-4 text-green-500 md:mb-16 md:ml-16 md:w-24 md:h-24" />
            <p class="mt-4">If you need guidance on how to put the odds in your favor, you should read my article "<a wire:navigate.hover href="/laravel-interview-questions" class="text-blue-600 underline">Laravel interview questions and answers</a>."</p>
        </div>

        <div class="container mt-16 sm:text-xl lg:max-w-screen-md">
            <p class="font-bold text-xl/tight md:text-2xl/tight">Business owners,<br /> find a developer, now!</p>
            <x-icon-interview class="float-right w-16 h-16 mt-1 mb-8 ml-8 text-green-500 md:mb-16 md:ml-16 md:w-24 md:h-24" />
            <p class="mt-4">My blog is visited by 50,000 Laravel developers each month. This is the right place to find your ideal candidate.</p>
            <x-button href="{{ route('openings.create') }}" class="inline-block px-6 mt-8 text-base text-white bg-orange-400">
                Post your job offer
            </x-button>
        </div>
    @endif
</x-app>
