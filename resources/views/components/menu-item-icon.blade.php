<div class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded {{ $bgColorClass ?? 'bg-black' }}">
    <x-dynamic-component :component='"heroicon-$icon"' class="w-8 h-8 {{ $iconColorClass ?? 'text-white' }}" />
</div>
