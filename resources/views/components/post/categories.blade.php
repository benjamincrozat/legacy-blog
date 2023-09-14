@if ($categories->isNotEmpty())
    <ul class="flex gap-1 mt-5">
        @foreach ($categories as $category)
            <li>
                <a
                    wire:navigate.hover
                    href="{{ route('categories.show', $category) }}"
                    class="inline-block px-2 py-1 text-xs font-bold leading-normal uppercase transition-opacity rounded hover:opacity-75"
                    style="color: {{ $category->presenter()->secondaryColor() }}; background-color: {{ $category->presenter()->primaryColor() }}"
                >
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
