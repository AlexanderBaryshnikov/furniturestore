@if($offer->labels->count())
    <div class="label-wrap">
        @foreach($offer->labels as $label)
            @include('partials.labels.index')
        @endforeach
    </div>
@endif
