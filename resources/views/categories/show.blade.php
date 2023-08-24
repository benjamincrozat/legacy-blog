<x-app
    :title="$category->name"
    :description="$category->description"
>
    <div class="container mt-4 lg:max-w-screen-md">
        <x-breadcrumb>
            {{ $category->name }}
        </x-breadcrumb>

        <article>
            <x-prose class="mt-8">
                <h1>Learn about <span class="{{ ! $category->presenter()->primaryColor() ?: 'text-' . $category->presenter()->primaryColor() }}">{{ $category->name }}</span></h1>

                {!! $category->presenter()->content() !!}
            </x-prose>
        </article>
    </div>

    <x-section class="mt-16">
        <x-slot:title class="text-center">
            Articles about {{ $category->name }}
        </x-slot:title>

        <ul class="container grid gap-8 mt-8 md:grid-cols-2 md:gap-16">
            @foreach ($posts as $post)
                <li>
                    <x-post :post="$post" />
                </li>
            @endforeach
        </ul>
    </x-section>
</x-app>
