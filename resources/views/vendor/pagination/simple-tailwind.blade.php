@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        @if ($paginator->onFirstPage())
            <span class="flex items-center gap-[.35rem] opacity-30">
                <x-heroicon-s-arrow-left class="w-3 h-3 translate-y-[.5px]" /> Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="decoration-indigo-400/30 flex items-center gap-[.35rem] font-normal text-indigo-400 underline underline-offset-4">
                <x-heroicon-s-arrow-left class="w-3 h-3 translate-y-[.5px]" /> Previous
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="decoration-indigo-400/30 flex items-center gap-[.35rem] font-normal text-indigo-400 underline underline-offset-4">
                Next <x-heroicon-s-arrow-right class="w-3 h-3 translate-y-[.5px]" />
            </a>
        @else
            <span class="flex items-center gap-[.35rem] opacity-30">
                Next <x-heroicon-s-arrow-right class="w-3 h-3 translate-y-[.5px]" />
            </span>
        @endif
    </nav>
@endif
