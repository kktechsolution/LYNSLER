<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
    <div class="dataTables_paginate paging_simple_numbers" id="kt_ecommerce_products_table_paginate">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="paginate_button page-item previous disabled" id="kt_ecommerce_products_table_previous">
                    <span class="page-link"><i class="previous"></i></span>
                </li>
            @else
                <li class="paginate_button page-item previous" id="kt_ecommerce_products_table_previous">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">
                        <i class="previous"></i>
                    </a>
                </li>
            @endif

            {{-- Page Links --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="paginate_button page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginate_button page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="paginate_button page-item">
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next" id="kt_ecommerce_products_table_next">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next">
                        <i class="next"></i>
                    </a>
                </li>
            @else
                <li class="paginate_button page-item next disabled" id="kt_ecommerce_products_table_next">
                    <span class="page-link"><i class="next"></i></span>
                </li>
            @endif
        </ul>
    </div>
</div>
