<div class="product-info">
    <div class="fix">
        <h4 class="post-title floatleft">{{ $offer->product->name }}</h4>
        @include('partials.rating.index')
    </div>
    <div class="fix mb-20">
        <span class="pro-price">{{ $offer->price }} &#8381;</span>
    </div>
    <div class="product-description">
        {!! $offer->product->description !!}
    </div>
    @if($colors->count())
        <div class="color-filter single-pro-color mb-20 clearfix">
            @include('partials.offer.properties.colors.index')
        </div>
    @endif
    @if($materials->count())
        <div class="single-pro-size mb-35 clearfix">
            @include('partials.offer.properties.material.index')
        </div>
    @endif
    <div class="clearfix">
        <div class="cart-plus-minus">
            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
        </div>
        <div class="product-action clearfix">
            <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i
                    class="zmdi zmdi-favorite-outline"></i></a>
            <a href="{{ $offer->getFirstMediaUrl('offers') }}" data-lightbox="roadtrip" title="Quick View"><i
                    class="zmdi zmdi-zoom-in"></i></a>
            <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
            <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                    class="zmdi zmdi-shopping-cart-plus"></i></a>
        </div>
    </div>
    @include('partials.offer.slider.index')
</div>
