<x-app
    title="Hire the Laravel consultant your company deserves"
    class="text-indigo-50"
>
    <div class="bg-indigo-500">
        <div class="container sm:flex sm:items-center sm:justify-between py-8">
            <a href="{{ route('home') }}">
                <span class="font-extrabold translate-y-px text-sm sm:text-base tracking-widest uppercase">
                    Benjamin Crozat
                </span>

                <span class="block opacity-75 text-xs tracking-widest uppercase">
                    Full-stack Laravel developer
                </span>
            </a>

            <nav class="mt-8 sm:mt-0">
                <a href="{{ route('posts.index') }}" class="hover:opacity-50 text-xs tracking-widest transition-opacity uppercase">
                    Read my blog
                </a>
            </nav>
        </div>
    </div>

    <div class="bg-indigo-400">
        <section class="container py-8 sm:py-16">
            <h1 class="font-thin text-5xl">
                Hire the Laravel consultant your company <strong class="border-b font-semibold">deserves</strong>
            </h1>

            <div class="font-thin text-3xl">
                <p class="mt-16">
                    Let me guide your team toward <strong class="font-semibold text-white">maintainability</strong> and <strong class="font-semibold text-white">reliability</strong>.
                </p>

                <p class="mt-8">
                    <strong class="font-semibold text-white">Make more money</strong> on the long run by avoiding endless,<br />
                    regressions, bug huntings and rewrites.
                </p>
            </div>
        </section>
    </div>

    <div class="bg-indigo-50 text-indigo-900">
        <section class="container max-w-[1024px] py-8 sm:py-16">
            <div class="grid sm:grid-cols-2 gap-8">
                <div>
                    <x-heroicon-o-users class="-translate-x-1 text-indigo-900/50 w-10 h-10" />
                    <p class="font-bold mt-4 text-xl">
                        Pair programming
                    </p>

                    <p class="mt-4">
                        Pair programming is the best way for two developers to learn from each other, and <strong class="font-bold">fast</strong>.
                    </p>

                    <p class="mt-4">
                        Whatever your team need to know about PHP and Laravel, I can show them.
                    </p>
                </div>

                <div>
                    <x-heroicon-o-check-circle class="-translate-x-1 text-indigo-900/50 w-10 h-10" />

                    <p class="font-bold mt-4 text-xl">
                        Best practices
                    </p>

                    <p class="mt-4">
                        When everyone follows the framework's best practices, this is what happens:
                    </p>

                    <ul class="mt-4">
                        <li class="flex items-start gap-2">
                            <x-heroicon-o-check-circle class="translate-y-[3.5px] text-indigo-400 w-4 h-4" />
                            You don't need to maintain a documentation
                        </li>

                        <li class="flex items-start gap-2 mt-2">
                            <x-heroicon-o-check-circle class="translate-y-[3.5px] text-indigo-400 w-4 h-4" />
                            Your team always knows what to do
                        </li>

                        <li class="flex items-start gap-2 mt-2">
                            <x-heroicon-o-check-circle class="translate-y-[3.5px] text-indigo-400 w-4 h-4" />
                            You new hires will know what to do from day&nbsp;1
                        </li>
                    </ul>

                    <p class="mt-4">
                        It's time to leverage Laravel's power to over 9000!
                    </p>
                </div>

                <div>
                    <x-heroicon-o-computer-desktop class="-translate-x-1 text-indigo-900/50 w-10 h-10" />

                    <p class="font-bold mt-4 text-xl">
                        Automated testing
                    </p>

                    <p class="mt-4">
                        Writing untested code is like immediately writing legacy code.
                    </p>

                    <p class="mt-4">
                        I can help your team write tests and <strong class="font-bold">be more confident</strong> each time they deploy something new.
                    </p>
                </div>

                <div>
                    <x-heroicon-o-paper-airplane class="-translate-x-1 text-indigo-900/50 w-10 h-10" />

                    <p class="font-bold mt-4 text-xl">
                        Continuous integration
                    </p>

                    <p class="mt-4">
                        Automatically and continuously deploying new code into production is a dream for any serious business that wants to please its customers.
                    </p>
                </div>

                <div>
                    <x-heroicon-o-eye class="-translate-x-1 text-indigo-900/50 w-10 h-10" />

                    <p class="font-bold mt-4 text-xl">Errors monitoring</p>

                    <p class="mt-4">
                        What if we could <strong class="font-bold">prevent</strong> your company to loose even more money?
                    </p>

                    <p class="mt-4">
                        We can set up a tool that monitors and logs everything wrong happening on your site instead of relying on feedback.
                    </p>
                </div>
            </div>
        </section>
    </div>

    <div class="bg-indigo-500 flex-grow">
        <x-footer class="text-indigo-200" />
    </div>
</x-app>
