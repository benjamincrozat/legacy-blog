<x-app
    title="Learn about {{ $category->name }}"
    :description="$category->description"
>
    <div class="mt-16">
        <x-breadcrumb class="container lg:max-w-screen-md">
            {{ $category->name }}
        </x-breadcrumb>

        <article>
            <x-prose class="mt-8">
                <div class="container lg:max-w-screen-md">
                    <h1>Learn about <span class="{{ ! $category->presenter()->primaryColor() ?: 'text-' . $category->presenter()->primaryColor() }}">{{ $category->name }}</span></h1>

                    @if (! empty($tree = $category->presenter()->tree(
                        $category->content ? $category->presenter()->content() : $category->presenter()->longDescription()
                    )))
                        @php
                        if ($posts->isNotEmpty()) {
                            $tree[] = [
                                'value' => "Articles and tutorials about $category->name",
                                'children' => [],
                            ];
                        }
                        @endphp

                        <p class="font-bold">Table of contents:</p>
                        <x-tree :tree="$tree" />
                    @endif

                    @if ($category->content)
                        {!! $category->presenter()->content() !!}
                    @elseif ($category->long_description)
                        {!! $category->presenter()->longDescription() !!}
                    @endif

                    @if ($related->isNotEmpty())
                        <p><strong>Related topics:</strong></p>
                        <ul>
                            @foreach ($related as $relatedCategory)
                                <li>
                                    <a
                                        wire:navigate.hover
                                        href="{{ route('categories.show', $relatedCategory) }}"
                                    >
                                        {{ $relatedCategory->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if ($posts->isNotEmpty())
                        <h2 id="articles-and-tutorials-about-{{ Str::slug($category->name) }}">
                            <a href="#articles-and-tutorials-about-{{ Str::slug($category->name) }}">
                                Articles and tutorials about {{ $category->name }}
                            </a>
                        </h2>
                    @endif
                </div>

                @if ($posts->isNotEmpty())
                    <div class="container">
                        <div class="not-prose">
                            <ul class="grid gap-8 mt-8 md:grid-cols-2 md:gap-16">
                                @foreach ($posts as $post)
                                    <li>
                                        <x-post :post="$post" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{ $posts->links() }}
                    </div>
                @endif
            </x-prose>
        </article>
    </div>
</x-app>
