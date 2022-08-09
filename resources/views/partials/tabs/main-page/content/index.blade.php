<div class="tab-content">
    @if($new_offers->count())
        @include('partials.tabs.main-page.content.new-arrivals.index')
    @endif
    @if($sale_offers->count())
        @include('partials.tabs.main-page.content.sale.index')
    @endif
</div>
