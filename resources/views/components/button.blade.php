@php
$attributes->except('no-wire-navigate');
@endphp

@if ($href = $attributes->get('href'))
    <a
        {{ $attributes->merge([
            'class' => 'inline-block px-4 py-3 font-bold leading-tight text-center transition-opacity rounded hover:opacity-75'
        ]) }}
        @if (empty($noWireNavigate) && (Str::startsWith($href, '/') || Str::startsWith($href, config('app.url'))))
            wire:navigate.hover
        @endif
    >
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge([
        'class' => 'inline-block px-4 py-3 font-bold leading-tight text-center transition-opacity rounded hover:opacity-75',
    ]) }}>
        {{ $slot }}
    </button>
@endif
