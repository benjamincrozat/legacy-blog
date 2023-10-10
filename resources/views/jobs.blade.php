<x-app
    title="Expose your job offers to 40,000 developers each month"
    description="If you are hiring web developers, my blog can redirect a relevant audience to your job offers, today."
>
    <div class="container mt-16">
        <x-icon-people class="h-24 mx-auto" />

        <h1 class="!text-4xl/none mt-8 lg:!text-5xl/none font-bold text-center">
            Your job offers
            <span class="text-transparent bg-gradient-to-r from-green-500 to-green-400 bg-clip-text">exposed to 40,000 developers!</span>
        </h1>

        <h2 class="mt-2 text-center text-xl/tight md:text-2xl/tight lg:text-3xl/tight">
            Find the ideal candidate <strong class="font-medium">faster</strong>.
        </h2>

        <a href="https://benjamincrozat.lemonsqueezy.com/checkout/buy/ffe977d4-b50b-416e-b213-0b94449ae916?discount=0" class="table px-6 py-3 mx-auto font-bold text-white bg-orange-400 rounded mt-14">
            Get started for $149
        </a>

        <p class="mt-4 text-sm text-center">Once the payment is done, you will receive instructions on how to send me your job offers.</p>
    </div>

    <x-section id="numbers" class="container mt-16 xl:max-w-screen-lg scroll-mt-4">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            See how it works
        </x-slot:title>

        <div class="flex flex-wrap gap-8 mt-8 md:flex-nowrap md:items-start md:justify-between md:gap-16">
            <div class="bg-black aspect-video h-[200px]"></div>

            <div>
                <p>In a nutshell:</p>
                <ol class="grid gap-2 pl-4 mt-2 ml-4 list-decimal">
                    <li>Job offers are displayed at the top of the blog, <strong class="font-medium">on every page</strong>.</li>
                    <li><strong class="font-medium">They also are listed on a dedicated page</strong>, which has a link in the blog's navigation.</li>
                    <li>Your job offers stay on my blog for <strong class="font-medium">an entire month</strong>.</li>
                </ol>
            </div>
        </div>
    </x-section>

    <x-section id="numbers" class="container mt-24 md:mt-32 scroll-mt-4">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Get an ever growing amount of eyes on your job offers
        </x-slot:title>

        <div class="grid grid-cols-2 gap-16 mt-8 md:grid-cols-3">
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

            <div class="col-span-1" x-data="{ count: 0, target: 19000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">19,000</span>
                </div>

                <div>clicks each month on Google</div>
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

    <x-section id="about" class="container mt-32 mb-16 lg:max-w-screen-md">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Who am I?
        </x-slot:title>

        <x-prose class="mt-8">
            {!! Str::markdown(file_get_contents(resource_path('markdown/about.md'))) !!}
        </x-prose>
    </x-section>
</x-app>
