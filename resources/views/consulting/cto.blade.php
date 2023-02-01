<x-app
    title="Hire your on-demand virtual CTO."
    class="!bg-gray-900 text-gray-300"
>
    <div class="bg-gradient-to-b from-black/30 to-gray-900 pt-4">
        <ul class="flex items-center justify-end gap-1 mr-4">
            <li>
                <a
                    href="https://github.com/benjamincrozat"
                    target="_blank"
                    rel="noopener noreferrer"
                    @click="window.fathom?.trackGoal('COYELHY0', 0)"
                >
                    <span class="sr-only">GitHub</span>
                    <x-icon-github class="fill-current text-white w-6 h-6" />
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
                    <x-icon-linkedin class="fill-current text-white w-6 h-6" />
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
                    <x-icon-twitter class="fill-current text-white w-6 h-6" />
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
                    @lang('Not ready for full-time workforces?')
                </div>

                <h1 class="font-bold mt-2 text-3xl md:text-5xl">
                    <span class="bg-clip-text bg-gradient-to-r from-orange-600 to-orange-300 inline-block">
                        <span class="text-transparent">@lang('Hire your on-demand virtual CTO.')</span>
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
                    <span><span>@lang('Discover best practices that make new hires productive')</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                    <span><span>@lang('Stop losing sales over bad performances')</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                    <span><span>@lang('Prevent as many regressions as possible')</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                    <span><span>@lang('Be notified when your app fails in production')</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                    <span><span>@lang('Reduce cost due to suboptimal technical decisions.')</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                    <span><span>@lang('I will help you hire the best talents')</span>
                </li>
            </ul>

            <a href="#pricing" class="bg-gradient-to-r from-orange-600 to-orange-700 duration-500 font-bold hover:-hue-rotate-90 leading-none mt-16 mx-auto px-8 py-4 rounded table text-center md:text-xl transition-all">
                @lang('See pricing')
            </a>
        </div>
    </div>

    <div class="bg-gradient-to-b from-gray-900 to-black/30 mt-16 md:mt-32">
        <div class="container max-w-[1024px]">
            <h2 class="font-bold text-2xl md:text-4xl text-center">
                @lang('The best on-demand virtual CTO services')
            </h2>

            <div class="grid sm:grid-cols-2 gap-4 mt-8 md:mt-16">
                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-people class="absolute top-0 -left-1 fill-current w-12 h-12 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-orange-900/50 blur-lg w-12 h-12 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-orange-500">@lang('I help you hire the right talents.')</div>
                        <div class="font-thin mt-2">@lang('Having a CTO at your side when recruiting developers is crucial.')</div>
                    </div>
                </div>

                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-speedometer class="absolute top-0 -left-1 fill-current w-12 h-12 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-emerald-900/50 blur-lg w-12 h-12 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-emerald-500">@lang("Technical debt won't be part of the equation.")</div>
                        <div class="font-thin mt-2">@lang("Let's make sure you start on the right foot.")</div>
                    </div>
                </div>

                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-foundations class="absolute top-0 -left-1 fill-current w-10 h-10 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-blue-900/50 blur-lg w-10 h-10 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-blue-400">@lang('Invest your money on solid foundations.')</div>
                        <div class="font-thin mt-2">@lang("Don't waste it later on endless maintenance.")</div>
                    </div>
                </div>

                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-muscle class="absolute top-0 left-1 fill-current w-10 h-10 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-red-900/75 blur-lg w-10 h-10 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-red-400">@lang('Focus your developers on what matters.')</div>
                        <div class="font-thin mt-2">@lang('Because good execution is what gives value to ideas.')</div>
                    </div>
                </div>

                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-server class="absolute top-0 -left-px fill-current w-10 h-10 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-purple-900/50 blur-lg w-10 h-10 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-purple-400">@lang('Leverage inexpensive serverless solutions to scale later')</div>
                        <div class="font-thin mt-2">@lang('Imagine being worry-free the day you go viral or reach Product Market Fit.')</div>
                    </div>
                </div>

                <div class="bg-[#161e2e] leading-tight p-8 rounded-xl shadow-md text-white text-xl">
                    <div class="relative w-10 h-10 sm:w-12 sm:h-12">
                        <x-icon-robot class="absolute top-0 left-0 fill-current w-10 h-10 sm:w-12 sm:h-12 z-20" />
                        <div class="absolute top-0 left-0 bg-yellow-900/75 blur-lg w-10 h-10 sm:w-12 sm:h-12 z-10"></div>
                    </div>

                    <div class="mt-6">
                        <div class="text-yellow-400">@lang('Automate as much processes as possible.')</div>
                        <div class="font-thin mt-2">@lang('A business operating on its own can be a reality.')</div>
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
                        @lang('The blog generates <strong class="text-gray-300">+10K visits per month</strong> and <strong class="text-gray-300">more than half of them are from Google</strong>.')
                    </div>

                    <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-blue-500 duration-500 font-normal hover:hue-rotate-90 inline-block mt-10 px-8 py-3 rounded text-white transition-all">
                        @lang('Read my blog')
                    </a>
                </div>

                <div class="mx-auto w-4/5 lg:w-1/2">
                    <img src="{{ Vite::asset('resources/img/screenshot.jpg') }}" alt="@lang('The blog of Benjamin Crozat')" class="aspect-square inline object-cover object-top relative rotate-2 rounded-xl z-10" />
                </div>
            </div>
        </div>

        <div id="pricing" class="container max-w-[1024px] mt-16 md:mt-32 scroll-mt-8">
            <h2 class="font-bold text-2xl md:text-4xl text-center">
                @lang('Pricing')
            </h2>

            <div class="grid md:grid-cols-2 gap-4 mt-8">
                <div class="bg-[#161e2e] px-4 py-8 sm:p-8 rounded-xl shadow-xl">
                    <h2 class="font-bold text-xl text-center text-white">
                        @lang('Monthly')
                    </h2>

                    <p class="text-center text-sm">Unlimited requests in the scope of my services.</p>

                    <div class="mt-8 text-center">
                        <div class="inline-block relative text-white">
                            <div class="absolute top-1/2 left-0 font-thin text-3xl translate-x-[calc(-100%-.25rem)] -translate-y-1/2">
                                <x-icon-euro class="stroke-current w-8 h-8" />
                                <span class="sr-only">€</span>
                            </div>

                            <div class="absolute top-1/2 right-0 font-thin translate-x-[calc(100%+.5rem)] -translate-y-1/2">
                                per month
                            </div>

                            <div class="font-semibold text-5xl">
                                4,995
                            </div>
                        </div>
                    </div>

                    <p class="font-bold mt-8 text-base text-white">What you get:</p>

                    <ul class="grid gap-4 mt-4">
                        <li class="flex items-center gap-2">
                            <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                            <span>Audit of your project to pinpoint issues</span>
                        </li>

                        <li class="flex items-center gap-2">
                            <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                            <span>Best practices tailored to your team and project</span>
                        </li>

                        <li class="flex items-center gap-2">
                            <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                            <span>Help for writing automated tests</span>
                        </li>

                        <li class="flex items-center gap-2">
                            <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                            <span>Help to set up a tool to monitor errors</span>
                        </li>

                        <li class="flex items-center gap-2">
                            <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                            <span>Help to better leverage your infrastructure</span>
                        </li>

                        <li class="flex items-center gap-2">
                            <x-heroicon-o-check-circle class="md:translate-y-[-.5px] flex-shrink-0 text-emerald-600 w-5 md:w-6 h-5 md:h-6" />
                            <span>Help for interviewing developers</span>
                        </li>
                    </ul>

                    <a href="https://savvycal.com/benjamincrozat/get-started" class="bg-gradient-to-r from-orange-600 to-orange-700 duration-500 font-bold hover:-hue-rotate-90 leading-none mt-16 mx-auto px-8 py-4 rounded table text-center md:text-xl transition-all">
                        @lang('Get started')
                    </a>

                    <p class="border-t border-white/5 mt-8 pt-6 text-center text-gray-400">
                        Learn about my process and how I can help you. <a href="#calendar" class="decoration-orange-400/30 hover:decoration-orange-300/30 font-normal text-orange-400 hover:text-orange-300 transition-colors underline underline-offset-4">@lang('Book a call')</a>.
                    </p>
                </div>

                <div class="border-4 border-[#161e2e]/50 hidden md:block rounded-xl"></div>
            </div>
        </div>

        <div id="calendar" class="container max-w-[1024px] mt-16 md:mt-32 scroll-mt-8">
            <h2 class="font-bold text-2xl md:text-4xl text-center">
                @lang('Book a call')
            </h2>

            <div class="mt-8">
                <div id="savvycal" class="shadow-xl"></div>

                <script>window.SavvyCal=window.SavvyCal||function(){(SavvyCal.q=SavvyCal.q||[]).push(arguments)}</script>

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
                <h2 class="md:text-center">@lang('Frequently Asked Questions')</h2>

                <div class="not-prose">
                    <ul class="grid gap-1">
                        <li>
                            <a href="#section-1" class="decoration-orange-400/30 hover:decoration-orange-300/30 inline-flex items-center gap-1 text-orange-400 hover:text-orange-300 transition-colors underline underline-offset-4">
                                <x-heroicon-o-hashtag class="flex-shrink-0 inline opacity-50 translate-y-px w-3 h-3" />
                                @lang('Who are you?')
                            </a>
                        </li>

                        <li>
                            <a href="#section-2" class="decoration-orange-400/30 hover:decoration-orange-300/30 inline-flex items-center gap-1 text-orange-400 hover:text-orange-300 transition-colors underline underline-offset-4">
                                <x-heroicon-o-hashtag class="flex-shrink-0 inline opacity-50 translate-y-px w-3 h-3" />
                                @lang('What does CTO stands for?')
                            </a>
                        </li>

                        <li>
                            <a href="#section-3" class="decoration-orange-400/30 hover:decoration-orange-300/30 inline-flex items-center gap-1 text-orange-400 hover:text-orange-300 transition-colors underline underline-offset-4">
                                <x-heroicon-o-hashtag class="flex-shrink-0 inline opacity-50 translate-y-px w-3 h-3" />
                                @lang('What is a CTO?')
                            </a>
                        </li>

                        <li>
                            <a href="#section-4" class="decoration-orange-400/30 hover:decoration-orange-300/30 inline-flex items-center gap-1 text-orange-400 hover:text-orange-300 transition-colors underline underline-offset-4">
                                <x-heroicon-o-hashtag class="flex-shrink-0 inline opacity-50 translate-y-px w-3 h-3" />
                                @lang('Why should I hire a CTO?')
                            </a>
                        </li>

                        <li>
                            <a href="#section-5" class="decoration-orange-400/30 hover:decoration-orange-300/30 inline-flex items-center gap-1 text-orange-400 hover:text-orange-300 transition-colors underline underline-offset-4">
                                <x-heroicon-o-hashtag class="flex-shrink-0 inline opacity-50 translate-y-px w-3 h-3" />
                                @lang('When to hire a CTO?')
                            </a>
                        </li>
                    </ul>
                </div>

                <h3 id="section-1" class="scroll-mt-4">Who are you?</h3>

                <p>I'm a <strong>passionate full-stack PHP and Laravel developer</strong> from the south of France with 10+ years of experience.</p>

                <p>I write on <a href="https://benjamincrozat.com">my blog</a> about web development in general, with an emphasis on Laravel.</p>

                <p>I'm also active in the Laravel community <a href="https://twitter.com/benjamincrozat" target="_blank" rel="noopener noreferrer">on Twitter</a>.</p>

                <h3 id="section-2" class="scroll-mt-4">What does CTO stands for?</h3>

                <p><strong>CTO stands for Chief Technology Officer</strong>, and is responsible for the overall technology strategy of a company.</p>

                <h3 id="section-3" class="scroll-mt-4">What is a CTO?</h3>

                <p><strong>A CTO plays a key role in shaping the direction and success of a business.</strong></p>

                <p>Their job is to make sure that the technology used by a company is in line with its goals and objectives. They work closely with other members of the executive team, such as the CEO and CFO, to develop and implement technology-related plans and policies.</p>

                <p>Some of the key responsibilities of a CTO may include:</p>

                <ul>
                    <li><strong>Researching and evaluating new technologies</strong> that could benefit the company</li>
                    <li>Developing and <strong>implementing technology-related policies and procedures</strong></li>
                    <li><strong>Managing the company's IT department and staff</strong></li>
                    <li>Developing and <strong>managing technology budgets</strong></li>
                    <li><strong>Overseeing the development and maintenance of the company's website, software and other technology systems.</strong></li>
                </ul>

                <p>An on-demand virtual CTO should have a strong understanding of the technology industry and the latest trends and innovations.</p>

                <p>They should also have <strong>excellent leadership and communication skills</strong>, as they will need to be ready work with a variety of teams within any company.</p>

                <h3 id="section-4" class="scroll-mt-4">Why should I hire a virtual on-demand CTO?</h3>

                <p>By hiring your on-demand virtual CTO (me), you can <strong>benefit from the expertise and experience of a seasoned professional without the commitment of a full-time hire</strong>.</p>

                <p><strong>I can work with your team on an ongoing or project basis.</strong></p>

                <h3 id="section-5" class="scroll-mt-4">When to hire a CTO?</h3>

                <p>You should hire a CTO when <strong>you have critical and technological decisions</strong> to make.</p>

                <p>This will allow you to <strong>minimize technical debt over time</strong> due to inexperienced developers calling the shots.</p>

                <p>You might also need one <strong>when your business needs to scale</strong>. <strong>He should be able to audit your codebase</strong> and <strong>help you choose the most appropriate plan of action</strong>.</p>
            </div>
        </div>
    </div>
</x-app>
