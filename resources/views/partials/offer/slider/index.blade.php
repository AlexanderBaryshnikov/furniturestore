@if($offer->getMedia('offers')->count())
    <div class="single-pro-slider single-sml-photo slider-nav">
        @foreach($offer->getMedia('offers') as $photo)
            @include('partials.offer.slider.item.index')
        @endforeach
    </div>
@endif
