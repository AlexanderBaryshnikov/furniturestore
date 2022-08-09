<div class="tab-pane" id="discounts">
    <div class="row">
        @foreach($sale_offers as $offer)
            <div class="col-xl-3 col-lg-4 col-md-6">
                @include('partials.product.block.index')
            </div>
        @endforeach
    </div>
</div>
