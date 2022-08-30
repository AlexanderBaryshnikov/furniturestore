<div class="blog-photo">
    <a href="{{ route('articles.page', ['article' => $article->slug]) }}"><img src="{{ $article->getFirstMediaUrl('articles') }}" alt=""/></a>
    @include('partials.articles.list.item.share.index')
</div>
