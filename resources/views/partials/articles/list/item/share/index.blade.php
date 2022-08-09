<div class="like-share text-center fix">
    @if($article->like)
        <a href="#"><i class="zmdi zmdi-favorite"></i><span>{{ $article->like }} Like</span></a>
    @endif
    <a href="#"><i class="zmdi zmdi-comments"></i><span>0 Comments</span></a>
    <a href="#"><i class="zmdi zmdi-share"></i><span>0 Share</span></a>
</div>
