<div class="flex flex-col h-full">
    <h3 class="leading-tight text-xl font-bold text-{{ $category->primary_color }}">
        {{ $category->name }}
    </h3>

    <div class="flex-grow mt-4">
        {!! $category->description !!}
    </div>

    <p class="mt-6">
        <x-button
            href="{{ route('categories.show', $category) }}"
            class="bg-{{ $category->primary_color }} text-{{ $category->secondary_color }} w-full"
        >
            Read about {{ $category->name }}
        </x-button>
    </p>
</div>