<ul>
    <li><span class="color-title text-capitalize">Цвет</span></li>
    @foreach($colors as $slug => $color)
        @foreach($color as $item)
            <li class="{{ $offer->slug == $slug ? 'active' : '' }}">
                <a href="{{ route('offers.page', ['offer' => $slug]) }}">
                    <span class="color" style="background-color: {{ \App\Services\Properties\Color\ColorService::getColorValue($item) }}"></span>
                </a>
            </li>
        @endforeach
    @endforeach
</ul>
