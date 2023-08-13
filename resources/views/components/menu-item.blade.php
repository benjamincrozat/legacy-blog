@php
$class = 'block w-full px-4 py-2 text-left transition-colors duration-500 group hover:bg-blue-400 hover:text-white';
@endphp

<li>
    @if ($attributes->has('href'))
        <a {{ $attributes->merge(compact('class')) }}>
            {{ $slot }}
        </a>
    @else
        <button {{ $attributes->merge(compact('class')) }}>
            {{ $slot }}
        </button>
    @endif
</li>
