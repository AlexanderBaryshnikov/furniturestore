@extends('layouts.index')

@section('content')
    @include('partials.banners.medium.index')
    <div class="blog-area blog-2 blog-details-area  pt-80 pb-80">
        <div class="container">
            <div class="blog">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-blog mb-30">
                            @include('article.photo.index')
                            <div class="blog-info blog-details-info">
                                @include('article.content.index')
                                @include('article.share.index')
                                <div class="pro-reviews mt-60">
                                    @include('article.customer-review.index')
                                    @include('article.leave-review.index')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
