<x-app
    description="Have you ever had a question about PHP, Laravel or anything related to its ecosystem? This is the best blog to find your answer."
>
    <x-head />

    @if ($posts->isNotEmpty())
        <ul class="container grid gap-12 py-12 sm:py-16">
            @foreach ($posts as $post)
                <li><x-post :post="$post" /></li>
            @endforeach
        </ul>
    @endif

    <div class="bg-gray-100 py-8 sm:py-16">
        <x-newsletter class="container scroll-mt-8 sm:scroll-mt-16" />
    </div>

    {{-- About --}}
    <x-about />
</x-app>
