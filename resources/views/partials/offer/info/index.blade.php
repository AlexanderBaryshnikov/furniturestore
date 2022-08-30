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
    <div class="color-filter single-pro-color mb-20 clearfix">
        <ul>
            <li><span class="color-title text-capitalize">color</span></li>
            <li><a class="active" href="#"><span class="color color-1"></span></a></li>
            <li><a href="#"><span class="color color-2"></span></a></li>
            <li><a href="#"><span class="color color-7"></span></a></li>
            <li><a href="#"><span class="color color-3"></span></a></li>
            <li><a href="#"><span class="color color-4"></span></a></li>
        </ul>
    </div>
    <div class="size-filter single-pro-size mb-35 clearfix">
        <ul>
            <li><span class="color-title text-capitalize">size</span></li>
            <li><a href="#">M</a></li>
            <li><a class="active" href="#">S</a></li>
            <li><a href="#">L</a></li>
            <li><a href="#">SL</a></li>
            <li><a href="#">XL</a></li>
        </ul>
    </div>
    <div class="clearfix">
        <div class="cart-plus-minus">
            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
        </div>
        <div class="product-action clearfix">
            <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
            <a href="{{ $offer->getFirstMediaUrl('offers') }}" data-lightbox="roadtrip" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
            <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
            <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
        </div>
    </div>
    @include('partials.offer.slider.index')
</div>
