<div class="single-product single-product-block clearfix">
    <div class="product-img">
        @if($offer->labels->count())
            @include('partials.product.block.labels.index')
        @endif
        <span class="pro-price-2">{{ $offer->price }} &#8381;</span>
        <a href="{{ route('catalog.offer', ['category' => $offer->product->category, 'product' => $offer->product, 'offer' => $offer->slug]) }}"><img src="{{ $offer->getFirstMediaUrl('offers') }}" alt="" /></a>
    </div>
    <div class="product-info clearfix text-{{ isset($full) ? 'left' : 'center' }}">
        <div class="fix">
            <h4 class="post-title"><a href="{{ route('catalog.offer', ['category' => $offer->product->category, 'product' => $offer->product, 'offer' => $offer->slug]) }}">{{ $offer->getNameWithSku() }}</a></h4>
        </div>
        <div class="fix d-flex justify-content-{{ isset($full) ? 'left' : 'center' }}">
            @include('partials.product.block.rating.index')
        </div>
        @if(isset($full))
            <div class="product-description">
                {!! $offer->product->description !!}
            </div>
        @endif
        @include('partials.product.block.action.index')
    </div>
</div>
