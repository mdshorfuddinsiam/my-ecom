@if ($paginator->hasPages())
    <div id="pagination">
        <nav aria-label="Page navigation example">
            <ul class="pagination">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                        {{-- @dd(0) --}}
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        @dd(5)
                        <li class="page-item disabled" aria-disabled="true"><a class="page-link" href="javascript:void(0)">{{ $element }}</a></li>
                        {{-- <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li> --}}
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                {{-- @dd(100) --}}
                                <li class="page-item" aria-current="page"><a class="page-link page_active" href="javascript:void(0)">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
@endif