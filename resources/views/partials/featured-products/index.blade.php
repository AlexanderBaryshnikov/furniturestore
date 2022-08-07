@if($recommended_offers->count())
    <div class="product-area pt-80 pb-30 product-style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">Рекомендуемые товары</h2>
                    </div>
                    <div class="product-slider js_product-slider style-2 arrow-left-right">
                        @foreach($recommended_offers as $offer)
                            <div class="col-12">
                                @include('partials.product.block.index')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
