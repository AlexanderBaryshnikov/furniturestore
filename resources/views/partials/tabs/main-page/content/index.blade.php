<div class="tab-content">
    @if($new_offers->count())
        <div class="tab-pane active" id="new-arrivals">
            <div class="row">
                @foreach($new_offers as $offer)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        @include('partials.product.block.index')
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if($sale_offers->count())
        <div class="tab-pane" id="discounts">
            <div class="row">
                @foreach($sale_offers as $offer)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        @include('partials.product.block.index')
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
