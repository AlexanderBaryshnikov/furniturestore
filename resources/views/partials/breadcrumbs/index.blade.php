@unless ($breadcrumbs->isEmpty())
    <div class="breadcumbs pb-15" aria-label="Breadcrumb">
        <ul>
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    </li>
                @else
                    <li aria-current="page">
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endunless
