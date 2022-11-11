<x-app
    title="The web developer life of Benjamin Crozat"
    description="Have you ever had a question about the art of crafting web applications? This is the best blog to find your answer."
    class="dark:bg-gray-900 text-gray-600 dark:text-gray-300"
>
    <div class="bg-gradient-to-r from-gray-100 dark:from-gray-800/30 to-gray-50 dark:to-gray-800/30">
        <x-blog.top class="container" />

        <div class="mt-8 sm:mt-16 pb-16">
            <section class="container lg:max-w-screen-md">
                <h2 class="font-bold sm:max-w-screen-xs mx-auto text-xl sm:text-2xl md:text-3xl text-center">
                    <svg xml:space="preserve" viewBox="0 0 496 496" class="h-20 inline"><path fill="#daeaef" d="M0 56h496v384H0z"/><path fill="#c7e0e5" d="M496 440 124.8 321.6 0 56h496z"/><g opacity=".5"><path fill="#1ea4c4" d="M8 248v25.6l24 28.8v-25.6z"/><path fill="#c42014" d="M8 312.8v25.6l24 28.8v-25.6zm0-129.6v25.6l24 28.8V212z"/><path fill="#1ea4c4" d="M32 432.8v-25.6L8 377.6v25.6z"/><path fill="#c42014" d="M8 59.2v19.2L32 108V82.4z"/><path fill="#1ea4c4" d="M8 118.4V144l24 28.8v-25.6zm3.2 324.8z"/></g><g opacity=".5"><path fill="#1ea4c4" d="M488 248v-25.6l-24-28.8v25.6z"/><path fill="#c42014" d="M488 183.2v-25.6l-24-28.8v25.6zm0 129.6v-25.6l-24-28.8V284z"/><path fill="#1ea4c4" d="M464 63.2v25.6l24 29.6V92.8z"/><path fill="#c42014" d="M488 439.2v-21.6L464 388v25.6z"/><path fill="#1ea4c4" d="M488 377.6V352l-24-28.8v25.6zm-3.2-324.8z"/></g><path fill="#e8f9fc" d="M496 440 286.4 229.6c-21.6-21.6-56-21.6-77.6 0L0 440h496z"/><path fill="#d1eff2" d="M286.4 229.6c-21.6-21.6-56-21.6-77.6 0l-35.2 35.2 35.2 35.2c21.6 21.6 56 21.6 77.6 0l35.2-35.2-35.2-35.2z"/><path fill="#fff" d="m0 56 209.6 210.4c21.6 21.6 56 21.6 77.6 0L496 56H0z"/><path fill="#e8f9fc" d="M286.4 266.4 496 56H224"/><path fill="#1ea4c4" d="M248 64h-25.6l-28.8 16h25.6z"/><path fill="#c42014" d="M183.2 64h-25.6l-28.8 16h25.6zm129.6 0h-25.6l-28.8 16H284z"/><path fill="#1ea4c4" d="M63.2 80h25.6l29.6-16H92.8z"/><path fill="#c42014" d="M443.2 64h-25.6L388 80h25.6z"/><path fill="#1ea4c4" d="M377.6 64H352l-28.8 16h25.6zM52.8 66.4zM248 432h25.6l28.8-16h-25.6z"/><path fill="#c42014" d="M312.8 432h25.6l28.8-16h-25.6zm-129.6 0h25.6l28.8-16H212z"/><path fill="#1ea4c4" d="M432.8 416h-25.6l-29.6 16h25.6z"/><path fill="#c42014" d="M52.8 432h25.6l29.6-16H82.4z"/><path fill="#1ea4c4" d="M118.4 432H144l28.8-16h-25.6zm324.8-2.4z"/></svg>

                    <span class="block mt-4">I share everything I learn about the&nbsp;art&nbsp;of&nbsp;crafting&nbsp;websites, <span class="text-indigo-400">for&nbsp;free</span>!</span>
                </h2>

                <x-form method="POST" action="{{ route('subscribe') }}" class="max-w-screen-xs mx-auto mt-8">
                    <input type="email" name="email" id="email" placeholder="homer@simpson.com" class="dark:bg-gray-700/40 block border-0 placeholder-gray-300 dark:placeholder-gray-600 px-4 py-3 rounded-md shadow w-full" />

                    <button class="bg-gradient-to-r from-purple-300 dark:from-purple-400 to-purple-400 dark:to-purple-500 block font-bold mt-2 px-4 py-3 rounded-md shadow-lg text-white w-full">
                        Subscribe
                    </button>
                </x-form>

                <p class="mt-8">Hi there! 👋</p>

                <p class="mt-4">I'm Benjamin Crozat, a web developer with more than <strong class="font-bold dark:text-white">15 years of experience</strong>.</p>

                <p class="mt-4">Understanding the web and being able to build websites is a serious advantage nowadays. You get job security and can build a business starting with nothing. <strong class="font-bold dark:text-white">I want to share with you everything I learn</strong> about it.</p>
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
