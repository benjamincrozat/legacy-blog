<x-app
    description="Have you ever had a question about PHP, Laravel or anything related to its ecosystem? This is the best blog to find your answer."
>
    <x-head />

    @if ($posts->isNotEmpty())
        <ul class="container grid gap-12 py-16">
            @foreach ($posts as $post)
                <li><x-post :post="$post" /></li>
            @endforeach
        </ul>
    @endif

    <div class="bg-gray-100 py-8 sm:py-16">
        <x-newsletter class="scroll-mt-8 sm:scroll-mt-16" />
    </div>

    <section class="container sm:flex sm:items-center sm:gap-8 font-normal font-serif py-16">
        <div class="flex-shrink-0 sm:order-2 text-center">
            <img
                src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=256"
                width="128"
                height="128"
                alt="Benjamin Crozat's avatar."
                class="inline translate-y-[-1px] rounded-full"
            />
        </div>

        <div class="mt-6 sm:mt-0 sm:order-1">
            <h1 class="text-center sm:text-left text-xl w-full">
                Welcome to my blog about PHP&nbsp;and&nbsp;Laravel!
            </h1>

            <p class="mt-3">
                I've been a passionate full-stack web developer for 10+ years. <a href="mailto:benjamincrozat@me.com" class="border-b border-blue-200 text-blue-400">Book me</a> is you want to work with me.
            </p>

            <p class="mt-4">
                You can find me on <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="border-b border-blue-200 text-blue-400">GitHub</a>, <a href="https://www.linkedin.com/in/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="border-b border-blue-200 text-blue-400">LinkedIn</a> and <a href="https://twitter.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="border-b border-blue-200 text-blue-400">Twitter</a>.
            </p>
        </div>
    </section>
</x-app>
