<x-app
    title="A Laravel developer for hire: Benjamin Crozat"
    description=""
    class="!bg-gray-900 text-gray-300"
>
    <div class="bg-gradient-to-b from-black/30 to-gray-900 pt-4">
        <ul class="flex items-center justify-end gap-2 sm:gap-1 mr-4">
            <li class="border-r border-gray-700 mr-4 pr-4">
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>

            <li>
                <a
                    href="https://github.com/benjamincrozat"
                    target="_blank"
                    rel="noopener noreferrer"
                    @click="window.fathom?.trackGoal('COYELHY0', 0)"
                >
                    <span class="sr-only">GitHub</span>
                    <x-icon-github class="fill-current text-white w-8 h-8 sm:w-6 sm:h-6" />
                </a>
            </li>

            <li>
                <a
                    href="https://www.linkedin.com/in/benjamincrozat"
                    target="_blank"
                    rel="noopener noreferrer"
                    @click="window.fathom?.trackGoal('COYELHY0', 0)"
                >
                    <span class="sr-only">LinkedIn</span>
                    <x-icon-linkedin class="fill-current text-white w-8 h-8 sm:w-6 sm:h-6" />
                </a>
            </li>

            <li>
                <a
                    href="https://twitter.com/benjamincrozat"
                    target="_blank"
                    rel="noopener noreferrer"
                    @click="window.fathom?.trackGoal('COYELHY0', 0)"
                >
                    <span class="sr-only">Twitter</span>
                    <x-icon-twitter class="fill-current text-white w-8 h-8 sm:w-6 sm:h-6" />
                </a>
            </li>
        </ul>

        <div class="container">
            <div class="mt-16 text-center">
                <img
                    loading="lazy"
                    src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=256"
                    width="128"
                    height="128"
                    alt="Benjamin Crozat"
                    class="inline rounded-full"
                />

                <div class="font-normal mt-8 text-xl sm:text-2xl md:text-3xl text-white">
                    @lang('Benjamin Crozat')
                </div>

                <h1 class="font-bold mt-2 text-3xl md:text-5xl">
                    <span class="bg-clip-text bg-gradient-to-r from-orange-600 to-orange-300 inline-block">
                        <span class="text-transparent">@lang('A Laravel developer for hire')</span>
                    </span>
                </h1>

                <div class="mt-8 sm:mt-16 text-xl sm:text-2xl md:text-3xl text-purple-400">
                    <span class="bg-clip-text bg-gradient-to-r from-purple-300 to-purple-400 inline-block">
                        <span class="text-transparent">
                            @lang('10+ years of experience at the service of your business.')
                        </span>
                    </span>
                </div>

                <x-icon-technologies class="max-h-10 mt-8 mx-auto" />
            </div>

            <ul class="grid place-content-center gap-4 mt-8 sm:mt-16 md:text-xl">
                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                    <span><span>@lang('I do both front-end and back-end')</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                    <span><span>@lang('I have 8+ years of expertise on Laravel')</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                    <span><span>@lang("I write easy to understand code using documented best practices")</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                    <span><span>@lang('I write tested code that anyone can change later without breaking it')</span>
                </li>
            </ul>

            <a href="#calendar" class="bg-gradient-to-r from-orange-600 to-orange-700 duration-500 font-bold hover:-hue-rotate-90 leading-none mt-16 mx-auto px-8 py-4 rounded table text-center md:text-xl transition-[filter]">
                @lang('Book a call')
            </a>
        </div>
    </div>

    <div class="bg-gradient-to-b from-gray-900 to-black/30 mt-16 md:mt-32">
        <div class="container max-w-[1024px]">
            <h2 class="font-bold text-2xl md:text-4xl text-center">
                @lang('The Laravel development services I provide')
            </h2>

            <div class="grid sm:grid-cols-2 gap-4 mt-8 md:mt-16">
                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-speedometer class="absolute top-0 -left-1 fill-current w-12 h-12 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-emerald-900/50 blur-lg w-12 h-12 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-emerald-500">@lang("Technical debt won't be part of the equation.")</div>
                        <div class="font-thin mt-2">@lang("I write tests for my code to make it easier to change later.")</div>
                    </div>
                </div>

                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-foundations class="absolute top-0 -left-1 fill-current w-10 h-10 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-blue-900/50 blur-lg w-10 h-10 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-blue-400">@lang('Invest your money on experience.')</div>
                        <div class="font-thin mt-2">@lang("Don't waste it later on endless maintenance because you only hired juniors.")</div>
                    </div>
                </div>

                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-muscle class="absolute top-0 left-1 fill-current w-10 h-10 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-red-900/75 blur-lg w-10 h-10 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-red-400">@lang('Senior developers focus on what matters.')</div>
                        <div class="font-thin mt-2">@lang('I understand how business works. I give you results as fast as possible.')</div>
                    </div>
                </div>

                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-server class="absolute top-0 -left-px fill-current w-10 h-10 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-purple-900/50 blur-lg w-10 h-10 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-purple-400">@lang('I can work in a serverless environment')</div>
                        <div class="font-thin mt-2">@lang('Used right, serverless can drastically cut costs and handle an infinite amount of traffic.')</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-16 md:mt-32">
            <div class="flex flex-wrap lg:flex-nowrap lg:items-center gap-16 text-gray-400">
                <div>
                    <div class="text-3xl text-white">
                        @lang('I write on my blog about<br /> the art of crafting web applications')
                    </div>

                    <div class="mt-4 text-xl">
                        @lang('As a self-taught developer, giving back to the community is the least I can do.')
                    </div>

                    <div class="mt-4 text-xl">
                        @lang('The blog generates <strong class="text-gray-300">+15K visits per month</strong> and <strong class="text-gray-300">+10K of them are from Google</strong>.')
                    </div>

                    <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-blue-500 duration-500 font-normal hover:hue-rotate-90 inline-block mt-10 px-8 py-3 rounded text-white transition-[filter]">
                        @lang('Read my blog')
                    </a>
                </div>

                <div class="mx-auto w-4/5 lg:w-1/2">
                    <img
                        src="{{ Vite::asset('resources/img/screenshot.jpg') }}"
                        width="1280"
                        height="1113"
                        alt="@lang('The blog of Benjamin Crozat')"
                        class="aspect-square inline object-cover object-top relative rotate-2 rounded-xl z-10"
                    />
                </div>
            </div>
        </div>

        <div
            id="calendar"
            class="container max-w-[1024px] mt-16 md:mt-32 scroll-mt-8"
        >
            <h2 class="font-bold text-2xl md:text-4xl text-center">
                @lang('Book a call')
            </h2>

            <div class="mt-8">
                <div id="savvycal" class="shadow-xl"></div>

                <script>
                    window.addEventListener('load', () => {
                        window.SavvyCal=window.SavvyCal||function(){(SavvyCal.q=SavvyCal.q||[]).push(arguments)}
                    })
                </script>

                <script defer src="https://embed.savvycal.com/v1/embed.js"></script>

                <script>
                    window.addEventListener('load', () => {
                        SavvyCal('init')
                        SavvyCal('inline', { link: 'benjamincrozat/ask-me-anything', selector: '#savvycal', theme: 'dark' })
                    })
                </script>
            </div>
        </div>
    </div>

    <div class="bg-black/30 pb-16 pt-16 md:pt-32" x-intersect="window.fathom?.trackGoal('GNBHJW7B', 0)">
        <div class="container lg:max-w-screen-md">
            <div class="prose prose-a:decoration-orange-400/30 prose-a:font-light prose-a:text-orange-400 prose-a:underline prose-a:underline-offset-4 prose-headings:text-white prose-strong:text-white text-gray-300 max-w-none">
                <h2 class="md:text-center">@lang('What to look for when hiring a dedicated Laravel developer?')</h2>

                <div class="not-prose">
                    <ul class="grid gap-1">
                        <li>
                            <a href="#section-1" class="decoration-orange-400/30 hover:decoration-orange-300/30 inline-flex items-center gap-1 text-orange-400 hover:text-orange-300 transition-colors underline underline-offset-4">
                                <x-heroicon-o-hashtag class="flex-shrink-0 inline opacity-50 translate-y-px w-3 h-3" />
                                @lang('Check for real-world Laravel experience')
                            </a>
                        </li>

                        <li>
                            <a href="#section-2" class="decoration-orange-400/30 hover:decoration-orange-300/30 inline-flex items-center gap-1 text-orange-400 hover:text-orange-300 transition-colors underline underline-offset-4">
                                <x-heroicon-o-hashtag class="flex-shrink-0 inline opacity-50 translate-y-px w-3 h-3" />
                                @lang("Don't hire a senior Laravel developers to work on basic tasks")
                            </a>
                        </li>

                        <li>
                            <a href="#section-3" class="decoration-orange-400/30 hover:decoration-orange-300/30 inline-flex items-center gap-1 text-orange-400 hover:text-orange-300 transition-colors underline underline-offset-4">
                                <x-heroicon-o-hashtag class="flex-shrink-0 inline opacity-50 translate-y-px w-3 h-3" />
                                @lang("Get a Laravel developer who's a good communicator")
                            </a>
                        </li>
                    </ul>
                </div>

                <h3 id="section-1" class="scroll-mt-4">Check for real-world Laravel developer experience</h3>

                <p>If you don't have time to coach young developers, make sure they have real-world experience.</p>

                <p><strong>People freshly out of school won't be able to be proficient on most projects</strong> (of course, some passionate developers are the exception to this rule).</p>

                <p>Here's what makes a good candidate:</p>

                <ul>
                    <li>Make sure they have at least one successful experience. It doesn't matter if this experience has been acquired working on open-source projects or in a company;</li>
                    <li>Developers with tech culture and knowledge about the latest trends tend to be curious and, therefore, more willing to give everything they have to solve your problems;</li>
                    <li>Even an inactive GitHub account is a good sign. A basic comprehension of open source reinforces the previous point.</li>
                </ul>

                <h3 id="section-2" class="scroll-mt-4">Don't hire a senior Laravel developers to work on basic tasks</h3>

                <p>A senior developer is expensive, and for good reasons. Years of experience made them a master at what they do. <strong>You want them to work on something other than simple interface changes or bug fixes</strong>, or they'll get bored and leave as soon as possible.</p>

                <p>Senior developers want to work on complex issues that will make your project easier to maintain, more stable, and more profitable in the long run.</p>

                <p>That's exactly what I do after more than 10 years in this industry. Clients book me so I can help their team head in the right direction.</p>

                <h3 id="section-3" class="scroll-mt-4">Get a Laravel developer who's a good communicator</h3>

                <p><strong>Communication is critical for any relationship</strong>. In a working environment, you need a clear view of the progression to plan what's next.</p>

                <p>And you also need to know when things are stuck. Sometimes, problems are tough to solve, and deciding to get someone else involved as soon as possible to help you move forward is crucial.</p>
            </div>
        </div>
    </div>
</x-app>
