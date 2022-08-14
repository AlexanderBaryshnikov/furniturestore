@if(isset($category->subcategories) && $category->subcategories->count())
    <ul>
        @foreach($category->subcategories as $subcategory)
            <li><a href="{{ $subcategory->slug }}">{{ $subcategory->name }}</a></li>
        @endforeach
    </ul>
@endif
