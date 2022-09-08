@extends('layouts.index')

@section('content')
    @include('partials.banners.medium.index')
    <div class="js_category-id" data-categoryid="{{ $category->id }}"></div>
    <div class="product-area pt-80 pb-80 product-style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    @include('partials.catalog.search.index')
                    @include('partials.catalog.categories.index')
                    @include('partials.catalog.price.index')
                    @include('partials.catalog.color.index')
                    <aside class="widget widget-size mb-30">
                        <div class="widget-title">
                            <h4>Size</h4>
                        </div>
                        <div class="widget-info size-filter clearfix">
                            <ul>
                                <li><a href="#">M</a></li>
                                <li><a class="active" href="#">S</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">SL</a></li>
                                <li><a href="#">XL</a></li>
                            </ul>
                        </div>
                    </aside>
                    @include('partials.catalog.small-banner.index')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                        @include('partials.catalog.change-views.index')
                        @if(isset($offers) && $offers->count())
                            @include('partials.product.block.catalog.index', ['active_tab' => 1])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
