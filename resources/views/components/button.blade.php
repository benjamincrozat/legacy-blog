@if ($attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'inline-block px-4 py-3 font-bold leading-tight transition-opacity rounded hover:opacity-75']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'inline-block px-4 py-3 font-bold leading-tight transition-opacity rounded hover:opacity-75']) }}>
        {{ $slot }}
    </button>
@endif
