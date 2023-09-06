<x-app
    title="Latest"
>
    <x-section class="container mt-16">
        <x-slot:title class="text-center">
            @if ($posts->currentPage() > 1)
                Page {{ $posts->currentPage() }}
            @else
                Latest
            @endif
        </x-slot:title>

        <ul class="grid gap-16 mt-8 md:grid-cols-2">
            @foreach ($posts as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>

        {{ $posts->links() }}
    </x-section>
</x-app>
