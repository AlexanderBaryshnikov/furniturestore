<div class="product-option mb-30 clearfix">
    <ul class="nav d-block shop-tab">
        <li><a class="js_catalog-tab-ico js_catalog-tab-grid-view active" href="#grid-view" data-bs-toggle="tab"><i class="zmdi zmdi-view-module"></i></a></li>
        <li><a class="js_catalog-tab-ico js_catalog-tab-list-view" href="#list-view" data-bs-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
    </ul>
    <div class="showing text-end d-none d-md-block">
        <p class="mb-0">{{ $count_offers . ' ' . \Illuminate\Support\Facades\Lang::choice('товарное предложение|товарных предложения|товарных предложений', $count_offers) }}</p>
    </div>
</div>
