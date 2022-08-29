<ul class="product-comments js_comments-wrap clearfix">
    @foreach($reviews as $data)
        @include('partials.reviews.item.index')
    @endforeach
</ul>
<div class="js_pagination-wrap">
    {{ $reviews->links() }}
</div>
