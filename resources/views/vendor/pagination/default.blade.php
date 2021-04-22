@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            {{-- Link previous disabled --}}
                <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="#" class="page-link">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link"  href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item" class="disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active page-item" aria-current="page"><a href="#" class="page-link"><span aria-hidden="true">{{ $page }}</span></a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            
            @if ($paginator->hasMorePages())
                 <li class="page-item">
                    <a class="page-link"  href="{{ $paginator->nextPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&raquo;</a>
                </li>
            @else
            {{-- Link next disabled --}}
                <li class="disabled page-item"  aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a href="#" class="page-link">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
