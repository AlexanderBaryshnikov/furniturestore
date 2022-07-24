@if($articles->count())
<div class="blog-area blog-2 pt-50">
    <div class="container">
        <!-- Section-title start -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title-border">From The Blog</h2>
                </div>
            </div>
        </div>
        <!-- Section-title end -->
        <div class="row">
            @foreach($articles as $article)
                @include('articles.list.item.index')
            @endforeach
        </div>
    </div>
</div>
@endif
