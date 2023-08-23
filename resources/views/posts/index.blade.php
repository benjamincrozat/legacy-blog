<x-app
    title="Everything I wrote about Laravel and its ecosystem."
>
    <x-section class="container mt-16">
        <x-slot:title class="text-center">
            Everything I wrote about Laravel and its ecosystem.
        </x-slot:title>

        <div class="container mt-16">
            <ul class="grid gap-8 md:grid-cols-2">
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
