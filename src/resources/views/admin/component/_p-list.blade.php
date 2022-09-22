<ul class="p-list {{ $class ?? '' }}">
  @foreach($data as $label => $val)
  <li class="p-list__item p-list__item--center">
    <div class="p-list__item__label">
      {!! $label !!}
    </div>
    <div class="p-list__item__data" style="overflow-wrap: break-word;">
      {!! $val !!}
    </div>
  </li>
  @endforeach
</ul>
