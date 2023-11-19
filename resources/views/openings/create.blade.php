<x-app
    title="Post your job offer to 50,000 monthly Laravel developers"
    description="If you are hiring Laravel developers, my blog can get you the attention a relevant audience, today."
>
    <div class="container mt-16">
        <x-icon-people class="h-24 mx-auto" />

        <h1 class="!text-3xl md:!text-4xl/none mt-8 lg:!text-5xl/none font-bold text-center">
            Post your job offer
            <span class="text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">to 50,000 Laravel developers!</span>
        </h1>

        <h2 class="mt-2 text-center text-xl/tight md:text-2xl/tight lg:text-3xl/tight">
            Hire the ideal Laravel developer <strong class="font-medium">faster</strong>.
        </h2>

        <a
            href="{{ config('services.lemonsqueezy.job_offer') }}"
            class="table px-6 py-3 mx-auto font-bold text-white bg-orange-400 rounded mt-14"
        >
            Get started for <del class="font-light">$149</del> $99 (launch price)
        </a>

        <p class="mt-4 text-sm text-center">Once the payment is done, you will receive instructions on how to send me your job offer.</p>
    </div>

    <x-section id="numbers" class="container mt-16 xl:max-w-screen-lg scroll-mt-4">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            See how you can post your Laravel job offer
        </x-slot:title>

        <div class="flex flex-wrap gap-8 mt-8 md:flex-nowrap md:items-start md:justify-between md:gap-16">
            <video
                controls
                src="https://cdn.benjamincrozat.com/job-offers-demo.mp4"
                width="1280"
                height="720"
                class="bg-black md:max-w-[33.33%] rounded-lg shadow-lg aspect-video"
            ></video>

            <div class="flex-grow text-xl">
                <p>In a nutshell:</p>
                <ol class="grid gap-2 pl-4 mt-2 ml-4 list-decimal">
                    <li>Your job offer are randomly displayed in front of every potential hires <strong class="font-medium">on&nbsp;every&nbsp;page</strong>.</li>
                    <li>They also are listed on a <a wire:navigate.hover href="{{ route('openings.index') }}" class="underline">dedicated page</a> in a chronological order (you can see it in action in the video).</li>
                    <li>Your job offer stay on my blog for <strong class="font-medium">an entire month</strong>.</li>
                </ol>
            </div>
        </div>
    </x-section>

    <x-section class="container mt-24 md:mt-32">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Join other people who chose me for their Laravel needs!
        </x-slot:title>

        <x-sponsors-logos class="justify-center" />
    </x-section>

    <x-section id="numbers" class="container mt-24 md:mt-32 scroll-mt-4">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Present your job offer to a growing Laravel workforce.
        </x-slot:title>

        <div class="grid grid-cols-2 gap-16 mt-8 md:grid-cols-3">
            <div class="col-span-1" x-data="{ count: 0, target: 50000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">50,000</span>
                </div>

                <div>monthly Laravel developers passing by</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 70000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">70,000</span>
                </div>

                <div>monthly page views</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 50000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">50,000</span>
                </div>

                <div>monthly sessions</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 20000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">20,000</span>
                </div>

                <div>clicks each month on Google</div>
            </div>

            <div class="col-span-1">
                <div class="text-xl sm:text-2xl xl:text-3xl">
                    India, Indonesia, United States, Germany, United Kingdom
                </div>

                <div>
                    in the top 10 countries
                </div>
            </div>
        </div>

        <div class="mt-16 text-center">
            <a href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day" target="_blank" rel="nofollow noopener" class="inline-block px-6 py-3 font-bold transition-opacity rounded bg-gradient-to-r from-gray-200/50 to-gray-200 hover:opacity-75">
                Access my analytics dashboard
            </a>
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

    <x-section class="container mt-32 mb-16 lg:max-w-screen-md">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Why post your Laravel development<br class="hidden sm:inline" />
            job offers on my blog
        </x-slot:title>

        <x-prose class="mt-8 text-xl">
            <img loading="lazy" src="https://www.gravatar.com/avatar/d58b99650fe5d74abeb9d9dad5da55ad?s=256" width="128" height="128" alt="Benjamin Crozat" class="float-right mb-8 ml-8 rounded-full" />

            <p><strong>“The amount of developers passing by</strong> to sharpen their diverse skills (CSS, databases, JavaScript, Laravel, PHP, Vue.js, etc.) thanks to the technical content I write <strong>is massive</strong>. And the growth is not stopping anytime soon.</p>

            <p>My audience is made of <strong>English-speaking developers from all over the world</strong>. Your ideal hire has to be here and I make sure they don't miss your job offer.</p>

            <p><strong>People are always looking for new adventures and better work conditions.</strong> Take it as an opportunity to attract the ideal hire!”</p>
        </x-prose>

        <x-button no-wire-navigate href="#" class="table px-6 mx-auto mt-8 text-white bg-orange-400">
            Post your job offer
        </x-button>
    </x-section>

    <x-section class="container mt-32 mb-16 lg:max-w-screen-md">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            My recommendations<br class="hidden sm:inline" /> for hiring a dedicated Laravel developer
        </x-slot:title>

        <x-prose class="mt-8 prose-h3:font-bold">
            <h3 class="leading-tight">Check for real-world Laravel development experiences</h3>
            <x-icon-resume class="float-right w-24 h-24 mt-1 mb-8 ml-8 text-green-500 md:w-32 md:h-32" />
            <p>If you don't have time to coach inexperienced developers on Laravel, make sure they have real-world experience.</p>
            <p><strong>People freshly out of school are certainly cheap, but they won't be able to be proficient on Laravel projects</strong> (of course, some passionate developers are the exception to this rule).</p>
            <p>Here's what, in my opinion, makes a good candidate:</p>
            <ol>
                <li><strong>Make sure they have at least one successful experience with Laravel.</strong> It doesn't matter if this experience has been acquired working on open-source projects or in a company;</li>
                <li><strong>Developers with tech culture and knowledge about the latest trends tend to be more curious</strong> and, therefore, willing to give everything they have to solve any problem you encounter with Laravel;</li>
                <li><strong>A GitHub account is a good sign.</strong> Even when inactive, it can show at least a basic comprehension of open source, which reinforces the previous point.</li>
            </ol>

            <h3 class="leading-tight">Don't hire a senior Laravel developer to work on basic tasks</h3>
            <x-icon-programmer class="float-right w-24 h-24 mt-1 mb-8 ml-8 text-green-500 md:w-32 md:h-32" />
            <p><strong>A senior Laravel developer is expensive and for good reasons.</strong> Years of experience made them a master at what they do. <strong>You want them to work on something other than simple interface changes or bug fixes, or they'll get bored and leave as soon as possible.</strong> I'm talking from experience there!</p>
            <p>Senior Laravel developers want to work on complex issues that will make your project easier to maintain, more stable, and more profitable in the long run.</p>

            <h3 class="leading-tight">Get a Laravel developer who's a good communicator</h3>
            <x-icon-communication class="float-right w-24 h-24 mt-1 mb-8 ml-8 text-green-500 md:w-32 md:h-32" />
            <p><strong>Communication is critical for any relationship.</strong> In a working environment, you need a clear view of the progression to plan what's next.</p>
            <p>And you also need to know when things are stuck. Sometimes, problems are tough to solve, and deciding to get someone else involved as soon as possible to help you move forward is crucial.</p>
        </x-prose>

        <x-button no-wire-navigate href="#" class="table px-6 mx-auto mt-8 text-white bg-orange-400">
            Post your job offer
        </x-button>
    </x-section>
</x-app>
