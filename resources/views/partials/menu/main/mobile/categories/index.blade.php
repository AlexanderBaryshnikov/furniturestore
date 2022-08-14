@if($categories_list->count())
    <li><a href="#">Товары</a>
        <ul>
            <li class="menu-title"><a href="">Категории</a></li>
            <ul>
                @foreach($categories_list as $category)
                    <li><a class="parent-sub-menu" href="{{ $category->slug }}">{{ $category->name }}</a>
                        @include('partials.menu.main.mobile.categories.subcategories.index')
                    </li>
                @endforeach
            </ul>
        </ul>
    </li>
@endif
