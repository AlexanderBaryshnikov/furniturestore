<ul>
    <li><span class="color-title text-capitalize">Цвет</span></li>
    @foreach($colors as $slug => $color)
        @foreach($color as $item)
            <li class="{{ $offer->slug == $slug ? 'active' : '' }}">
                <a href="{{ route('catalog.offer', ['category' => $offer->product->category, 'product' => $offer->product, 'offer' => $slug]) }}">
                    <span class="color" style="background-color: {{ \App\Services\Properties\Color\ColorService::getColorValue($item) }}"></span>
                </a>
            </li>
        @endforeach
    @endforeach
</ul>
