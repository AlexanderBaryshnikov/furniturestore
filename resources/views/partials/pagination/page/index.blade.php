<li>
    <a href="{{ $paginator->url($page) }}" data-page="{{ $page }}" aria-current="page"
       class="js_pagination-page {{ ($page == $paginator->currentPage()) ? 'active disabled' : '' }}">{{ $page }}</a>
</li>
