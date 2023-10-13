<x-app
    title="Post your job offers to 40,000 developers each month"
    description="If you are hiring web developers, my blog can redirect a relevant audience to your job offers, today."
>
    <div class="container mt-16">
        <x-icon-people class="h-24 mx-auto" />

        <h1 class="!text-4xl/none mt-8 lg:!text-5xl/none font-bold text-center">
            Post your job offers
            <span class="text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">to 40,000 developers!</span>
        </h1>

        <h2 class="mt-2 text-center text-xl/tight md:text-2xl/tight lg:text-3xl/tight">
            Hire the ideal developer <strong class="font-medium">faster</strong>.
        </h2>

        <div x-data="{ quantity: 1 }">
            <div class="flex items-center justify-center gap-8 mt-14">
                <div class="flex items-center gap-2">
                    <button
                        class="w-[32px] h-[32px] grid place-items-center text-white bg-gray-800 rounded-full"
                        @click="quantity <= 1 ? (quantity = 1) : quantity--"
                    >
                        <x-heroicon-s-minus class="w-4 h-4" />
                        <span class="sr-only">Decrease quantity</span>
                    </button>

                    <span class="grid w-[32px] h-[32px] place-items-center font-mono" x-text="quantity">1</span>

                    <button
                        class="w-[32px] h-[32px] grid place-items-center text-white bg-gray-800 rounded-full"
                        @click="quantity++"
                    >
                        <x-heroicon-s-plus class="w-4 h-4" />
                        <span class="sr-only">Increase quantity</span>
                    </button>
                </div>

                <a
                    :href="`{{ config('services.lemonsqueezy.job_offer') }}&quantity=${quantity}`"
                    class="px-6 py-3 font-bold text-white bg-orange-400 rounded"
                >
                    Get started for $<span class="font-mono" x-text="149 * quantity">149</span>
                </a>
            </div>

            <p class="mt-4 text-sm text-center">Once the payment is done, you will receive instructions on how to send me your job <span x-text="quantity > 1 ? 'offers' : 'offer'">offers</span>.</p>
        </div>
    </div>

    <x-section id="numbers" class="container mt-16 xl:max-w-screen-lg scroll-mt-4">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            See how job posting work on my blog
        </x-slot:title>

        <div class="flex flex-wrap gap-8 mt-8 md:flex-nowrap md:items-start md:justify-between md:gap-16">
            <div
                class="w-full grid place-items-center md:max-w-[33.33%] h-full bg-black aspect-video rounded-lg shadow-lg"
                @click="alert("Coming soon! I'm still making adjustments to how I handle job offers.")"
            >
                <x-heroicon-s-play class="w-16 h-16 text-white" />
            </div>

            <div class="flex-grow">
                <p>In a nutshell:</p>
                <ol class="grid gap-2 pl-4 mt-2 ml-4 list-decimal">
                    <li>Your job offers are randomly displayed in front of every potential hires <strong class="font-medium">on every page</strong>.</li>
                    <li>They also are listed on a <a wire:navigate.hover href="{{ route('openings.index') }}" class="underline">dedicated page</a> <strong class="font-medium">above everyone else's</strong>.</li>
                    <li>Your job offers stay on my blog for <strong class="font-medium">an entire month</strong>.</li>
                </ol>
            </div>
        </div>
    </x-section>

    <x-section class="container mt-24 md:mt-32">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            These people trust me
        </x-slot:title>

        <x-sponsors class="justify-center" />
    </x-section>

    <x-section id="numbers" class="container mt-24 md:mt-32 scroll-mt-4">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Post your job offers to an ever growing amount of developers
        </x-slot:title>

        <div class="grid grid-cols-2 gap-16 mt-8 md:grid-cols-3">
            <div class="col-span-1" x-data="{ count: 0, target: 40000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">40,000</span>
                </div>

                <div>monthly developers passing by</div>
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
            Why post your job offers on my blog
        </x-slot:title>

        <x-prose class="mt-8 text-xl">
            <img loading="lazy" src="https://www.gravatar.com/avatar/d58b99650fe5d74abeb9d9dad5da55ad?s=256" width="128" height="128" alt="Benjamin Crozat" class="float-right mb-8 ml-8 rounded-full" />

            <p><strong>“The amount of developers passing by</strong> to sharpen their skills thanks to the technical content I write <strong>is massive</strong>. And the growth is not stopping anytime soon.</p>

            <p>My audience is made of <strong>English-speaking developers from all over the world</strong>. Your ideal hire has to be here and I make sure they don't miss your job offer.</p>

            <p><strong>People are always looking for new adventures and better work conditions.</strong> Take it as an opportunity to attract the ideal hire!”</p>
        </x-prose>
    </x-section>
</x-app>
