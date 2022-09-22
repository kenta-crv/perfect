<div class="p-detail {{ $class ?? ''}}">
  @isset($sidebar)
  <div class="p-detail__sidebar">
    {{ $sidebar }}
  </div>
  @endisset
  <div class="p-detail__main">
    @isset($back)
      <div class="p-detail__main__back">
        <a href="{{ $back }}" class="p-detail__main__back__button"></a>
      </div>
    @endisset
    @isset($title)
    <div class="p-detail__main__head">
      <h2 class="p-detail__main__head__title">{{ $title }}</h2>
      @isset($action)
      <div class="p-detail__main__head__action">
        {{ $action }}
      </div>
      @endisset
    </div>
    @endisset
    @isset($body)
    <div class="p-detail__main__body">
      {{ $body }}
    </div>
    @endisset
    @isset($foot)
    <div class="p-detail__foot">
      {{ $foot }}
    </div>
    @endisset
  </div>
</div>