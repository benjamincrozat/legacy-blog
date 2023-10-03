<x-app
    title="Sponsor me and get your company in the spotlight."
    description="More than 40,000 eager developers visit my blog each month. Why don't you introduce your brand?"
    :hide-navigation="true"
    :hide-footer="true"
>
    @empty($hideNavigation)
        <x-navigation class="mt-4" />
    @endempty

    <div
        class="!h-[175px] md:!h-[200px] container flex items-end justify-center gap-2 md:gap-4 mt-16 md:mt-24 md:max-w-screen-sm"
        x-data="{ animate: false }"
    >
        <div
            class="w-8 h-0 transition-all duration-500 rounded-lg md:w-12 bg-gradient-to-b from-blue-400 to-cyan-300 delay-0"
            x-bind:class="{ '!h-[25px] md:!h-[50px]': animate }"
            x-intersect="animate = true"
        ></div>

        <div
            class="w-8 h-0 transition-all duration-500 delay-75 rounded-lg md:w-12 bg-gradient-to-b from-blue-400 to-cyan-300"
            x-bind:class="{ '!h-[50px] md:!h-[75px]': animate }"
            x-intersect="animate = true"
        ></div>

        <div
            class="w-8 h-0 transition-all duration-500 delay-100 rounded-lg md:w-12 bg-gradient-to-b from-blue-400 to-cyan-300"
            x-bind:class="{ '!h-[75px] md:!h-[100px]': animate }"
            x-intersect="animate = true"
        ></div>

        <div
            class="w-8 h-0 transition-all duration-500 delay-150 rounded-lg md:w-12 bg-gradient-to-b from-blue-400 to-cyan-300"
            x-bind:class="{ '!h-[100px] md:!h-[125px]': animate }"
            x-intersect="animate = true"
        ></div>

        <div
            class="w-8 h-0 transition-all duration-500 delay-200 rounded-lg md:w-12 bg-gradient-to-b from-blue-400 to-cyan-300"
            x-bind:class="{ '!h-[125px] md:!h-[150px]': animate }"
            x-intersect="animate = true"
        ></div>

        <div
            class="w-8 h-0 transition-all duration-500 delay-300 rounded-lg md:w-12 bg-gradient-to-b from-blue-400 to-cyan-300"
            x-bind:class="{ '!h-[150px] md:!h-[175px]': animate }"
            x-intersect="animate = true"
        ></div>

        <div
            class="w-8 h-0 transition-all duration-500 delay-[400ms] md:w-12 bg-gradient-to-b from-blue-400 to-cyan-300 rounded-md"
            x-bind:class="{ '!h-[175px] md:!h-[200px]': animate }"
            x-intersect="animate = true"
        ></div>
    </div>

    <x-section class="container mt-8 text-center md:mt-12">
        <x-slot:title tag="h1" class="!text-3xl sm:!text-4xl md:!text-5xl font-bold">
            <span class="font-bold text-transparent bg-gradient-to-r from-orange-400 to-yellow-400 bg-clip-text">
                Get your company in the&nbsp;spotlight.
            </span>
        </x-slot:title>

        <p class="mt-4 text-xl md:text-2xl md:mt-2 lg:text-3xl">
            More than <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">40,000</span> eager developers visit&nbsp;my&nbsp;blog&nbsp;each&nbsp;month.
        </p>

        <div class="mt-16">
            <a href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day" target="_blank" rel="nofollow noopener" class="inline-block px-6 py-3 font-bold transition-opacity bg-gray-200 rounded hover:opacity-75">
                Access my analytics dashboard
            </a>
        </div>
    </x-section>

    <x-section class="container mt-24 md:mt-32">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            These people trust me
        </x-slot:title>

        <x-sponsors class="justify-center" />
    </x-section>

    <div class="mt-24 bg-gradient-to-r from-gray-200/[.35] to-gray-200/[.15] md:mt-32">
        <div class="container lg:max-w-screen-md">
            <div class="py-8 md:flex md:items-center md:gap-8">
                <img loading="lazy" src="{{ Vite::asset('resources/img/sebastian.jpg') }}" width="96" height="96" class="flex-shrink-0 aspect-square w-[96px] order-2 h-[96px] rounded-full mx-auto" alt="Sebastian Schlein" />

                <blockquote class="order-1 mt-6 text-xl md:mt-0">
                    “Benjamin is overtaking us on some Google search results, so I'm jumping on board before he raises his prices.”

                    <cite class="block mt-8 text-gray-500">
                        Sebastian Schlein<br />
                        Co-founder of <a href="https://beyondco.de" class="text-indigo-400 underline">Beyond Code</a>
                    </cite>
                </blockquote>
            </div>
        </div>
    </div>

    <x-section class="container mt-24 md:mt-32">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            My blog by the numbers
        </x-slot:title>

        <div class="grid grid-cols-2 gap-16 mt-16 md:grid-cols-3">
            <div class="col-span-1" x-data="{ count: 0, target: 40000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">40,000</span>
                </div>

                <div>monthly visitors</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 63000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">63,000</span>
                </div>

                <div>monthly page views</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 43000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">43,000</span>
                </div>

                <div>monthly sessions</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 75 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">75</span>%
                </div>

                <div>visitors on desktop</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 4300 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">4300</span>
                </div>

                <div>followers on 𝕏</div>
            </div>

            <div class="col-span-1">
                <div class="text-xl sm:text-2xl xl:text-3xl">
                    India, Indonesia, United States, Germany, United Kingdom
                </div>

                <div>
                    in the top 5 countries
                </div>
            </div>
        </div>
    </x-section>

    <script>
        function animateNumber() {
            const duration = 1000

            const stepTime = 20

            const steps = duration / stepTime

            const increment = this.target / steps

            const interval = setInterval(() => {
                if (this.count < this.target) {
                    this.count += increment

                    if (this.count > this.target) {
                        this.count = this.target
                    }
                } else {
                    clearInterval(interval)
                }
            }, stepTime)
        }
    </script>

    <div class="container grid gap-16 mt-24 text-xl sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 place-items-center md:mt-32">
        <div class="flex flex-col h-full text-center">
            <x-icon-pin class="h-32 mx-auto" />

            <p class="flex-grow mt-8 font-bold">
                Pin your link and logo<br />
                on my homepage and the footer
            </p>

            <p class="text-center">
                <x-button href="#display" class="mt-4 px-3 !py-2 text-sm font-bold bg-blue-600 text-white">
                    Learn more
                </x-button>
            </p>
        </div>

        <div class="flex flex-col h-full text-center">
            <x-icon-write class="h-32 mx-auto" />

            <p class="flex-grow mt-8 font-bold">
                Write about your business
            </p>

            <p class="text-center">
                <x-button href="#write" class="mt-4 px-3 !py-2 text-sm font-bold bg-blue-600 text-white">
                    Learn more
                </x-button>
            </p>
        </div>

        <div class="flex flex-col h-full text-center">
            <x-icon-suit class="h-32 mx-auto" />

            <p class="flex-grow mt-8 font-bold">
                Need a custom deal?
            </p>

            <p class="text-center">
                <x-button href="mailto:hello@benjamincrozat.com" class="mt-4 px-3 !py-2 text-sm font-bold bg-green-500 text-white">
                    Reach out
                </x-button>
            </p>
        </div>
    </div>

    <x-section id="display" class="container mt-24 scroll-mt-4 md:mt-32 lg:max-w-screen-md">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Pin your link and logo<br />
            on my homepage and the footer
        </x-slot:title>

        <div class="flex items-center justify-between gap-8 mt-16 md:gap-12">
            <div>
                <h3 class="text-xl font-bold">
                    Get more targeted traffic
                </h3>

                <p class="mt-2">
                    <strong class="font-medium">My audience is exclusively made of English-speaking web developers</strong> from all over the world.
                </p>
            </div>

            <x-icon-target class="flex-shrink-0 w-16 h-16 md:w-24 md:h-24" />
        </div>

        <div class="flex items-center justify-between gap-8 mt-16 md:gap-12">
            <div>
                <h3 class="text-xl font-bold">
                    Boost your rankings on Google
                </h3>

                <p class="mt-2">
                    Even in 2023, <strong class="font-medium">links are more important than ever for Google</strong>. If you are in the software business, getting some from this blog will benefit you.
                </p>
            </div>

            <x-icon-growth class="flex-shrink-0 w-16 h-16 md:w-24 md:h-24" />
        </div>

        <div class="flex items-center justify-between gap-8 mt-16 md:gap-12">
            <div>
                <h3 class="text-xl font-bold">
                    Support a content creator
                </h3>

                <p class="mt-2">
                    Writing all this content takes time and money. <strong class="font-medium">Your kind sponsorship will help me keep this boat afloat.</strong>
                </p>
            </div>

            <x-icon-shake-hands class="flex-shrink-0 w-16 h-16 md:w-24 md:h-24" />
        </div>
    </x-section>

    <div class="container mt-16 text-center md:max-w-screen-sm">
        <a href="{{ config('services.lemonsqueezy.sponsorships.monthly') }}" class="inline-block px-6 py-3 font-bold text-white transition-opacity bg-orange-400 rounded hover:opacity-75">
            Get started for $49/month
        </a>

        <p class="mt-4 font-medium">
            Or simplify your accounting with <a href="{{ config('services.lemonsqueezy.sponsorships.yearly') }}" class="underline">yearly payments</a>.
        </p>

        <p class="mt-4 text-sm">Once the payment is done, you will receive instructions on how to send me your company name, logo, and landing page of choice.</p>
    </div>

    <x-section id="write" class="container mt-24 scroll-mt-4 md:mt-32 lg:max-w-screen-md">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Write about your business
        </x-slot:title>

        <div class="flex items-center justify-between gap-8 mt-16 md:gap-12">
            <div>
                <h3 class="text-xl font-bold">
                    Stay on top of other articles for an entire week
                </h3>

                <p class="mt-2">
                    <strong class="font-medium">From Monday to Sunday, you article will stay on top of every other article</strong> on this blog. In the homepage, in the "latest" page, and in the recommendations of every article.
                </p>
            </div>

            <x-icon-trophy class="flex-shrink-0 w-16 h-16 md:w-24 md:h-24" />
        </div>

        <div class="flex items-center justify-between gap-8 mt-16 md:gap-12">
            <div>
                <h3 class="text-xl font-bold">
                    Talk directly to thousands of developers
                </h3>

                <p class="mt-2">
                    Developers are constantly looking for <strong class="font-medium">innovative companies selling services that improve their productivity and allow them to buy their time back</strong>.
                </p>
            </div>

            <x-icon-users class="flex-shrink-0 w-16 h-16 md:w-24 md:h-24" />
        </div>

        <div class="flex items-center justify-between gap-8 mt-16 md:gap-12">
            <div>
                <h3 class="text-xl font-bold">
                    Get a valuable link, <strong>FOR LIFE</strong>
                </h3>

                <p class="mt-2">
                    <strong class="font-medium">Links are such an important ranking factor on Google.</strong> You want to accumulate as many as you can to get a return on investment in the long run. My blog is here to help.
                </p>
            </div>

            <x-icon-growth-2 class="flex-shrink-0 w-16 h-16 md:w-24 md:h-24" />
        </div>

        <div class="flex items-center justify-between gap-8 mt-16 md:gap-12">
            <div>
                <h3 class="text-xl font-bold">
                    Support a content creator
                </h3>

                <p class="mt-2">
                    Writing all this content takes time and money. Your kind sponsorship will help me keep this boat afloat.
                </p>
            </div>

            <x-icon-high-five class="flex-shrink-0 w-16 h-16 md:w-24 md:h-24" />
        </div>
    </x-section>

    <div class="container mt-16 text-center md:max-w-screen-sm">
        <a href="{{ config('services.lemonsqueezy.sponsored_content') }}" class="inline-block px-6 py-3 font-bold text-white transition-opacity bg-orange-400 rounded hover:opacity-75">
            Get started for $499
        </a>

        <p class="mt-4 text-sm">Once the payment is done, you will receive instructions on how to send me your content.</p>
    </div>

    <x-section id="about" class="container mt-32 mb-16 lg:max-w-screen-md">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Who you are sponsoring
        </x-slot:title>

        <x-prose class="mt-8">
            {!! Str::markdown(file_get_contents(resource_path('markdown/about.md'))) !!}
        </x-prose>
    </x-section>
</x-app>
