<div class="flex items-center justify-center flex-shrink-0 w-8 h-8 md:w-12 md:h-12 rounded {{ $bgColorClass ?? 'bg-black' }}">
    <x-dynamic-component :component='"heroicon-$icon"' class="w-5 h-5 md:w-8 md:h-8 {{ $iconColorClass ?? 'text-white' }}" />
</div>
