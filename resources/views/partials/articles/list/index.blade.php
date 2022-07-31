@if($articles->count())
<div class="blog-area blog-2 pt-50 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title-border">Статьи</h2>
                </div>
            </div>
        </div>
        <div class="row article-list">
            @foreach($articles as $article)
                @include('partials.articles.list.item.index')
            @endforeach
        </div>
    </div>
</div>
@endif
