@extends('layouts.index')

@section('content')
    <div class="js_article-id" data-articleid="{{ $article_id ?? null }}"></div>
    @include('partials.banners.medium.index')
    <div class="blog-area blog-2 blog-details-area  pt-80 pb-80">
        <div class="container">
            <div class="blog">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-blog mb-30">
                            @include('partials.articles.article.photo.index')
                            <div class="blog-info blog-details-info">
                                @include('partials.articles.article.content.index')
                                @include('partials.articles.article.share.index')
                                <div class="pro-reviews mt-60">
                                    @include('partials.articles.article.customer-review.index')
                                    <div class="leave-review">
                                        @livewire('review-component')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
