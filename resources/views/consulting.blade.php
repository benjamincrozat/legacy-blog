<x-app
    title="Hire a Laravel consultant for an audit"
    description="Book an expert Laravel developer, TODAY! Let me guide your team toward reliability and maintenability."
>
    <div class="bg-indigo-500 py-4 text-center text-indigo-50">
        <a href="{{ route('home') }}">
            <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
                Benjamin Crozat
            </span>

            <span class="block opacity-75 text-xs tracking-widest uppercase">
                Full-stack Laravel developer
            </span>
        </a>
    </div>

    <x-consulting.section class="bg-gradient-to-r from-indigo-500 to-indigo-400 text-indigo-50">
        <header class="flex items-center justify-between gap-8">
            <h1 class="hidden">Hire a Laravel consultant for an audit</h1>

            <h2 class="sm:font-thin text-xl sm:text-2xl md:text-4xl text-indigo-50">
                Book <span class="font-normal text-white">right now</span><br />
                10+ years of experience<br />
                with PHP and Laravel
            </h2>

            <div class="flex-shrink-0">
                <img
                    loading="lazy"
                    src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=300"
                    width="150"
                    height="150"
                    alt="Benjamin Crozat, a Laravel developer for hire"
                    class="inline rounded-full w-[96px] h-[96px] md:w-[115px] md:h-[115px]"
                />
            </div>
        </header>

        <p class="font-bold mt-8 text-white">
            Take back control of the technical side of your business.
        </p>

        <ul class="grid gap-2 mt-4">
            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                <span>Any question answered</span>
            </li>

            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                <span>I <strong class="font-bold text-white">pair program</strong> with your developers</span>
            </li>

            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                <span>See which best practices can <strong class="font-bold text-white">10x new team members' productivity</strong></span>
            </li>

            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                <span>Learn how you can <strong class="font-bold text-white">prevent regressions</strong></span>
            </li>

            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                <span>Finally, we set up <strong class="font-bold text-white">a tool that alerts you when your app fails in production</strong></span>
            </li>
        </ul>

        <a
            href="https://savvycal.com/benjamincrozat/3-hrs-consulting"
            class="bg-gradient-to-b from-white to-indigo-50 inline-flex items-center justify-center gap-2 font-normal sm:font-light mt-10 px-8 py-4 rounded shadow-xl shadow-indigo-900/[.15] text-base text-center text-indigo-400 w-full sm:w-auto"
            @click="window.fathom?.trackGoal('BEYT9BXR', 0)"
        >
            <span>Book <span class="font-bold">3 hours</span> for <span class="font-bold">$500</span></span>
            <span class="bg-indigo-100 font-bold px-3 py-1 rounded-full text-indigo-900/75 text-xs">17% off</span>
        </a>

        <p class="mt-4 text-center sm:text-left">
            Or start with <a href="https://savvycal.com/benjamincrozat/1-hr-consulting" class="border-b border-white/50 font-bold text-white">1 hour for $200</a>.
        </p>

        <p class="border-t border-indigo-400 mt-4 pt-4 text-center sm:text-left text-indigo-200 text-xs">
            100% money-back guarantee if I can't help you.
        </p>

        <div class="mt-16">
            <h3 class="font-bold text-xl text-center">
                These companies trusted me
            </h3>

            <ul class="flex flex-wrap items-center justify-center gap-x-12 gap-y-8 mt-8">
                <li>
                    <a href="https://www.doctissimo.fr" target="_blank" rel="nofollow noopener noreferrer" @click="window.fathom?.trackGoal('XODHVE6D', 0)">
                        <x-icon-doctissimo class="fill-current h-6 text-white" />
                        <span class="sr-only">Doctissimo</span>
                    </a>
                </li>

                <li>
                    <a href="https://www.iconosquare.com" target="_blank" rel="nofollow noopener noreferrer" @click="window.fathom?.trackGoal('XODHVE6D', 0)">
                        <x-icon-iconosquare class="fill-current h-8 text-white" />
                        <span class="sr-only">Iconosquare</span>
                    </a>
                </li>

                <li>
                    <a href="https://jetfly.com" target="_blank" rel="nofollow noopener noreferrer" @click="window.fathom?.trackGoal('XODHVE6D', 0)">
                        <x-icon-jetfly class="fill-current h-12 text-white" />
                        <span class="sr-only">Jetfly</span>
                    </a>
                </li>

                <li>
                    <a href="https://mym.fans" target="_blank" rel="nofollow noopener noreferrer" @click="window.fathom?.trackGoal('XODHVE6D', 0)">
                        <x-icon-mym class="fill-current h-6 text-white" />
                        <span class="sr-only">MYM</span>
                    </a>
                </li>

                <li>
                    <a href="https://qwant.com" target="_blank" rel="nofollow noopener noreferrer" @click="window.fathom?.trackGoal('XODHVE6D', 0)">
                        <x-icon-qwant class="fill-current w-16 text-white" />
                        <span class="sr-only">Qwant</span>
                    </a>
                </li>
            </ul>
        </div>
    </x-consulting.section>

    <div class="bg-indigo-50 text-indigo-900">
        <section
            class="container py-8 sm:py-16"
            x-intersect="window.fathom?.trackGoal('WSVGAGQR', 0)"
        >
            <h2 class="font-bold text-xl sm:text-2xl text-center text-indigo-400">
                <x-icon-connected-people class="inline-block fill-current w-12 h-12" />
                <div class="mt-4">The Laravel consulting services I provide</div>
            </h2>

            <ul class="grid sm:grid-cols-2 gap-12 mt-8 sm:mt-16">
                <li>
                    <x-icon-pair-programming class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-bold mt-4 text-indigo-400 text-xl">
                        Pair programming
                    </p>

                    <p class="mt-4">
                        Pair programming is the best way for Laravel developers to learn from each other, <strong class="font-semibold">fast</strong>.
                    </p>

                    <p class="mt-4">
                        Whatever your team needs to know about PHP and Laravel, I can show them.
                    </p>
                </li>

                <li>
                    <x-icon-best-practices class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-bold mt-4 text-indigo-400 text-xl">
                        Best practices
                    </p>

                    <p class="mt-4">
                        When everyone follows the framework's best practices, this is what happens:
                    </p>

                    <ul class="mt-4">
                        <li class="flex items-start gap-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[1.5px] w-5 h-5" />
                            You don't need to maintain a documentation.
                        </li>

                        <li class="flex items-start gap-2 mt-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[1.5px] w-5 h-5" />
                            Your developers always know where to go.
                        </li>

                        <li class="flex items-start gap-2 mt-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[1.5px] w-5 h-5" />
                            New hires will be productive from day one.
                        </li>
                    </ul>

                    <p class="mt-4">
                        It's time to leverage Laravel's power to over 9000!
                    </p>
                </li>

                <li>
                    <x-icon-automated-testing class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-bold mt-4 text-indigo-400 text-xl">
                        Automated testing
                    </p>

                    <p class="font-semibold mt-4">
                        Untested code is legacy code.
                    </p>

                    <p class="mt-4">
                        I can help your team write tests to:
                    </p>

                    <ul class="mt-4">
                        <li class="flex items-start gap-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[1.5px] w-5 h-5" />
                            Boost confidence each time they deploy something new.
                        </li>

                        <li class="flex items-start gap-2 mt-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[1.5px] w-5 h-5" />
                            Facilitate onboarding of new team members. They won't fear screwing everything up their first day.
                        </li>
                    </ul>
                </li>

                <li>
                    <x-icon-continuous-integration class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-bold mt-4 text-indigo-400 text-xl">
                        Continuous integration
                    </p>

                    <p class="mt-4">
                        Automatically and continuously deploy new code into production is a dream for any serious business that wants to move forward.
                    </p>

                    <p class="mt-4">
                        We can make it happen <strong class="font-semibold">without any infrastructure or DevOps cost</strong>.
                    </p>
                </li>

                <li>
                    <x-icon-errors-monitoring class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-bold mt-4 text-indigo-400 text-xl">Errors monitoring</p>

                    <p class="mt-4">
                        What if we could react fast any time a blocking bug occurs in production?
                    </p>

                    <p class="mt-4">
                        We can set up a tool that monitors and logs everything wrong happening on your applications instead of relying on user feedback.
                    </p>
                </li>
            </ul>

            <div class="mt-8 sm:mt-16 text-center">
                <a
                    href="https://savvycal.com/benjamincrozat/3-hrs-consulting"
                    class="bg-gradient-to-b from-emerald-400 to-emerald-500 inline-flex items-center justify-center gap-2 font-normal sm:font-light px-8 py-4 rounded shadow-xl shadow-emerald-600/[.15] text-base text-center text-emerald-50 w-full sm:w-auto"
                    @click="window.fathom?.trackGoal('BCXCNHU1', 0)"
                >
                    <span>Book <span class="font-bold text-white">3 hours</span> for <span class="font-bold text-white">$500</span></span>
                    <span class="bg-gradient-to-b from-emerald-900/50 to-emerald-800/50 font-bold px-3 py-1 rounded-full text-emerald-100 text-xs">17% off</span>
                </a>

                <p class="mt-4">
                    Or start with <a href="https://savvycal.com/benjamincrozat/1-hr-consulting" class="font-bold text-emerald-600 underline">1 hour for $200</a>.
                </p>
            </div>
        </section>
    </div>

    @if (false)
        <section class="container max-w-[1024px] py-8 sm:py-16">
            <h2 class="font-extrabold text-xl sm:text-2xl text-center text-indigo-400">
                <span class="text-gray-600">You will be satisfied</span><br />
                But don't take my word for it
            </h2>

            <div class="grid md:grid-cols-2 gap-4 mt-8">
                @foreach (range(1, 4) as $i)
                    <div class="bg-gray-200/50 p-6 rounded-lg text-gray-600">
                        <blockquote>
                            {{ fake()->sentences(mt_rand(2, 3), true) }}

                            <div class="flex items-center gap-4 mt-4">
                                <img src="https://i.pravatar.cc/30{{ $i }}" width="55" height="55" alt="{{ $name = fake()->name() }}" class="rounded-full" />

                                <cite>
                                    <span class="font-bold">{{ $name }}</span><br />
                                    from <span class="font-bold">{{ fake()->company() }}</span>
                                </cite>
                            </div>
                        </blockquote>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <div class="bg-indigo-50/30 text-indigo-900">
        <section
            class="container max-w-[768px] py-8 sm:py-16"
            x-intersect="window.fathom?.trackGoal('Q0JLQGBO', 0)"
        >
            <h2 class="font-bold text-xl sm:text-2xl text-center text-indigo-400">
                <x-icon-question-circle class="fill-current inline-block h-8 sm:w-12 h-8 sm:h-12" />
                <div class="mt-2">About me</div>
            </h2>

            <div class="flex flex-wrap md:flex-nowrap items-center md:justify-between gap-8 mt-8">
                <div class="order-2 md:order-none">
                    <p>My name is Benjamin Crozat. I'm a passionate <strong class="font-bold">full-stack PHP and Laravel developer from the south of France</strong> with 10+ years of experience.</p>

                    <p class="mt-4">I'm a self-taught developer and was immediately seduced by the freelancer life. I quickly became interested in helping companies to work better with web developers and technology.</p>
                </div>

                <div class="flex-shrink-0 order-1 md:order-none text-center md:text-left w-full md:w-auto">
                    <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=256" width="96" height="96" alt="Benjamin Crozat" class="inline rotate-2 rounded-full" />
                </div>
            </div>
        </section>
    </div>

    <div id="about" class="bg-indigo-500 flex-grow">
        <x-footer class="max-w-[1024px] text-indigo-100" />
    </div>
</x-app>
