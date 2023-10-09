<x-app
    title="Latest articles"
>
    <x-section class="container mt-16">
        <x-slot:title class="text-center">
            <x-icon-clock class="h-16 mx-auto" />

            <div class="mt-2">
                @if ($posts->currentPage() > 1)
                    Page {{ $posts->currentPage() }} of the latest articles
                @else
                    Latest articles
                @endif
            </div>
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
