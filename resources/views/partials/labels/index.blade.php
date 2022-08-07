@if($label->count())
    <span class="pro-label {{ \Illuminate\Support\Str::lower($label->name) }}-label"
          style="background-color: {{ $label->bg_color }}; color: {{ $label->color }};">{{ $label->name }}</span>
@endif
