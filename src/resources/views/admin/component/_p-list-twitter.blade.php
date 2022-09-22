<ul class="p-list {{ $class ?? '' }}">
  @foreach($data as $label => $val)
  <li class="p-list__item p-list__item--center">
    <div class="p-list__item__label__twitter">
      {!! $label !!}
    </div>
  </li>
  @endforeach
</ul>
