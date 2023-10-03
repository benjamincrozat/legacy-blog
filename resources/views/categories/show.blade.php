<x-app
    title="Learn about {{ $category->name }}"
    :description="$category->description"
>
    <x-section class="container mt-16">
        <x-slot:title class="text-center">
            <x-category-icon :category="$category" class="mx-auto" />

            <div class="mt-2">
                @if ($posts->currentPage() > 1)
                    Page {{ $posts->currentPage() }}
                @else
                    {{ $category->name }}
                @endif
            </div>
        </x-slot:title>

        <ul class="grid gap-16 mt-8 md:grid-cols-2">
            <li>
                <x-post-template
                    title="Your sponsored article here"
                    description="Talk about your business, stay on top of everything for a week, and get a valuable link for life."
                />
            </li>

            @foreach ($posts as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>

        {{ $posts->links() }}
    </x-section>
</x-app>
