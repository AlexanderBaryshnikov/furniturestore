@if($offer->getMedia('offers')->count())
    <div class="position-relative">
        @include('partials.product.block.labels.index')
        <div class="single-pro-slider single-big-photo view-lightbox slider-for">
            @foreach($offer->getMedia('offers') as $photo)
                @include('partials.offer.main-photo.item.index')
            @endforeach
        </div>
    </div>
@endif
