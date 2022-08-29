@if($paginator->hasPages())
    <div class="shop-pagination text-center">
        <div class="js_pagination pagination">
            <ul>
                @include('partials.pagination.prev.index')
                @include('partials.pagination.body.index')
                @include('partials.pagination.next.index')
            </ul>
        </div>
    </div>
@endif
