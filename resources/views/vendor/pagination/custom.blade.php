
@if ($paginator->hasPages())
    <ul class="pagination mt-3 justify-content-center pagination_style1">
       
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link"><i class="linearicons-arrow-left"></i></a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="linearicons-arrow-left"></i></a></li>
        @endif
      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
            @endif
           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="linearicons-arrow-right"></i></a></li>
        @else
            <li class="page-item disabled"><a class="page-link"><i class="linearicons-arrow-right"></i></a></li>
        @endif
    </ul>
@endif 