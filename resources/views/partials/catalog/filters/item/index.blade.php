<aside class="widget widget-color mb-30">
    <div class="widget-title">
        <h4>{{ $name }}</h4>
    </div>
    <div class="widget-info color-filter clearfix">
        <ul>
            @foreach($filter as $item)
                <label><input class="js_input-filter" type="checkbox" name="property_id_{{ $item['property_id'] . '_' . $item['value_id'] }}" value="{{ $item['value_id'] }}" data-propertyid="{{ $item['property_id'] }}">{{ $item['value'] }}</label>
                @if (!$loop->last)
                    <br>
                    @endif
            @endforeach
        </ul>
    </div>
</aside>
