@php
$class = 'flex items-center w-full gap-4 p-3 transition-colors duration-500 md:p-4 group hover:bg-blue-700/60 hover:text-white';
@endphp

<li class="font-medium">
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
