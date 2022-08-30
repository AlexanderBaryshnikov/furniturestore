<li class="mb-30 col-12">
    <div class="pro-reviewer-comment">
        <div class="fix">
            <div class="floatleft mbl-center">
                <div class="mb-0"><strong>{{ $data->name }}</strong></div>
                <p class="reply-date">{{ \Illuminate\Support\Carbon::parse($data->created_at)->translatedFormat('j F Y G:i') }}</p>
                @if($data->rating)
                    <div class="stars-wrap star-rating">
                        <div class="js_star-rating-readonly"
                             data-rating="{{ $data->rating }}"></div>
                    </div>
                @endif
            </div>
        </div>
        <p class="mb-0">{{ $data->text }}</p>
    </div>
</li>
