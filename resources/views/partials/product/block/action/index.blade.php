<div class="product-action clearfix {{ isset($full) ? 'm-0' : '' }}">
    <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
    <a href="{{ $offer->getFirstMediaUrl('offers') }}" data-lightbox="roadtrip"><i class="zmdi zmdi-zoom-in"></i></a>
    <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
</div>
