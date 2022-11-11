<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <div class="bg-gradient-to-r from-gray-100 to-gray-50">
        <x-blog.top class="container" />

        <div class="mt-8 sm:mt-16 pb-16">
            <section class="container lg:max-w-screen-md">
                <h2 class="font-bold sm:max-w-screen-xs mx-auto text-xl sm:text-2xl md:text-3xl text-center">
                    Everything I learn about the&nbsp;art&nbsp;of&nbsp;crafting&nbsp;websites, <span class="text-indigo-400">for&nbsp;free</span>!
                </h2>

                <x-form method="POST" action="{{ route('subscribe') }}" class="max-w-screen-xs mx-auto mt-8">
                    <input type="email" name="email" id="email" placeholder="homer@simpson.com" class="block border-0 placeholder-gray-300 px-4 py-3 rounded-md shadow w-full" />

                    <button class="bg-gradient-to-r from-purple-300 to-purple-400 block font-bold mt-4 px-4 py-3 rounded-md shadow-lg text-white w-full">
                        Subscribe
                    </button>
                </x-form>

                <p class="mt-8">Hi there! 👋</p>

                <p class="mt-4">I'm Benjamin Crozat, a web developer with more than <strong class="font-bold">15 years of experience</strong>.</p>

                <p class="mt-4">Understanding the web and being able to build websites is a serious advantage nowadays. You get job security and can build a business starting with nothing. <strong class="font-bold">I want to share with you everything I learn.</strong></p>
            </section>
        </div>
    </div>

    @if ($highlights->isNotEmpty())
        <section class="md:container mt-16">
            <h2 class="font-bold px-4 md:px-0 text-center text-xl">
                Featured articles
            </h2>

            <div class="flex md:grid md:grid-cols-2 gap-2 mt-8 px-4 md:px-0 overflow-x-scroll md:overflow-x-visible snap-x md:snap-none snap-mandatory">
                @foreach ($highlights as $highlight)
                    <x-blog.highlighted :post="$highlight->post" :first="$loop->first" />
                @endforeach
            </div>
        </section>
    @endif

    <x-deals class="md:container mt-8 sm:mt-16" />

    <section class="container mt-8 sm:mt-16">
        <h2 class="font-bold px-4 sm:px-0 text-center text-xl">
            Latest articles
        </h2>

        @if ($posts->isNotEmpty())
            <div class="grid md:grid-cols-2 gap-4 mt-8">
                @foreach ($posts as $post)
                    <x-post :post="$post" @click="window.fathom?.trackGoal('HH0P1ACM', 0)" />
                @endforeach
            </div>
        @endif
    </section>

    <div class="bg-gray-900 dark:bg-black flex-grow mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
