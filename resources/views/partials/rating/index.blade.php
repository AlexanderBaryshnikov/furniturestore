@if($rating)
    <div class="stars-wrap star-rating pro-rating floatright">
        <div class="js_star-rating-readonly star-rating floatright"
             data-rating="{{ $rating ?? 0 }}"></div>
    </div>
@endif
