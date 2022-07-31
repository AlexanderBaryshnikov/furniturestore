@if($banners->count())
    <section class="slider-area slider-style-2">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                @foreach($banners as $banner)
                    <img src="{{ $banner->getFirstMediaUrl('banners') }}" alt=""
                         title="#slider-direction-{{ $loop->iteration }}"/>
                @endforeach
            </div>
            @foreach($banners as $banner)
                <div id="slider-direction-{{ $loop->iteration }}" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <div class="layer-1">
                                @if($banner->title)
                                    <div class="wow fadeInUpBig" data-wow-duration="2.5s" data-wow-delay="0.5s">
                                        <h2 class="slider-title1 text-uppercase mb-0"><span class="d-none d-md-block">elegent </span>
                                            furniture</h2>
                                    </div>
                                @endif
                                @if($banner->subtitle)
                                    <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                        <h2 class="slider-title2 text-uppercase">gallery 2021</h2>
                                    </div>
                                @endif
                                @if($banner->text)
                                    <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0.5s">
                                        {!! $banner->text !!}
                                    </div>
                                @endif
                                @if($banner->link)
                                    <div class="wow fadeInUpBig" data-wow-duration="3.5s" data-wow-delay="0.5s">
                                        <a href="{{ $banner->link }}" class="button-one style-2 text-uppercase mt-20"
                                           data-text="Shop now">{{ $banner->btn_text ?? 'Перейти' }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
