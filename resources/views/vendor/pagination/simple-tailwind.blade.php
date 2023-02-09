@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        @if ($paginator->onFirstPage())
            <span class="opacity-30">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="decoration-indigo-400/30 font-normal text-indigo-400 underline underline-offset-4">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="decoration-indigo-400/30 font-normal text-indigo-400 underline underline-offset-4">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="opacity-30">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
