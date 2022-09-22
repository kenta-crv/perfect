<ul class="p-listFlex {{ $class ?? '' }}">
  @foreach($data as $label => $val)
  <li class="p-listFlex__item">
    <div class="p-listFlex__item__label">
      {!! $label !!}
    </div>
    <div class="p-listFlex__item__data">
      {!! $val !!}
    </div>
  </li>
  @endforeach
</ul>
