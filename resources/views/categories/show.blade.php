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
                <h1>Learn <span class="{{ ! $category->presenter()->primaryColor() ?: 'text-' . $category->presenter()->primaryColor() }}">{{ $category->name }}</span></h1>

                <p>This is the go-to place to learn all about {{ $category->name }}. I'm hard at work, writing an evergrowing amount of content covering the topic.</p>

                @if ($posts->isNotEmpty())
                    <h2 id="{{ $slug = 'resources-about-' . Str::slug($category->name) }}">
                        <a href="#{{ $slug }}">Resources about {{ $category->name }}</a>
                    </h2>

                    <ul>
                        @foreach ($posts as $post)
                            <li>
                                <a wire:navigate href="{{ route('posts.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

                {!! $category->presenter()->content() !!}
            </x-prose>
        </article>
    </div>
</x-app>
