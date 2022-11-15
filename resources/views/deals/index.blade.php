<x-app
    title="Deals for SaaS products in the AI, SEO & web hosting areas"
    description=""
>
    <x-blog.top class="container mt-4 md:mt-8" />

    <x-breadcrumb class="container mt-8 sm:mt-16">
        <x-breadcrumb-item href="{{ route('posts.index') }}">
            Blog
        </x-breadcrumb-item>

        <x-breadcrumb-item>
            Deals
        </x-breadcrumb-item>
    </x-breadcrumb>

    <section class="container max-w-[1024px] mt-16">
        <h1 class="font-bold px-4 sm:px-0 text-center text-xl">
            Deals for SaaS products in the AI, SEO & web hosting areas
        </h1>

        @if ($deals->isNotEmpty())
            <div class="grid sm:grid-cols-2 gap-4 mt-8">
                @foreach ($deals as $deal)
                    <x-deal :deal="$deal" />
                @endforeach
            </div>
        @endif
    </section>

    <div class="bg-gray-900 dark:bg-black flex-grow mt-16">
        <x-footer class="text-gray-200" />
    </div>
</x-app>
