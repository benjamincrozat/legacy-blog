<div {{ $attributes->except('category')->merge([
    'class' => 'flex items-center justify-center rounded-full w-[64px] h-[64px] bg-black/[.02]',
]) }}>
    @if (File::exists(resource_path("svg/$category->slug.svg")))
        <x-dynamic-component
            component="icon-{{ $category->slug }}"
            class="fill-current w-[50%] h-[50%]" style="color: {{ $category->presenter()->primaryColor() }}"
        />
    @else
        <x-heroicon-s-wrench class="w-[50%] h-[50%]" style="color: {{ $category->presenter()->primaryColor() }}" />
    @endif

    <span class="sr-only">{{ $category->name }}</span>
</div>
