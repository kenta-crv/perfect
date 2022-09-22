<div class="p-detailBox">
  @isset($title)
  <div class="p-detailBox__head">
    <h3 class="p-detailBox__head__title">{{ $title }}</h3>
    @isset($action)
    <div class="p-detailBox__head__action">
      {{ $action }}
    </div>
    @endisset
  </div>
  @endisset
  @isset($body)
  <div class="p-detailBox__body">
    {{ $body }}
  </div>
  @endisset
</div>