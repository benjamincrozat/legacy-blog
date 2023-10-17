<x-app
    title="Latest articles"
>
    <div class="container mt-8 lg:max-w-screen-md">
        <x-breadcrumb>
            Articles
        </x-breadcrumb>
    </div>

    <div class="container mt-8">
        <x-section>
            <x-slot:title class="text-center">
                @if ($posts->currentPage() > 1)
                    Page {{ $posts->currentPage() }} of the latest articles
                @else
                    Latest articles
                @endif
            </x-slot:title>

            <ul class="grid gap-16 mt-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <li>
                        <x-post :post="$post" />
                    </li>
                @endforeach
            </ul>

            {{ $posts->links() }}
        </x-section>
    </div>
</x-app>
