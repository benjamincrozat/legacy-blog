@php
$class = 'flex items-center gap-4 px-4 py-3 transition-colors duration-500 sm:p-4 group hover:bg-indigo-700/60 hover:text-white';
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
