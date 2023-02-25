<div class="single-product single-product-block clearfix">
    <div class="product-img">
        <a href="{{ route('catalog.category', ['category' => $category->slug]) }}"><img src="{{ $category->getFirstMediaUrl('category') }}" alt="" /></a>
    </div>
    <div class="product-info clearfix text-{{ isset($full) ? 'left' : 'center' }}">
        <div class="fix">
            <h4 class="post-title"><a href="{{ route('catalog.category', ['category' => $category->slug]) }}">{{ $category->name }}</a></h4>
        </div>
    </div>
</div>
