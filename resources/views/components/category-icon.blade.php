<div {{ $attributes->except('category')->merge([
    'class' => 'flex items-center justify-center rounded-full w-[64px] h-[64px] bg-gradient-to-b from-' . $category->presenter()->primaryColor() . '/[.075] to-' . $category->presenter()->primaryColor() . '/[.025]',
]) }}>
    @if (File::exists(resource_path("svg/$category->slug.svg")))
        <x-dynamic-component
            component="icon-{{ $category->slug }}"
            class="fill-current w-[32px] h-[32px] text-{{ $category->presenter()->primaryColor() }}"
        />
    @else
        <x-heroicon-s-wrench class="w-[32px] h-[32px] text-{{ $category->presenter()->primaryColor() }}" />
    @endif
</div>
