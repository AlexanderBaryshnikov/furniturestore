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
                                    @include('partials.banners.main.title.index')
                                @endif
                                @if($banner->subtitle)
                                    @include('partials.banners.main.subtitle.index')
                                @endif
                                @if($banner->text)
                                    @include('partials.banners.main.text.index')
                                @endif
                                @if($banner->link)
                                    @include('partials.banners.main.link.index')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
