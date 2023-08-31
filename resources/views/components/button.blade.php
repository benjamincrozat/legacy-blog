@if ($href = $attributes->get('href'))
    <a {{ $attributes->merge([
        'class' => 'inline-block px-4 py-3 font-bold leading-tight text-center transition-opacity rounded hover:opacity-75',
        'wire:navigate.hover' => Str::startsWith($href, '/') || Str::startsWith($href, config('app.url')),
    ]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge([
        'class' => 'inline-block px-4 py-3 font-bold leading-tight text-center transition-opacity rounded hover:opacity-75',
    ]) }}>
        {{ $slot }}
    </button>
@endif
