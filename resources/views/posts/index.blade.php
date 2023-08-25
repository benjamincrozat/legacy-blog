<x-app
    title="Everything I wrote about Laravel and its ecosystem."
>
    <x-section class="container mt-16">
        <x-slot:title class="text-center">
            @if ($posts->currentPage() > 1)
                Page {{ $posts->currentPage() }}
            @else
                The latest blog posts about Laravel and its ecosystem.
            @endif
        </x-slot:title>

        <div class="mt-16">
            <ul class="grid gap-16 md:grid-cols-2">
                @foreach ($posts as $post)
                    <li>
                        <x-post :post="$post" />
                    </li>
                @endforeach
            </ul>

            {{ $posts->links() }}
        </div>
    </x-section>
</x-app>
