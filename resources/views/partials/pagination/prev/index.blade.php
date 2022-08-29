@if($paginator->currentPage() - 1)
    <li><a href="{{ $paginator->url($paginator->currentPage() - 1) }}"
           data-page="{{ $paginator->currentPage() - 1 }}"
           class="js_pagination-page {{ $paginator->currentPage() <= 1 ? 'disabled' : '' }}"><i class="zmdi zmdi-long-arrow-left"></i></a>
    </li>
@endif
