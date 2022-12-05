<x-app
    title="Laravel developer for hire: Benjamin Crozat"
    description="Book an expert Laravel developer, TODAY! Let me guide your team toward reliability and maintenability."
    class="text-indigo-50"
>
    <div class="bg-indigo-500 py-4 text-center">
        <a href="{{ route('home') }}">
            <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
                Benjamin Crozat
            </span>

            <span class="block opacity-75 text-xs tracking-widest uppercase">
                Full-stack Laravel developer
            </span>
        </a>
    </div>

    <x-consulting.section class="bg-gradient-to-r from-indigo-500 to-indigo-400">
        <header class="flex items-center justify-between gap-4 sm:gap-8 md:gap-16">
            <h1 class="sm:font-thin text-xl sm:text-2xl md:text-4xl text-indigo-50">
                Book <span class="font-normal text-white">right now</span><br />
                10+ years of experience<br />
                with PHP and Laravel
            </h1>

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
            Take back control of your business.
        </p>

        <ul class="grid gap-2 mt-4">
            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                Any question answered
            </li>

            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                I pair program with your developers
            </li>

            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                See which best practices could improve new hires' onboarding time
            </li>

            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                Learn how you can prevent regressions
            </li>

            <li class="flex items-center gap-2">
                <x-heroicon-o-check-circle class="-translate-y-[.5px] flex-shrink-0 opacity-75 w-5 h-5" />
                Finally, we set up a tool that warns you when your app fails
            </li>
        </ul>

        <a
            href="https://savvycal.com/benjamincrozat/3-hrs-consulting"
            class="bg-gradient-to-b from-white to-indigo-50 inline-flex items-center justify-center gap-2 font-normal sm:font-light mt-10 px-8 py-4 rounded shadow-xl shadow-indigo-900/[.15] text-base text-center text-indigo-400 w-full sm:w-auto"
        >
            <span>Book <span class="font-bold">3 hours</span> for <span class="font-bold">$500</span></span>
            <span class="bg-gradient-to-b from-emerald-400/5 to-emerald-400/10 font-bold px-3 py-1 rounded-full text-emerald-400 text-xs">17% off</span>
        </a>

        <p class="mt-4 text-center sm:text-left">
            Or start with <a href="https://savvycal.com/benjamincrozat/1-hr-consulting" class="font-bold text-white underline">1 hour for $200</a>.
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

    <x-consulting.section
        class="bg-gradient-to-r from-indigo-100/50 to-indigo-200/50"
        x-intersect="window.fathom?.trackGoal('R7HDACGG', 0)"
    >
        <h2 class="font-bold text-xl sm:text-3xl text-center text-indigo-400">
            <x-icon-connected-dots class="inline-block fill-current w-12 sm:w-16 h-12 sm:h-16" />
            <div class="mt-4">An expert Laravel developer for your&nbsp;business</div>
        </h2>

        <ul class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-8 sm:mt-16">
            <li>
                <span class="block font-bold text-5xl sm:text-7xl text-indigo-400">15+</span>
                <span class="block text-indigo-900/50 text-lg sm:text-xl">years of experience</span>
            </li>

            <li>
                <span class="block font-bold text-5xl sm:text-7xl text-indigo-400">1M+</span>
                <span class="block text-indigo-900/50 text-lg sm:text-xl">lines of code</span>
            </li>

            <li>
                <span class="block font-bold text-5xl sm:text-7xl text-indigo-400">30+</span>
                <span class="block text-indigo-900/50 text-lg sm:text-xl">clients</span>
            </li>

            <li>
                <span class="block font-bold text-5xl sm:text-7xl text-indigo-400">100+</span>
                <span class="block text-indigo-900/50 text-lg sm:text-xl">web applications</span>
            </li>
        </ul>
    </x-consulting.section>

    <x-consulting.section
        class="bg-gradient-to-r from-indigo-50/50 to-indigo-100/50 text-indigo-900"
        x-intersect="window.fathom?.trackGoal('WSVGAGQR', 0)"
    >
        <h2 class="font-bold text-xl sm:text-3xl text-center text-indigo-400">
            <x-icon-connected-people class="inline-block fill-current w-12 sm:w-16 h-12 sm:h-16" />
            <div class="mt-4">Laravel consulting services I provide</div>
        </h2>

        <ul class="grid sm:grid-cols-2 gap-12 mt-8 sm:mt-16">
            <li>
                <x-icon-pair-programming class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                <p class="font-bold mt-4 text-indigo-400 text-lg sm:text-xl">
                    Pair programming
                </p>

                <p class="mt-4">
                    Pair programming is the best way for Laravel developers to learn from each other, <strong class="font-bold">fast</strong>.
                </p>

                <p class="mt-4">
                    Whatever your team needs to know about PHP and Laravel, I can show them.
                </p>
            </li>

            <li>
                <x-icon-best-practices class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                <p class="font-bold mt-4 text-indigo-400 text-lg sm:text-xl">
                    Best practices
                </p>

                <p class="mt-4">
                    When everyone follows the framework's best practices, this is what happens:
                </p>

                <ul class="mt-4">
                    <li class="flex items-start gap-2">
                        <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[3.5px] w-4 h-4" />
                        You don't need to maintain a documentation.
                    </li>

                    <li class="flex items-start gap-2 mt-2">
                        <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[3.5px] w-4 h-4" />
                        Your developers always knows where to go.
                    </li>

                    <li class="flex items-start gap-2 mt-2">
                        <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[3.5px] w-4 h-4" />
                        New hires will know where to go as well from day&nbsp;1.
                    </li>
                </ul>

                <p class="mt-4">
                    It's time to leverage Laravel's power to over 9000!
                </p>
            </li>

            <li>
                <x-icon-automated-testing class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                <p class="font-bold mt-4 text-indigo-400 text-lg sm:text-xl">
                    Automated testing
                </p>

                <p class="font-bold mt-4">
                    Untested code is legacy code.
                </p>

                <p class="mt-4">
                    I can help your team write tests to:
                </p>

                <ul class="mt-4">
                    <li class="flex items-start gap-2">
                        <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[3.5px] w-4 h-4" />
                        Be more confident each time they deploy something new.
                    </li>

                    <li class="flex items-start gap-2 mt-2">
                        <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[3.5px] w-4 h-4" />
                        Facilitate the onboarding of new team members. They won't fear breaking something they don't know.
                    </li>
                </ul>
            </li>

            <li>
                <x-icon-continuous-integration class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                <p class="font-bold mt-4 text-indigo-400 text-lg sm:text-xl">
                    Continuous integration
                </p>

                <p class="mt-4">
                    Automatically and continuously deploying new code into production is a dream for any serious business that wants to please its customers.
                </p>

                <p class="mt-4">
                    We can make it happen <strong class="font-bold">without any infrastructure cost</strong>.
                </p>
            </li>

            <li>
                <x-icon-errors-monitoring class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                <p class="font-bold mt-4 text-indigo-400 text-lg sm:text-xl">Errors monitoring</p>

                <p class="mt-4">
                    What if we could <strong class="font-bold">prevent</strong> your company to loose even more money?
                </p>

                <p class="mt-4">
                    We can set up a tool that monitors and logs everything wrong happening on your web applications instead of relying on feedback.
                </p>
            </li>
        </ul>

        <div class="mt-8 sm:mt-16 text-center">
            <a
                href="https://savvycal.com/benjamincrozat/3-hrs-consulting"
                class="bg-gradient-to-r from-emerald-400 to-emerald-500 inline-block px-8 py-4 rounded shadow-md text-center text-xl text-white"
                @click="window.fathom?.trackGoal('BCXCNHU1', 0)"
            >
                Book <span class="font-bold">3 hours</span> for <span class="line-through">$600</span> <span class="font-bold">$500</span>
                <span class="block text-sm">And save 17%!</span>
            </a>

            <p class="mt-4">
                Or start with <a href="https://savvycal.com/benjamincrozat/1-hr-consulting" class="font-bold text-indigo-400 underline">1 hour for $200</a>.
            </p>
        </div>
    </x-consulting.section>

    <x-consulting.section
        class="bg-gradient-to-r from-indigo-100/50/[.9] to-indigo-200/50/[.9] text-indigo-900"
        x-intersect="window.fathom?.trackGoal('Q0JLQGBO', 0)"
    >
        <h2 class="font-bold text-xl sm:text-3xl text-center text-indigo-400">
            <x-icon-question-circle class="fill-current inline-block w-12 sm:w-16 h-12 sm:h-16" />
            <div class="mt-4">About me</div>
        </h2>

        <div class="flex flex-wrap md:flex-nowrap items-center md:justify-between gap-8 mt-8 sm:text-lg md:text-xl">
            <div class="order-2 md:order-none">
                <p>My name is Benjamin Crozat. I'm a passionate <strong class="font-bold">full-stack PHP and Laravel developer from the south of France</strong> with 10+ years of experience.</p>

                <p class="mt-4">I'm a self-taught developer and was immediately seduced by the freelancer life. I quickly became interested in helping companies to work better with web developers and technology.</p>
            </div>

            <div class="flex-shrink-0 order-1 md:order-none text-center md:text-left w-full md:w-auto">
                <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=256" width="128" height="128" alt="Benjamin Crozat" class="inline rotate-2 rounded-full" />
            </div>
        </div>
    </x-consulting.section>

    <div id="about" class="bg-indigo-500 flex-grow">
        <x-footer class="text-indigo-100" />
    </div>
</x-app>
