@php
$class = 'flex items-center gap-4 p-4 transition-colors duration-500 group hover:bg-indigo-700/60 hover:text-white';
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
