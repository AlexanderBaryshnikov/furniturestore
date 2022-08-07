<ul class="tab-menu nav clearfix">
    @if($new_offers->count())
        <li><a class="active" href="#new-arrivals" data-bs-toggle="tab">Новые поступления</a></li>
    @endif
    @if($sale_offers->count())
        <li><a href="#discounts @if(!$new_offers->count()) active @endif" data-bs-toggle="tab">Распродажа</a>
        </li>
    @endif
</ul>
