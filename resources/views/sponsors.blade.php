<x-app
    title="Support this blog, and get your rewards!"
    description="My goal is to be in every Laravel developer's Google search. See how you can contribute."
>
    <div class="container mt-16 xl:max-w-screen-lg">
        <x-icon-gift class="h-24 mx-auto" />

        <h1 class="!text-4xl/none mt-4 lg:!text-5xl/none font-bold text-center">
            <span class="text-transparent bg-gradient-to-r from-blue-500 to-blue-400 bg-clip-text">Support this blog</span>, and
            <span class="text-transparent bg-gradient-to-r from-orange-500 to-orange-400 bg-clip-text">get your rewards!</span>
        </h1>

        <h2 class="mt-4 text-center text-xl/tight md:text-2xl/tight lg:text-3xl/tight">
            My goal is to be in every Laravel developer's Google search.<br class="hidden sm:inline" />
            See how <strong class="font-normal underline">you</strong> can contribute.
        </h2>

        <ul class="grid grid-cols-2 gap-4 mt-16 md:grid-cols-4">
            <li class="col-span-1">
                <a href="#numbers" class="block h-full p-4 text-center border rounded md:p-6">
                    <x-icon-trend class="h-16 mx-auto" />

                    <span class="block mt-4 font-bold sm:text-lg md:text-xl">
                        The numbers
                    </span>
                </a>
            </li>

            <li class="col-span-1">
                <a href="#roadmap" class="block h-full p-4 text-center border rounded md:p-6">
                    <x-icon-roadmap class="h-16 mx-auto" />

                    <span class="block mt-4 font-bold sm:text-lg md:text-xl">
                        The roadmap
                    </span>
                </a>
            </li>

            <li class="col-span-1">
                <a href="#tiers" class="block h-full p-4 text-center border rounded md:p-6">
                    <x-icon-podium class="h-16 mx-auto" />

                    <span class="block mt-4 font-bold sm:text-lg md:text-xl">
                        Tiers and rewards
                    </span>
                </a>
            </li>

            <li class="col-span-1">
                <a href="#about" class="block h-full p-4 text-center border rounded md:p-6">
                    <x-icon-anonymous class="h-16 mx-auto" />

                    <span class="block mt-4 font-bold sm:text-lg md:text-xl">
                        Who's asking?
                    </span>
                </a>
            </li>
        </ul>
    </div>

    <x-section id="numbers" class="container mt-24 md:mt-32 scroll-mt-8">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            I will go even further with your support
        </x-slot:title>

        <div class="grid grid-cols-2 gap-16 mt-8 md:grid-cols-3">
            <div class="col-span-1" x-data="{ count: 0, target: 50000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">50,000</span>
                </div>

                <div>monthly visitors</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 90000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">90,000</span>
                </div>

                <div>monthly page views</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 50000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">55,000</span>
                </div>

                <div>monthly sessions</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 20000 }" x-intersect.half="animateNumber">
                <div class="flex items-center text-3xl sm:gap-1 md:gap-2 font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    <x-heroicon-s-arrow-trending-up class="flex-shrink-0 inline h-5 mr-2 text-green-500 sm:h-7" />
                    <span x-text="Math.round(count).toLocaleString()">22,000</span>
                </div>

                <div>clicks each month on Google</div>
            </div>

            <div class="col-span-1" x-data="{ count: 0, target: 80 }" x-intersect.half="animateNumber">
                <div class="text-3xl font-extralight sm:text-5xl lg:text-6xl xl:text-7xl">
                    +<span x-text="Math.round(count).toLocaleString()">90</span>
                </div>

                <div>articles written</div>
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

    <x-section class="container mt-24 md:mt-32">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            These companies are already onboard
        </x-slot:title>

        <p class="text-xl text-center mt-7">
            Their participation added more than <strong class="font-bold">$500</strong> to my MRR (Monthly Recurring Revenue) already!
        </p>

        <x-sponsors-logos class="justify-center" />
    </x-section>

    <x-section id="roadmap" class="container mt-24 scroll-mt-8 xl:max-w-screen-lg md:mt-32">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            <x-icon-roadmap class="h-16 mx-auto" />

            <div class="mt-2">
                Here's my roadmap<br />
                to make this blog even better
            </div>
        </x-slot:title>

        <p class="mt-8 text-xl text-center">
            Not only I need to constantly write new free content, but I want to build a community.<br />
            This requires some development work. Take a look at the timeline.
        </p>

        <div class="sm:mr-[16.66%] md:mr-[33.33%] mt-16">
            <h3 class="font-bold text-2xl/tight md:text-3xl/tight">
                <x-icon-suitcase class="h-16" />

                <div class="mt-8">
                    Q4 2023: Fresh job offers
                </div>
            </h3>

            <div class="mt-6 text-xl">
                <p>Successful companies use the web to make money, which makes developers incredible assets. I will allow companies to promote their job offers, which will help thousands of developers browsing my blog find their dream job.</p>
            </div>
        </div>

        <div class="sm:ml-[16.66%] md:ml-[33.33%] mt-16 sm:text-right">
            <h3 class="font-bold text-2xl/tight md:text-3xl/tight">
                <x-icon-sharing class="inline h-16" />

                <div class="mt-8">
                    Q1 2024: Share your content
                </div>
            </h3>

            <div class="mt-6 text-xl">
                <p>Some developers are also proficient writers. I want to help them reach more people. I currently share articles from the community, and I want to allow anyone to do the same.</p>
            </div>
        </div>

        <div class="sm:mr-[16.66%] md:mr-[33.33%] mt-16">
            <h3 class="font-bold text-2xl/tight md:text-3xl/tight">
                <x-icon-conversation class="h-16" />

                <div class="mt-8">
                    Q2 2024: Ask questions on articles
                </div>
            </h3>

            <div class="mt-6 text-xl">
                <p>Help from other community members is crucial to level up our skills. Being able to comment on articles will be extremely valuable for developers.</p>
            </div>
        </div>

        <div class="sm:ml-[16.66%] md:ml-[33.33%] sm:text-right mt-16">
            <h3 class="font-bold text-2xl/tight md:text-3xl/tight">
                <x-icon-qa class="inline h-16" />

                <div class="mt-8">
                    Q3 2024: Take a quizz once you read an article
                </div>
            </h3>

            <div class="flex-grow mt-6 text-xl">
                <p>Learning should be fun and I want my blog to be the best resource of the web for web developers to sharpen their skills. What better way to confirm your knowledge than answering questions?</p>
            </div>
        </div>
    </x-section>

    <x-section id="tiers" class="container mt-32 mb-16 scroll-mt-8">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Choose your tier, and get your rewards!
        </x-slot:title>

        <div class="flex flex-wrap gap-4 mt-8">
            <div class="flex flex-col w-full p-4 border rounded-lg md:w-auto md:flex-1">
                <div class="text-center">
                    <x-icon-good-samaritan class="h-16 mx-auto" />
                    <p class="mt-5 text-xl">Good samaritan</p>
                    <p class="text-3xl font-medium">One-time, your price</p>
                </div>

                <ul class="flex-grow mt-4">
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-check class="flex-shrink-0 h-4" />
                        <span>You receive my eternal gratitude!</span>
                    </li>
                </ul>

                <a href="{{ config('services.lemonsqueezy.sponsorships.one_time') }}" class="table px-6 py-3 mx-auto mt-8 font-normal transition-opacity duration-500 bg-gray-200 rounded hover:opacity-50">
                    Get started
                </a>
            </div>

            <div class="flex flex-col w-full p-4 border border-blue-400 rounded-lg md:w-auto md:flex-1 md:p-6">
                <div class="text-center">
                    <p class="text-xl font-normal">
                        <x-icon-superhero class="h-16 mx-auto" />
                        <span class="inline-block mt-5 text-transparent bg-gradient-to-r from-blue-500 to-blue-400 bg-clip-text">Superhero</span>
                    </p>

                    <p class="text-3xl font-medium">$5/month</p>
                </div>

                <ul class="flex-grow mt-4">
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-check class="flex-shrink-0 h-4" />
                        <span>You receive my eternal gratitude!</span>
                    </li>

                    <li class="flex items-center gap-2 mt-2 font-bold text-blue-400">
                        <x-heroicon-o-check class="flex-shrink-0 h-4" />
                        <span>Display your name on my homepage.</span>
                    </li>
                </ul>

                <a href="{{ config('services.lemonsqueezy.sponsorships.monthly_superhero') }}" class="table px-6 py-3 mx-auto mt-8 font-bold text-white transition-opacity duration-500 bg-blue-400 rounded hover:opacity-50">
                    Get started
                </a>
            </div>

            <div class="flex flex-col w-full p-4 border border-orange-400 rounded-lg md:w-auto md:flex-1 md:p-6">
                <div class="text-center">
                    <p class="text-xl font-normal">
                        <x-icon-demigod class="h-16 mx-auto" />
                        <span class="inline-block mt-5 text-transparent bg-gradient-to-r from-orange-500 to-orange-400 bg-clip-text">Demigod</span>
                    </p>

                    <p class="text-3xl font-medium">$10/month</p>
                </div>

                <ul class="flex-grow mt-4">
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-check class="flex-shrink-0 h-4" />
                        <span>You receive my eternal gratitude!</span>
                    </li>

                    <li class="flex items-center gap-2 mt-2">
                        <x-heroicon-o-check class="flex-shrink-0 h-4" />
                        <span>Display your name on my homepage.</span>
                    </li>

                    <li class="flex items-center gap-2 mt-2 font-bold text-orange-500">
                        <x-heroicon-o-check class="flex-shrink-0 h-4" />
                        <span>Add a link to a non-commercial project.</span>
                    </li>
                </ul>

                <a href="{{ config('services.lemonsqueezy.sponsorships.monthly_demigod') }}" class="table px-6 py-3 mx-auto mt-8 font-bold text-white transition-opacity duration-500 bg-orange-400 rounded hover:opacity-50">
                    Get started
                </a>
            </div>
        </div>

        <p class="mt-8 font-normal text-center">
            Demigod isn't enough? <a wire:navigate.hover href="{{ route('media-kit') }}" class="font-medium underline">Check out the God tier!</a>
        </p>
    </x-section>

    <div class="container grid gap-4 mt-4 sm:grid-cols-2 lg:grid-cols-3">
        <blockquote class="flex flex-col p-6 rounded-lg from-gray-200/30 bg-gradient-to-r to-gray-200/20">
            <p class="flex-grow">
                Benjamin is an inspirational content creator. I deeply appreciate his efforts for the Laravel community.
            </p>

            <div class="flex items-center justify-between gap-8 mt-4">
                <cite class="block not-italic text-gray-600">
                    <a href="https://alexandergaal.at" target="_blank" rel="noopener" class="text-blue-600 underline">Alexander Kroneis</a>, CEO at Gipfel Web Development
                </cite>

                <img loading="lazy" src="{{ Vite::asset('resources/img/alexander.jpg') }}" alt="Alexander Gaal" class="aspect-square object-cover w-[36px] md:w-[48px] rounded-full h-[36px] md:h-[48px]" />
            </div>
        </blockquote>

        <blockquote class="flex flex-col p-6 rounded-lg from-gray-200/30 bg-gradient-to-r to-gray-200/20">
            <p class="flex-grow">
                Benjamin is one of those few people with deep knowledge in writing, SEO, and Laravel best practices. He's the right person to get this project to the moon.
            </p>

            <div class="flex items-center justify-between gap-8 mt-4">
                <cite class="block not-italic text-gray-600">
                    <a href="https://tabacitu.ro" target="_blank" rel="noopener" class="text-blue-600 underline">Cristian Tăbăcitu</a>, creator of Backpack for Laravel
                </cite>

                <img loading="lazy" src="{{ Vite::asset('resources/img/cristian.jpg') }}" alt="Cristian Tăbăcitu" class="aspect-square object-cover w-[36px] md:w-[48px] rounded-full h-[36px] md:h-[48px]" />
            </div>
        </blockquote>

        <blockquote class="flex flex-col p-6 rounded-lg from-gray-200/30 bg-gradient-to-r to-gray-200/20">
            <p class="flex-grow">
                Benjamin's writing style is unique, providing clean and minimal articles, even for complex subjects.<br />
                A real resource for all developers, from beginners to seniors!
            <p>

            <div class="flex items-center justify-between gap-8 mt-4">
                <cite class="block not-italic text-gray-600">
                    <a href="https://wendelladriel.com" target="_blank" rel="noopener" class="text-blue-600 underline">Wendell Adriel</a>, creator of Lift and Validated DTO for Laravel
                </cite>

                <img loading="lazy" src="{{ Vite::asset('resources/img/wendell.jpg') }}" alt="Wendell Adriel" class="aspect-square object-cover w-[36px] md:w-[48px] rounded-full h-[36px] md:h-[48px]" />
            </div>
        </blockquote>
    </div>

    <x-section id="about" class="container mt-32 mb-16 lg:max-w-screen-md scroll-mt-8">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Who you are sponsoring
        </x-slot:title>

        <x-prose class="mt-8">
            {!! Str::markdown(file_get_contents(resource_path('markdown/about.md'))) !!}
        </x-prose>
    </x-section>
</x-app>
