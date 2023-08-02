@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-16">
        <div class="text-gray-400">
            {{ $paginator->count() }}
            {!! __('of') !!}
            <span>{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </div>

        <div class="flex gap-1">
            @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}" class="flex items-center justify-center w-8 h-8 text-gray-200 cursor-default">
                    ←
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="flex items-center justify-center w-8 h-8 text-blue-400 transition-colors bg-gray-100 rounded-sm hover:bg-gray-200/50 hover:text-blue-500">
                    ←
                </a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span aria-disabled="true" class="flex items-center justify-center w-8 h-8 text-gray-200 cursor-default">
                        <span>{{ $element }}</span>
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="flex items-center justify-center w-8 h-8 bg-gray-200 rounded-sm cursor-default">
                                <span>{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $url }}" class="flex items-center justify-center w-8 h-8 text-blue-400 transition-colors bg-gray-100 rounded-sm hover:bg-gray-200/50 hover:text-blue-500">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="flex items-center justify-center w-8 h-8 text-blue-400 transition-colors bg-gray-100 rounded-sm hover:bg-gray-200/50 hover:text-blue-500">
                    →
                </a>
            @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}" class="flex items-center justify-center w-8 h-8 text-gray-200 rounded-sm cursor-default">
                    →
                </span>
            @endif
        </div>
    </nav>
@endif
