<div class="tab-pane active" id="reviews">
    <div class="pro-tab-info pro-reviews">
        @if($reviews->count())
            <div class="js_customer-review customer-review mb-60">
                <h3 class="tab-title title-border mb-30">Отзывы</h3>
                <div class="js_comments-inner-wrap">
                    @include('partials.offer.tabs.reviews.list.index')
                </div>
            </div>
        @endif
        <div class="leave-review">
            @livewire('review-component')
        </div>
    </div>
</div>
