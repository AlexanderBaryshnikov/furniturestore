@if(isset($filters) && count($filters))
    <div class="js_wrap-catalog-filters">
        @foreach($filters as $name => $filter)
            @include('partials.catalog.filters.item.index')
        @endforeach
    </div>
@endif
