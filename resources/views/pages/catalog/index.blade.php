@extends('layouts.index')

@section('content')
    @include('partials.banners.medium.index')
    <div class="product-area pt-80 pb-80 product-style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                        @if(isset($categories_list) && $categories_list->count())
                            <div class="js_catalog-inner-wrap">
                                <div class="row">
                                    @foreach($categories_list as $category)
                                        <div class="col-lg-4 col-md-6">
                                            @include('partials.catalog.block.index')
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
