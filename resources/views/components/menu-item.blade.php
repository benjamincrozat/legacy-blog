@php
$class = 'flex items-center w-full gap-3 px-4 py-2 text-left transition-colors duration-500 group hover:bg-blue-400 hover:text-white';
@endphp

<li>
    @if ($href = $attributes->has('href'))
        <a @if (Str::startsWith($href, '/') || Str::startsWith($href, config('app.url'))) wire:navigate @endif {{ $attributes->merge(compact('class')) }}>
            @if (! empty($icon))
                <x-dynamic-component :component="'heroicon-' . $icon" class="w-5 h-5 translate-y-[.5px]" />
            @endif

            {{ $slot }}
        </a>
    @else
        <button {{ $attributes->merge(compact('class')) }}>
            @if (! empty($icon))
                <x-dynamic-component :component="'heroicon-' . $icon" class="w-5 h-5 translate-y-[.5px]" />
            @endif

            {{ $slot }}
        </button>
    @endif
</li>
