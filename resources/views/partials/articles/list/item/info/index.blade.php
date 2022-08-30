<div class="blog-info">
    <div class="post-meta fix">
        <div class="post-date floatleft"><span
                class="text-dark-red">{{ \Illuminate\Support\Carbon::parse($article->created_at)->format('d') }}</span>
        </div>
        <div class="post-year floatleft">
            <p class="text-uppercase text-dark-red mb-0">{{ \Illuminate\Support\Carbon::parse($article->created_at)->format('F, Y') }}</p>
            <h4 class="post-title"><a href="{{ route('articles.page', ['article' => $article->slug]) }}" tabindex="0">{{ $article->title }}</a></h4>
        </div>
    </div>
    <div class="post-text">
        {!! \Illuminate\Support\Str::limit($article->text, 150)  !!}
    </div>
    @if($article->text)
        <a href="{{ route('articles.page', ['article' => $article->slug]) }}" class="button-2 text-dark-red">Читать далее...</a>
    @endif
</div>
