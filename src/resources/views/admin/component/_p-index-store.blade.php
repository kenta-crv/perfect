<div class="p-index-store">
    @isset($title)
    <div class="p-index__head">
      <h2 class="p-index__head__title">{{ $title }}</h2>
      @isset($action)
      <div class="p-index__head__action">
        {{ $action }}
      </div>
      @endisset
    </div>
    @endisset
    @isset($body)
    <div class="p-index__body ">
      {{ $body }}
    </div>
    @endisset
  </div>
  