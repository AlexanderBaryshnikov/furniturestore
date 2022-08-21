<div class="single-product">
    <div class="product-img">
        @if($offer->labels->count())
            @include('partials.product.block.labels.index')
        @endif
        <span class="pro-price-2">{{ $offer->price }} &#8381;</span>
        <a href="{{ route('offers.page', ['offer' => $offer->slug]) }}"><img src="{{ $offer->getFirstMediaUrl('offers') }}" alt="" /></a>
    </div>
    <div class="product-info clearfix text-center">
        <div class="fix">
            <h4 class="post-title"><a href="{{ route('offers.page', ['offer' => $offer->slug]) }}">{{ $offer->product->name }}</a></h4>
        </div>
        <div class="fix">
            @include('partials.product.block.rating.index')
        </div>
        @include('partials.product.block.action.index')
    </div>
</div>
