<div class="js_catalog-inner-wrap">
    <div class="tab-content">
        <div class="tab-pane {{ $active_tab == 1 ? 'active' : '' }}" id="grid-view">
            <div class="row">
                @if(isset($offers) && $offers->count())
                    @foreach($offers as $offer)
                        <div class="col-lg-4 col-md-6">
                            @include('partials.product.block.index')
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="tab-pane {{ $active_tab == 2 ? 'active' : '' }}" id="list-view">
            <div class="row shop-list">
                @if(isset($offers) && $offers->count())
                    @foreach($offers as $offer)
                        <div class="col-lg-12">
                            @include('partials.product.block.index', ['full' => true])
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="js_pagination-wrap js_pagination-wrap-catalog">
        {{ $offers->links() }}
    </div>
</div>

