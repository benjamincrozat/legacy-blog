@if ($href = $attributes->except('no-wire-navigate')->get('href'))
    <a {{ $attributes->merge([
        'class' => 'inline-block px-4 py-3 font-bold leading-tight text-center transition-opacity rounded hover:opacity-75'
    ])->when(
        empty($noWireNavigate) && Str::startsWith($href, '/') || Str::startsWith($href, config('app.url')),
        function ($attributes) {
            $attributes->merge(['wire:navigate.hover' => true]);
        }
    ) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge([
        'class' => 'inline-block px-4 py-3 font-bold leading-tight text-center transition-opacity rounded hover:opacity-75',
    ]) }}>
        {{ $slot }}
    </button>
@endif
