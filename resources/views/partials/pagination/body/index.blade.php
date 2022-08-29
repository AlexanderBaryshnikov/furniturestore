@include('partials.pagination.page.index', ['page' => 1])
@php
    $start = ($paginator->currentPage() > 3 && $paginator->lastPage() > 6)
        ? $paginator->currentPage() - 2
        : 2;
    $start = ($paginator->currentPage() >= $paginator->lastPage() - 1 && $paginator->lastPage() > 6)
        ? $paginator->lastPage() - 4
        : $start;
    $end = ($paginator->lastPage() > 6) ? ($start <= 2 ? $start + 3 : $start + 4) : $paginator->lastPage();
@endphp
@if($start > 2 && $paginator->lastPage() > 6)
    @include('partials.pagination.dots.index')
@endif
@for($i = $start; $i <= $end; $i++)
    @if($paginator->lastPage() < $i)
        @continue
    @endif
    @include('partials.pagination.page.index', ['page' => $i])
@endfor
@if($paginator->currentPage() < $paginator->lastPage() - 3 && $paginator->lastPage() > 6)
    @include('partials.pagination.dots.index')
    @include('partials.pagination.page.index', ['page' => $paginator->lastPage()])
@endif
