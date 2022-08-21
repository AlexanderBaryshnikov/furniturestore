@extends('layouts.index')

@section('content')
    <div class="js_offer-id" data-offerid="{{ $offer_id ?? null }}"></div>
    @include('partials.banners.medium.index')
    <div class="product-area single-pro-area pt-80 pb-80 product-style-2">
        <div class="container">
            <div class="row shop-list single-pro-info no-sidebar">
                <div class="col-lg-12">
                    <div class="single-product clearfix">
                        @include('partials.offer.main-photo.index')
                        @include('partials.offer.info.index')
                    </div>
                </div>
            </div>
            <div class="single-pro-tab">
                <div class="row">
                    <div class="col-md-3">
                        @include('partials.offer.tabs.index')
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            @include('partials.offer.tabs.description.index')
                            @include('partials.offer.tabs.reviews.index')
                            @include('partials.offer.tabs.information.index')
                            @include('partials.offer.tabs.tags.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
