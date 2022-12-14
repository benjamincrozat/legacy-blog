<x-app>
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 grid place-items-center min-h-screen text-white">
        <div class="container max-w-[1204px]">
            <h1 class="font-semibold text-3xl md:text-6xl text-center">
                <span class="bg-clip-text bg-gradient-to-r from-orange-500 to-yellow-400 inline-block">
                    <span class="text-transparent">SEO Wizardry for Developers</span>
                </span>
            </h1>

            <p class="font-semibold mt-8 text-xl md:text-2xl text-center">
                <span class="bg-clip-text bg-gradient-to-r from-purple-400 to-purple-300 inline-block">
                    <span class="text-transparent">Escape the ghost town and create content for humans.</span>
                </span>
            </p>

            <form class="mt-16 text-center">
                @csrf

                <div class="sm:bg-white/10 sm:inline-flex sm:items-center sm:justify-center sm:rounded-full">
                    <input type="email" name="email" id="email" placeholder="homer@simpson.com" class="border-0 bg-white/10 sm:bg-transparent placeholder-white/30 px-6 py-3 rounded-full sm:rounded-l-full w-full sm:w-auto" />

                    <button type="submit" class="bg-gradient-to-r from-emerald-600 to-emerald-500 font-bold mt-2 sm:mt-0 px-6 sm:px-8 py-3 rounded-full text-white">
                        Get the course
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app>
