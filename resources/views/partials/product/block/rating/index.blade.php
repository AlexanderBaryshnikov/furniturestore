@php
    /**
     * @var \App\Models\Offer $offer
     */

    $rating = $offer->getTotalRating();
@endphp
<div class="{{ !$rating ? 'opacity-0' : '' }} stars-wrap star-rating pro-rating floatright">
    <div class="js_star-rating-readonly star-rating floatright"
         data-rating="{{ $rating ?? 0 }}"></div>
</div>

