<x-app
    title="Hire an expert Laravel developer. A CTO on-demand."
    description="Book your Laravel CTO, TODAY. Benjamin Crozat is a Laravel developer with 10+ years of experience."
    x-data="{ open: false }"
>
    <div class="bg-gradient-to-r from-indigo-500 to-indigo-400 pb-16 pt-6 text-indigo-50">
        <nav class="container flex items-center justify-between">
            <x-icon-logo class="h-8 md:h-9" />

            <a href="{{ route('home') }}" class="border border-white/50 px-3 py-1 rounded text-xs">
                Read my blog
            </a>
        </nav>

        <div class="container mt-16">
            <h1 class="leading-tight text-lg sm:text-xl md:text-2xl text-center text-indigo-100">
                <span class="font-medium text-white">Hire a Laravel expert</span>.<br />
                On-demand CTO with 10+&nbsp;years&nbsp;of&nbsp;experience.
            </h1>
        </div>

        <div class="container">
            <ul class="grid gap-4 mt-8 sm:text-lg md:text-xl">
                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="flex-shrink-0 text-emerald-400 w-5 h-5" />
                    <span>I answer any questions you have</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="flex-shrink-0 text-emerald-400 w-5 h-5" />
                    <span>Discover best practices that make new hires productive</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="flex-shrink-0 text-emerald-400 w-5 h-5" />
                    <span>Stop losing sales over bad performances</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="flex-shrink-0 text-emerald-400 w-5 h-5" />
                    <span>Prevent as many regressions as possible</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="flex-shrink-0 text-emerald-400 w-5 h-5" />
                    <span>Be notified when your app fails in production</span>
                </li>

                <li class="flex items-center gap-2">
                    <x-heroicon-o-check-circle class="flex-shrink-0 text-emerald-400 w-5 h-5" />
                    <span>Reduce cost due to suboptimal technical decisions.</span>
                </li>
            </ul>
        </div>

        <div class="container max-w-screen-sm">
            <div class="border border-white/30 flex flex-wrap sm:flex-nowrap items-center justify-center sm:justify-between gap-6 mt-16 p-6 rounded-lg">
                <div class="order-2 sm:order-none">
                    <p class="text-indigo-100">
                        <strong class="font-medium text-white">Let's discuss</strong> about your project, your goals and how I can help. I speak <strong class="font-medium text-white">English</strong> and <strong class="font-medium text-white">French</strong>.
                    </p>

                    <a href="https://savvycal.com/benjamincrozat/ask-me-anything" class="bg-white hover:bg-white/75 border border-white font-medium inline-block mt-4 px-4 py-2 rounded text-center text-indigo-400 transition-colors w-full sm:w-auto">
                        Book a call
                    </a>
                </div>

                <img
                    loading="lazy"
                    src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=128"
                    width="64"
                    height="64"
                    alt="Benjamin Crozat"
                    class="flex-shrink-0 order-1 sm:order-none rounded-full w-[64px] h-[64px]"
                />
            </div>
        </div>
    </div>

    <div id="pricing" class="bg-gradient-to-r from-indigo-600 to-indigo-400 py-16 text-indigo-50">
        <div class="container max-w-[1024px]">
            <h2 class="font-medium leading-tight text-xl md:text-2xl text-center">
                No scope to define.<br />
                Simple pricing.
            </h2>

            <div class="grid md:grid-cols-3 gap-4 sm:gap-0 mt-8">
                <div class="bg-gradient-to-r from-white/0 via-white/[.15] to-white/0 grid place-items-center sm:my-8 p-6 sm:p-8 text-center">
                    <div>
                        <div class="font-medium text-lg sm:text-lg md:text-xl">
                            Audit
                        </div>

                        <div class="font-black mt-4 text-4xl md:text-5xl">
                            <span class="inline-flex items-center">1,000<span class="font-light opacity-75 text-xl sm:text-3xl">€</span></span>
                        </div>

                        <a
                            href="https://savvycal.com/benjamincrozat/ask-me-anything"
                            class="border border-white/30 font-medium inline-block mt-8 px-8 py-2 rounded"
                        >
                            Book a call
                        </a>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-white to-indigo-50 grid place-items-center py-6 sm:p-8 rounded-xl shadow-xl shadow-indigo-500 text-center text-indigo-400">
                    <div>
                        <div>
                            <div class="font-medium text-lg sm:text-lg md:text-xl">
                                Audit + Hands-on
                            </div>

                            <div>I help improve your product.</div>
                        </div>

                        <div class="font-black mt-4 text-4xl md:text-5xl">
                            <span class="inline-flex items-center">5,000<span class="font-light opacity-75 text-xl sm:text-3xl">€</span></span>
                        </div>

                        <a
                            href="https://savvycal.com/benjamincrozat/ask-me-anything"
                            class="border border-indigo-400/50 font-medium inline-block mt-8 px-8 py-2 rounded"
                        >
                            Book a call
                        </a>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-white/0 via-white/[.15] to-white/0 grid place-items-center sm:my-8 p-6 sm:p-8 text-center">
                    <div>
                        <div>
                            <div class="font-medium text-lg sm:text-lg md:text-xl">
                                Custom deal
                            </div>

                            <div>
                                Let's work something out.
                            </div>
                        </div>

                        <a
                            href="https://savvycal.com/benjamincrozat/ask-me-anything"
                            class="border border-white/30 font-medium inline-block mt-8 px-8 py-2 rounded"
                        >
                            Book a call
                        </a>
                    </div>
                </div>
            </div>

            <x-icon-clients class="fill-current max-w-screen-sm mt-16 mx-auto text-indigo-200" />
        </div>
    </div>

    <div class="bg-indigo-50 text-indigo-900">
        <section
            class="container py-8 sm:py-16"
            x-intersect="window.fathom?.trackGoal('WSVGAGQR', 0)"
        >
            <h2 class="font-medium text-xl sm:text-3xl text-center">
                The Laravel CTO services I provide in details
            </h2>

            <ul class="grid sm:grid-cols-2 gap-12 mt-8 sm:mt-16">
                <li>
                    <x-icon-pair-programming class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-medium mt-4 text-indigo-400 text-xl">
                        Pair programming
                    </p>

                    <p class="mt-4">
                        Pair programming is the best way for Laravel developers to learn from each other, <strong class="font-medium">fast</strong>.
                    </p>

                    <p class="mt-4">
                        Whatever your team needs to know about PHP and Laravel, I can show them.
                    </p>
                </li>

                <li>
                    <x-icon-best-practices class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-medium mt-4 text-indigo-400 text-xl">
                        Best practices
                    </p>

                    <p class="mt-4">
                        The Laravel framework can do miracles when everyone follow the best practices.
                    </p>

                    <ul class="mt-4">
                        <li class="flex items-start gap-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[2px] w-5 h-5" />
                            You don't need to maintain a documentation
                        </li>

                        <li class="flex items-start gap-2 mt-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[2px] w-5 h-5" />
                            Your developers always know where to go
                        </li>

                        <li class="flex items-start gap-2 mt-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[2px] w-5 h-5" />
                            New hires will be productive from day one
                        </li>
                    </ul>

                    <p class="mt-4">
                        With me, your team will become true Laravel experts and leverage its power to over 9000!
                    </p>
                </li>

                <li>
                    <x-icon-speedometer class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-medium mt-4 text-indigo-400 text-xl">
                        Performances
                    </p>

                    <p class="mt-4">
                        Good performances on any web application are critical. Users won't wait forever and could leave for your competitors.
                    </p>

                    <p class="mt-4">
                        I can diagnose and fix major bottlenecks in your codebase.
                    </p>
                </li>

                <li>
                    <x-icon-automated-testing class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-medium mt-4 text-indigo-400 text-xl">
                        Automated testing
                    </p>

                    <p class="font-medium mt-4">
                        Untested code is legacy code.
                    </p>

                    <p class="mt-4">
                        I can help your team write tests to:
                    </p>

                    <ul class="mt-4">
                        <li class="flex items-start gap-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[2px] w-5 h-5" />
                            Boost confidence each time they deploy something new
                        </li>

                        <li class="flex items-start gap-2 mt-2">
                            <x-heroicon-o-check-circle class="flex-shrink-0 text-indigo-400 translate-y-[2px] w-5 h-5" />
                            Facilitate onboarding of new team members. They won't fear screwing everything up on their first day
                        </li>
                    </ul>
                </li>

                <li>
                    <x-icon-continuous-integration class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-medium mt-4 text-indigo-400 text-xl">
                        Continuous integration
                    </p>

                    <p class="mt-4">
                        Automatically and continuously deploy new code into production is a dream for any serious business that wants to move forward.
                    </p>

                    <p class="mt-4">
                        We can make it happen <strong class="font-medium">without any infrastructure or DevOps cost</strong>.
                    </p>
                </li>

                <li>
                    <x-icon-errors-monitoring class="fill-current text-indigo-400 w-12 sm:w-16 h-12 sm:h-16" />

                    <p class="font-medium mt-4 text-indigo-400 text-xl">Errors monitoring</p>

                    <p class="mt-4">
                        What if we could react fast any time a blocking bug occurs in production?
                    </p>

                    <p class="mt-4">
                        We can set up a tool that monitors and logs everything wrong happening on your applications instead of relying on user feedback.
                    </p>
                </li>
            </ul>

            <div class="mt-16 text-center">
                <a
                    href="https://savvycal.com/benjamincrozat/ask-me-anything"
                    class="bg-emerald-400 hover:bg-emerald-300 inline-block px-8 py-4 rounded text-base text-center text-white transition-colors w-full sm:w-auto"
                    @click="window.fathom?.trackGoal('BCXCNHU1', 0)"
                >
                    Interested? <strong class="font-medium">Book a call.</strong>
                </a>
            </div>
        </section>
    </div>

    <div class="bg-indigo-50/30 text-indigo-900">
        <section
            class="container py-8 sm:py-16"
            x-intersect="window.fathom?.trackGoal('WSVGAGQR', 0)"
        >
            <h2 class="font-medium text-xl sm:text-3xl text-center">
                Want to hire a Laravel developer?<br />
                Here's what to look for.
            </h2>

            <div class="leading-relaxed mt-6">
                <h3 class="font-medium text-lg">Check for real-world Laravel experience</h3>

                <p class="mt-4">If you don't have time to coach young developers, make sure they have real-world experience.</p>

                <p class="mt-4">People freshly out of school won't be able to be proficient on most projects (of course, some passionate developers are the exception to this rule).</p>

                <p class="mt-4">Here's what makes a good candidate:</p>

                <ul class="ml-4 mt-4 pl-4 list-disc">
                    <li class="mt-2">Make sure they have at least one successful experience. It doesn't matter if this experience has been acquired working on open-source projects or in a company;</li>
                    <li class="mt-2">Developers with tech culture and knowledge about the latest trends tend to be curious and, therefore, more willing to give everything they have to solve your problems;</li>
                    <li class="mt-2">Even an inactive GitHub account is a good sign. A basic comprehension of open source reinforces the previous point.</li>
                </ul>

                <h3 class="font-medium mt-8 text-lg">Don't hire Laravel specialists to work on basic tasks</h3>

                <p class="mt-4">A Laravel expert is expensive, and for good reasons. Years of experience made them a master at what they do. You want them to work on something other than simple interface changes or bug fixes, or they'll get bored and leave as soon as possible.</p>

                <p class="mt-4">Senior developers want to work on complex issues that will make your project easier to maintain, more stable, and more profitable in the long run.</p>

                <p class="mt-4">That's exactly what I do after more than 10 years in this industry. Clients book me so I can help their team head in the right direction.</p>

                <h3 class="font-medium mt-8 text-lg">Get good communicators</h3>

                <p class="mt-4">Communication is critical for any relationship. In a working environment, you need a clear view of the progression to plan what's next.</p>

                <p class="mt-4">And you also need to know when things are stuck. Sometimes, problems are tough to solve, and deciding to get someone else involved as soon as possible to help you move forward is crucial.</p>
            </div>
        </section>
    </div>

    <div id="about" class="bg-indigo-50/30 text-indigo-900 text-xl">
        <section
            class="container py-8 sm:py-16"
            x-intersect="window.fathom?.trackGoal('Q0JLQGBO', 0)"
        >
            <h2 class="font-medium text-2xl sm:text-3xl text-center">
                About Benjamin Crozat
            </h2>

            <div class="flex flex-wrap md:flex-nowrap items-center md:justify-between gap-8 mt-8">
                <div class="order-2 md:order-none">
                    <p>I'm a passionate <strong class="font-medium">full-stack PHP and Laravel developer</strong> from the south of France with <strong class="font-medium">10+ years of experience</strong>.</p>

                    <p class="mt-4">I write on <a href="{{ route('home') }}" class="decoration-indigo-400/50 font-medium text-indigo-400 underline underline-offset-4">my blog</a> about web development in general, with an emphasis on Laravel.</p>

                    <p class="mt-4">I'm also active in the Laravel community on <a href="https://twitter.com/benjamincrozat" class="decoration-indigo-400/50 font-medium text-indigo-400 underline underline-offset-4">Twitter</a>.</p>
                </div>

                <div class="flex-shrink-0 order-1 md:order-none text-center md:text-left w-full md:w-auto">
                    <img loading="lazy" src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=256" alt="Benjamin Crozat" class="inline rounded-full w-[96px] md:w-[128px]" />
                </div>
            </div>
        </section>
    </div>

    <div class="bg-indigo-500 flex-grow">
        <x-footer class="text-indigo-100" />
    </div>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Consulting"
            }]
        }
    </script>
</x-app>
