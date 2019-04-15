<link href="/css/lists.css" rel="stylesheet">
@if ($paginator->hasPages())
<div class = "container">

    <nav aria-label="Page navigation example">
    <ul class="pagination">
        
  
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item"><a class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </a></li>
        @else
        <li class="page-item"><a class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="page-item"><a class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item"><a  aria-current="page"><span class="page-link">{{ $page }}</span></a></li>
                    @else
                    <li class="page-item"><a class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item"><a class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </a></li>
        @else
        <li class="page-item"><a class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </a></li>
        @endif
    
    </ul>
    </nav>
</div>
@endif
