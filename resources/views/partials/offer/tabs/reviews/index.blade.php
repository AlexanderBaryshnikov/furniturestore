<div class="tab-pane active" id="reviews">
    <div class="pro-tab-info pro-reviews">
        @if($offer->reviews()->count())
            <div class="customer-review mb-60">
                <h3 class="tab-title title-border mb-30">Отзывы</h3>
                <ul class="product-comments clearfix">
                    @foreach($offer->reviews as $review)
                        <li class="mb-30 col-12">
                            <div class="pro-reviewer-comment">
                                <div class="fix">
                                    <div class="floatleft mbl-center">
                                        <div class="mb-0"><strong>{{ $review->name }}</strong></div>
                                        <p class="reply-date">{{ \Illuminate\Support\Carbon::createFromTimestamp($review->created_at)->translatedFormat('j F Y G:i') }}</p>
                                        @if($review->rating)
                                            <div class="stars-wrap star-rating">
                                                <div class="js_star-rating-review-readonly"
                                                     data-rating="{{ $review->rating }}"></div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <p class="mb-0">{{ $review->text }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="leave-review">
            @livewire('review-component')
        </div>
    </div>
</div>
