@if(isset($category->subcategories) && $category->subcategories->count())
    <div class="sub-menu menu-scroll">
        <ul>
            <li class="menu-title">{{ $category->name }}</li>
            @foreach($category->subcategories as $subcategory)
                <li><a href="{{ $subcategory->slug }}">{{ $subcategory->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endif
