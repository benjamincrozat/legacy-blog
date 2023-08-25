@php
$class = 'flex items-center w-full gap-4 p-4 text-left transition-colors duration-500 group hover:bg-blue-400 hover:text-white';
@endphp

<li>
    @if ($href = $attributes->get('href'))
        <a {{ $attributes->merge(compact('class') + [
            'wire:navigate' => empty($noWireNavigate) && Str::startsWith($href, '/') || Str::startsWith($href, config('app.url')),
        ]) }}>
            @if (! empty($icon))
                <x-dynamic-component :component="'heroicon-' . $icon" class="flex-shrink-0 w-5 h-5 translate-y-[.5px]" />
            @endif

            {{ $slot }}
        </a>
    @else
        <button {{ $attributes->merge(compact('class')) }}>
            @if (! empty($icon))
                <x-dynamic-component :component="'heroicon-' . $icon" class="flex-shrink-0 w-5 h-5 translate-y-[.5px]" />
            @endif

            {{ $slot }}
        </button>
    @endif
</li>
