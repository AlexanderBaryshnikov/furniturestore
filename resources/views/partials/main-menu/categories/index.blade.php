@if($categories_list->count())
    <li><a href="">Товары</a>
        <div class="sub-menu menu-scroll">
            <ul>
                <li class="menu-title">Категории</li>
                @foreach($categories_list as $category)
                    <li><a class="parent-sub-menu" href="{{ $category->slug }}">{{ $category->name }}</a>
                        @include('partials.main-menu.categories.subcategories.index')
                    </li>
                @endforeach
            </ul>
        </div>
    </li>
@endif
