<div {{ $attributes->except('category')->merge(['class' => 'flex flex-col h-full']) }}>
    <div class="flex items-center justify-between">
        <h3 class="leading-tight text-xl font-bold text-{{ $category->presenter()->primaryColor() }}">
            {{ $category->name }}
        </h3>

        <x-category-icon :category="$category" />
    </div>

    <div class="flex-grow mt-4">
        {!! $category->description !!}
    </div>

    <p class="mt-6">
        <x-button
            href="{{ route('categories.show', $category) }}"
            class="bg-{{ $category->presenter()->primaryColor() }} text-{{ $category->presenter()->secondaryColor() }} w-full"
        >
            Read about {{ $category->name }}
        </x-button>
    </p>
</div>
