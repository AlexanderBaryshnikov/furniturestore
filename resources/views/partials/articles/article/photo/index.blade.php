<div class="blog-photo">
    <a href="#"><img src="{{ $article->getFirstMediaUrl('articles') }}" alt="" /></a>
    <div class="like-share fix">
        <a href="#"><i class="zmdi zmdi-account"></i><span>Thomas</span></a>
        <a href="#"><i class="zmdi zmdi-favorite"></i><span>{{ $article->like }} Like</span></a>
        <a href="#"><i class="zmdi zmdi-comments"></i><span>59 Comments</span></a>
        <a class="d-none d-md-block" href="#"><i class="zmdi zmdi-share"></i><span>29 Share</span></a>
    </div>
    <div class="post-date post-date-2">
        <span class="text-dark-red">{{ \Illuminate\Support\Carbon::parse($article->created_at)->format('d') }}</span>
        <span class="text-dark-red text-uppercase">{{ \Illuminate\Support\Carbon::parse($article->created_at)->format('F') }}</span>
    </div>
</div>
