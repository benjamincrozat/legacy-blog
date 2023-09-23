<div {{ $attributes->except('category')->merge(['class' => 'flex flex-col h-full']) }}>
    <div class="flex items-center justify-between">
        <h3
            class="text-xl font-bold leading-tight"
            style="color: {{ $category->presenter()->primaryColor() }}"
        >
            {{ $category->name }}
        </h3>

        <a wire:navigate.hover href="{{ route('categories.show', $category->slug) }}" class="flex-shrink-0">
            <x-category-icon :category="$category" />
        </a>
    </div>

    <div class="flex-grow mt-4">
        {!! $category->description !!}
    </div>

    <p class="mt-6">
        <x-button
            href="{{ route('categories.show', $category->slug) }}"
            style="color: {{ $category->presenter()->secondaryColor() }}; background-color: {{ $category->presenter()->primaryColor() }}"
        >
            Read about {{ $category->name }}
        </x-button>
    </p>
</div>
