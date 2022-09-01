<ul>
    <li><span class="color-title text-capitalize">Материал</span></li>
    @foreach($materials as $material)
        <li>{{ $material->name }}</li>
    @endforeach
</ul>
