<x-app
    title="Sponsor me to get your company in the spotlight"
    :hide-navigation="true"
    :hide-footer="true"
    class="text-gray-300 bg-gray-900"
>
    <nav class="container flex items-center justify-between mt-4 lg:max-w-screen-md">
        <a wire:navigate.hover href="/">
            <span class="sr-only">{{ config('app.name') }}</span>
            <x-icon-logo class="w-8 h-8 fill-current md:w-10 md:h-10" />
        </a>

        <a wire:navigate.hover href="{{ route('home') }}" class="underline">
            Back to the blog →
        </a>
    </nav>

    <div class="container mt-16 max-w-[400px] mx-auto md:mt-24">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 916 616">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="100%" x2="0%" y2="0%">
                    <stop offset="0%" style="stop-color: #24d3ee; stop-opacity: 1" />
                    <stop offset="100%" style="stop-color: #49de80; stop-opacity: 1" />
                </linearGradient>
            </defs>

            <style>
                @keyframes draw {
                    to {
                        stroke-dashoffset: 0;
                    }
                }

                .line {
                    stroke: url(#gradient);
                    stroke-dasharray: 3500;
                    stroke-dashoffset: 3500;
                    animation: draw 2s forwards ease-in-out;
                }
            </style>

            <g fill="none" fill-rule="evenodd"><path stroke="#fff" stroke-opacity=".4" d="M8 608h900" /><path stroke="#fff" stroke-opacity=".15" d="M908 508H8m0-100h900m0-100H8m0-100h900m0-100H8M908 8H8" /><path stroke="#979797" stroke-linecap="round" stroke-linejoin="round" stroke-width="15" d="m8 608 100-42.180618L208 408l100 100 100 32.564033 100-61.164986L608 508l100-28.600953L808 108 908 8" class="line" /></g>
        </svg>
    </div>

    <x-section class="container mt-12 text-center">
        <x-slot:title tag="h1" class="!text-5xl font-bold">
            <span class="font-bold text-transparent bg-gradient-to-r from-orange-400 to-yellow-400 bg-clip-text">
                Get your company in the&nbsp;spotlight
            </span>
        </x-slot:title>

        <p class="mt-4 text-2xl md:mt-2 lg:text-3xl">
            More than <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">30,000</span> eager developers visit&nbsp;my&nbsp;blog&nbsp;each&nbsp;month.
        </p>

        <div class="mt-8">
            <a href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day" target="_blank" rel="nofollow noopener noreferrer" class="inline-block px-6 py-3 text-xl font-bold text-white transition-opacity bg-gray-800 rounded hover:opacity-75">
                See it for yourself
            </a>
        </div>
    </x-section>

    <x-section class="container mt-24 md:mt-32 lg:max-w-screen-md">
        <x-slot:title class="!text-3xl font-bold text-center">
            Put your logo on my homepage
        </x-slot:title>

        <div class="flex items-center justify-between gap-8 mt-8 text-xl md:gap-12 md:mt-16">
            <div>
                <h3 class="font-bold">
                    Boost your rankings on Google
                </h3>

                <p class="mt-2">
                    Even in 2023, links are more important than ever. If you are in the software business, getting one from this blog will benefit you.
                </p>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512" class="flex-shrink-0 w-24 h-24"><path fill="#374151" d="m352.233 211.394-68.984-102.438-68.984 102.438h35.434v265.837h67.099V211.394z"/><path fill="#d1d5db" d="M509.524 333.999 440.54 231.562c-2.699-4.009-7.216-6.411-12.048-6.411s-9.349 2.402-12.048 6.411l-68.983 102.437c-2.998 4.453-3.297 10.197-.774 14.937 2.523 4.739 7.454 7.701 12.822 7.701h20.909v106.071h-49.095v-236.79h20.909c5.368 0 10.299-2.961 12.822-7.701 2.521-4.741 2.224-10.484-.774-14.937l-68.984-102.438c-2.699-4.009-7.216-6.411-12.048-6.411s-9.349 2.402-12.048 6.411L202.217 203.28c-2.998 4.453-3.297 10.197-.774 14.937 2.523 4.739 7.454 7.701 12.822 7.701h20.909v236.789h-49.095v-62.47h20.909c8.02 0 14.524-6.504 14.524-14.524s-6.504-14.524-14.524-14.524h-35.433c-8.02 0-14.524 6.504-14.524 14.524v76.994h-38.049v-76.994c0-8.02-6.504-14.524-14.524-14.524h-8.142l41.692-61.913 20.131 29.895c4.482 6.654 13.509 8.412 20.161 3.935 6.654-4.481 8.415-13.508 3.935-20.161l-32.178-47.783c-2.699-4.009-7.216-6.411-12.048-6.411s-9.349 2.402-12.048 6.411l-68.983 102.44c-2.998 4.453-3.297 10.197-.774 14.937 2.523 4.739 7.454 7.701 12.822 7.701h20.909v62.47H29.048V34.767c0-8.02-6.504-14.524-14.524-14.524S0 26.747 0 34.767v442.465c0 8.02 6.504 14.524 14.524 14.524h447.518c8.02 0 14.524-6.504 14.524-14.524s-6.504-14.524-14.524-14.524h-52.576V342.113c0-8.02-6.504-14.524-14.524-14.524H386.8l41.692-61.911 41.693 61.911h-8.142c-8.02 0-14.524 6.504-14.524 14.524v78.011c0 8.02 6.504 14.524 14.524 14.524s14.524-6.504 14.524-14.524v-63.487h20.909c5.368 0 10.299-2.961 12.822-7.701 2.521-4.74 2.223-10.484-.774-14.937zm-245.3 128.708V211.394c0-8.02-6.504-14.524-14.524-14.524h-8.142l41.692-61.911 41.693 61.911H316.8c-8.02 0-14.524 6.504-14.524 14.524v251.313h-38.052z"/></svg>
        </div>

        <div class="flex items-center justify-between gap-8 mt-16 text-xl md:gap-12">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512" class="flex-shrink-0 w-24 h-24"><circle cx="283.823" cy="283.824" r="143.032" fill="#374151"/><path fill="#d1d5db" d="M283.823 441.791c-87.104 0-157.967-70.863-157.967-157.967s70.863-157.967 157.967-157.967S441.79 196.72 441.79 283.824s-70.864 157.967-157.967 157.967zm0-286.058c-70.629 0-128.091 57.461-128.091 128.091s57.461 128.091 128.091 128.091 128.091-57.461 128.091-128.091-57.46-128.091-128.091-128.091z"/><path fill="#374151" d="M283.823 210.506c40.493 0 73.318 32.825 73.318 73.318s-32.825 73.318-73.318 73.318-73.318-32.825-73.318-73.318"/><path fill="#d1d5db" d="M283.823 372.079c-48.665 0-88.256-39.59-88.256-88.256 0-8.25 6.688-14.938 14.938-14.938s14.938 6.688 14.938 14.938c0 32.19 26.189 58.38 58.38 58.38s58.38-26.189 58.38-58.38-26.189-58.38-58.38-58.38c-8.25 0-14.938-6.688-14.938-14.938s6.688-14.938 14.938-14.938c48.665 0 88.256 39.59 88.256 88.256s-39.59 88.256-88.256 88.256z"/><path fill="#374151" d="m107.881 55.068-5.267 47.545-47.546 5.268-40.13-40.129 52.814-52.814z"/><path fill="#d1d5db" d="M283.823 55.647c-57.543 0-110.171 21.421-150.353 56.696l-15.219-15.219 4.477-40.412c.499-4.508-1.077-9-4.284-12.207L78.316 4.374c-5.833-5.832-15.292-5.832-21.127 0L4.375 57.189c-5.833 5.833-5.833 15.292 0 21.127l40.128 40.128c2.817 2.816 6.624 4.375 10.563 4.375.547 0 1.096-.03 1.646-.091l40.414-4.477 15.219 15.219c-35.276 40.18-56.698 92.809-56.698 150.353C55.647 409.641 158.006 512 283.823 512c66.164 0 129.001-28.684 172.401-78.697 5.408-6.231 4.738-15.666-1.492-21.073-6.234-5.409-15.667-4.738-21.073 1.492-37.722 43.47-92.334 68.402-149.835 68.402-109.342 0-198.3-88.956-198.3-198.3 0-49.306 18.093-94.463 47.983-129.191L273.73 294.857c2.917 2.916 6.74 4.375 10.563 4.375s7.647-1.459 10.563-4.375c5.833-5.833 5.833-15.292 0-21.127L154.631 133.506c34.73-29.89 79.886-47.983 129.192-47.983 109.344 0 198.3 88.956 198.3 198.3 0 8.25 6.688 14.938 14.938 14.938s14.938-6.688 14.938-14.938C512 158.008 409.64 55.647 283.823 55.647zM36.063 67.752l31.688-31.688 24.492 24.492-3.161 28.529-28.529 3.161-24.49-24.494z"/></svg>

            <div>
                <h3 class="font-bold">
                    Get more targeted traffic
                </h3>

                <p class="mt-2">
                    My audience is exclusively made of English-speaking web developers from all over the world.
                </p>
            </div>
        </div>

        <div class="flex items-center justify-between gap-8 mt-16 text-xl md:gap-12">
            <div>
                <h3 class="font-bold">
                    Support a content creator
                </h3>

                <p class="mt-2">
                    Writing all this content takes time and money. Your kind sponsorship will help me keep this boat afloat.
                </p>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512.003 512.003" class="flex-shrink-0 w-24 h-24"><path fill="#374151" d="m287.7553804 155.268199 81.9302628-81.9302628 129.8525511 129.8525511-81.9302628 81.9302628zM94.3935722 285.1189354l-81.9302628-81.9302628L142.3158605 73.3361215l81.9302628 81.9302628z"/><path fill="#d1d5db" d="M508.35 194.371 378.498 64.52c-4.866-4.867-12.758-4.867-17.625 0l-73.116 73.116-14.389-14.387c-2.337-2.337-5.507-3.65-8.813-3.65s-6.476 1.314-8.813 3.65l-22.945 22.944-81.67-81.67c-4.867-4.868-12.758-4.867-17.625 0L3.65 194.371C1.314 196.709 0 199.879 0 203.184c0 3.305 1.314 6.476 3.65 8.813l81.928 81.928c2.434 2.434 5.623 3.65 8.813 3.65 3.189 0 6.38-1.218 8.813-3.65l52.052-52.052 26.539 26.539c.304.304.621.59.946.855 4.895 3.993 12.115 3.708 16.679-.855l56.58-56.58 120.662 120.662-13.04 13.04-103.495-103.495c-4.867-4.867-12.758-4.866-17.627 0-.304.304-.59.621-.855.947-3.993 4.895-3.708 12.117.855 16.679l123.807 123.806-13.04 13.04-123.806-123.807c-4.867-4.867-12.758-4.867-17.627 0-4.867 4.867-4.867 12.758 0 17.626L315.33 393.826l-13.04 13.04-7.669-7.669c-.003-.003-.004-.005-.006-.007l-95.821-95.82c-1.216-1.216-2.622-2.13-4.123-2.738-1.501-.608-3.095-.912-4.69-.912-2.79 0-5.582.932-7.867 2.795-.327.267-.642.551-.947.855-1.216 1.216-2.129 2.622-2.737 4.123-.304.75-.532 1.524-.684 2.309-.076.393-.133.789-.171 1.185-.343 3.574.855 7.27 3.593 10.008l43.504 43.504 43.504 43.504-13.04 13.04L140.18 306.086c-4.867-4.867-12.758-4.867-17.627 0-4.867 4.867-4.867 12.758 0 17.626l123.769 123.769c2.434 2.434 5.623 3.65 8.813 3.65 3.189 0 6.38-1.218 8.813-3.65L285.8 425.63l7.675 7.675c2.434 2.434 5.623 3.65 8.813 3.65s6.38-1.216 8.813-3.65l21.853-21.853 11.498 11.498c2.434 2.433 5.623 3.65 8.813 3.65s6.38-1.218 8.813-3.65l30.665-30.665c4.867-4.867 4.867-12.758 0-17.627l-11.498-11.498 21.853-21.853c4.867-4.867 4.867-12.758 0-17.627L264.814 185.394c-4.867-4.867-12.758-4.867-17.627 0l-56.579 56.58-9.17-9.17 83.119-83.119 14.387 14.387.001.001 3.157 3.157.437.437 126.258 126.257c2.433 2.434 5.623 3.65 8.813 3.65 3.189 0 6.38-1.216 8.813-3.65l81.928-81.928c2.337-2.337 3.65-5.507 3.65-8.813.002-3.304-1.313-6.474-3.651-8.812zM94.391 267.488l-64.303-64.303L142.314 90.959l64.303 64.303L94.391 267.488zm323.218 0L305.382 155.262l64.303-64.303 112.226 112.226-64.302 64.303z"/></svg>
        </div>
    </x-section>

    <div class="container mt-16 text-center md:max-w-screen-sm">
        <a href="https://benjamincrozat.lemonsqueezy.com/checkout/buy/7de09977-485d-4dcd-8813-c17dd48eddc7" class="inline-block py-5 text-white transition-opacity rounded px-7 text-xl/tight bg-gradient-to-r from-orange-500 to-yellow-600 hover:opacity-75">
            Get started now for <strong class="font-extrabold">$49/month</strong>
        </a>

        <p class="mt-4 text-sm text-gray-400">Once the payment is done, you will receive instructions on how to send me your company name, logo, and landing page of choice.</p>
    </div>

    <x-section id="about" class="container mt-32 mb-16 lg:max-w-screen-md">
        <x-slot:title class="!text-3xl font-bold text-center">
            Who you are sponsoring
        </x-slot:title>

        <x-prose class="mt-8 text-xl prose-invert">
            <x-about />
        </x-prose>
    </x-section>
</x-app>
