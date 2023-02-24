<aside class="widget shop-filter mb-30">
    <div class="widget-title">
        <h4>Цена</h4>
    </div>
    <div class="widget-info">
        <div class="price_filter">
            <div class="price_slider_amount">
                <input id="min-price-range" class="js_min-price min-price input-price" type="text" name="min_price"
                       value="0" data-minprice="0">
                <input id="max-price-range" class="js_max-price max-price input-price" type="text" name="max_price"
                       value="{{ \App\Services\Pages\OfferService::getMaxPrice() }}" data-maxprice="{{ \App\Services\Pages\OfferService::getMaxPrice() }}">
            </div>
            <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
            </div>
        </div>
    </div>
</aside>
