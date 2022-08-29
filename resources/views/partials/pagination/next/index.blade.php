@if($paginator->currentPage() != $paginator->lastPage())
    <li>
        <a class="js_pagination-page {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}"
           data-page="{{ $paginator->currentPage() + 1 }}"
           href="{{ $paginator->url($paginator->currentPage() + 1) }}">
            <i class="zmdi zmdi-long-arrow-right"></i>
        </a>
    </li>
@endif
