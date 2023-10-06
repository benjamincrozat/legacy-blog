<x-app
    title="Invest in the best resources for Laravel developers"
    :hide-navigation="true"
    :hide-footer="true"
>
    @empty($hideNavigation)
        <x-navigation class="mt-4" />
    @endempty

    <h1 class="!text-3xl sm:!text-4xl md:!text-5xl font-bold text-center mt-16">
        <span class="text-transparent bg-gradient-to-r from-blue-500 to-blue-400 bg-clip-text">
            Invest in the best resource<br />
            for Laravel developers
        </span>
    </h1>

    <h2 class="mt-4 text-center text-xl/tight md:text-2xl/tight lg:text-3xl/tight">
        My goal is to be in everyone's Google search.<br />
        This requires to write <strong class="font-medium underline">a lot</strong> of content.
    </h2>

    <x-section class="container mt-24 md:mt-32">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            These companies are helping me
        </x-slot:title>

        <p class="text-xl text-center mt-7">
            Their participation propulsed my MRR (Monthly Recurring Revenue) to <strong class="font-bold">$194.50</strong> already!
        </p>

        <x-sponsors class="justify-center" />
    </x-section>

    <x-section class="container mt-24 md:mt-32">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            I'm already in motion
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

    <x-section class="container mt-24 xl:max-w-screen-lg md:mt-32">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            <x-icon-roadmap class="h-16 mx-auto" />

            <div class="mt-2">
                Here's my roadmap<br />
                to make this blog even better
            </div>
        </x-slot:title>

        <p class="mt-8 text-xl text-center">
            Not only I need to constantly write new content, but I want to build a community.<br />
            This requires some development work. Take a look at the timeline.
        </p>

        <div class="mt-16">
            <h3 class="font-bold text-2xl/tight md:text-3xl/tight">
                <x-icon-suitcase class="h-16" />

                <div class="mt-4">
                    Q4 2023: Fresh job offers
                </div>
            </h3>

            <div class="flex items-start gap-16 mt-6">
                <div class="flex-grow text-xl">
                    <p>Commodo et minim non elit ullamco quis ut consequat qui consectetur non. Amet sint quis sint ullamco mollit sit eiusmod anim officia duis. Est ex consequat ullamco consectetur sint. Consequat quis consectetur dolore ut deserunt enim dolore elit ut irure.</p>
                </div>

                <div class="bg-gray-200 h-[240px] aspect-square"></div>
            </div>
        </div>

        <div class="mt-16">
            <h3 class="font-bold text-2xl/tight md:text-3xl/tight">
                <x-icon-sharing class="h-16" />

                <div class="mt-4">
                    Q1 2024: Share your content for free.<br />
                    Reach more people.
                </div>
            </h3>

            <div class="flex items-start gap-16 mt-6">
                <div class="flex-grow text-xl">
                    <p>Commodo et minim non elit ullamco quis ut consequat qui consectetur non. Amet sint quis sint ullamco mollit sit eiusmod anim officia duis. Est ex consequat ullamco consectetur sint. Consequat quis consectetur dolore ut deserunt enim dolore elit ut irure.</p>
                </div>

                <div class="bg-gray-200 h-[240px] aspect-square"></div>
            </div>
        </div>

        <div class="mt-16">
            <h3 class="font-bold text-2xl/tight md:text-3xl/tight">
                <x-icon-conversation class="h-16" />

                <div class="mt-2">
                    Q2 2024: Ask questions on articles
                </div>
            </h3>

            <div class="flex items-start gap-16 mt-6">
                <div class="flex-grow text-xl">
                    <p>Commodo et minim non elit ullamco quis ut consequat qui consectetur non. Amet sint quis sint ullamco mollit sit eiusmod anim officia duis. Est ex consequat ullamco consectetur sint. Consequat quis consectetur dolore ut deserunt enim dolore elit ut irure.</p>
                </div>

                <div class="bg-gray-200 h-[240px] aspect-square"></div>
            </div>
        </div>

        <div class="mt-16">
            <h3 class="font-bold text-2xl/tight md:text-3xl/tight">
                <x-icon-qa class="h-16" />

                <div class="mt-4">
                    Q3 2024: Take a quizz once you read an article.
                </div>
            </h3>

            <div class="flex items-start gap-16 mt-6">
                <div class="flex-grow text-xl">
                    <p>Commodo et minim non elit ullamco quis ut consequat qui consectetur non. Amet sint quis sint ullamco mollit sit eiusmod anim officia duis. Est ex consequat ullamco consectetur sint. Consequat quis consectetur dolore ut deserunt enim dolore elit ut irure.</p>
                </div>

                <div class="bg-gray-200 h-[240px] aspect-square"></div>
            </div>
        </div>
    </x-section>

    <x-section id="tiers" class="container mt-32 mb-16">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Convinced? Choose your tier!
        </x-slot:title>

        <div class="flex flex-wrap gap-4 mt-16">
            <div class="flex flex-col flex-1 p-4 border rounded-lg">
                <div class="text-center">
                    <x-icon-good-samaritan class="h-16 mx-auto" />
                    <p class="mt-5 text-xl">Good samaritan</p>
                    <p class="text-3xl font-medium">$1/month</p>
                </div>

                <ul class="flex-grow mt-4">
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-check class="flex-shrink-0 h-4" />
                        <span>You receive my eternal gratitude!</span>
                    </li>
                </ul>

                <a href="#" class="table px-6 py-3 mx-auto mt-8 font-normal transition-opacity duration-500 bg-gray-200 rounded hover:opacity-50">
                    Get started
                </a>
            </div>

            <div class="flex flex-col flex-1 p-4 border border-blue-400 rounded-lg md:p-6">
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

                <a href="#" class="table px-6 py-3 mx-auto mt-8 font-bold text-white transition-opacity duration-500 bg-blue-400 rounded hover:opacity-50">
                    Get started
                </a>
            </div>

            <div class="flex flex-col flex-1 p-4 border border-orange-400 rounded-lg md:p-6">
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

                <a href="#" class="table px-6 py-3 mx-auto mt-8 font-bold text-white transition-opacity duration-500 bg-orange-400 rounded hover:opacity-50">
                    Get started
                </a>
            </div>
        </div>

        <p class="mt-8 font-normal text-center">
            Demigod isn't enough? <a wire:navigate href="{{ route('media-kit') }}" class="font-medium underline">Check out what I offer for businesses.</a>
        </p>
    </x-section>

    <x-testimonial
        :img-url="Vite::asset('resources/img/cristian.jpg')"
        img-alt="Cristian Tăbăcitu"
        author-name="Cristian Tăbăcitu"
        class="mt-16"
    >
        “Benjamin is one of those few people with deep knowledge in writing, SEO, and Laravel best practices. He's the right person to get this project to the moon.”

        <x-slot:author-details>
            Creator of Backpack for Laravel
        </x-slot:author-details>
    </x-testimonial>

    <x-section id="about" class="container mt-32 mb-16 lg:max-w-screen-md">
        <x-slot:title class="text-2xl sm:!text-3xl font-bold text-center">
            Who you are sponsoring
        </x-slot:title>

        <x-prose class="mt-8">
            {!! Str::markdown(file_get_contents(resource_path('markdown/about.md'))) !!}
        </x-prose>
    </x-section>
</x-app>
