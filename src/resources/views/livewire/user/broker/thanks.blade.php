@extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録')
@section('content')
  @component('store.component._p-index')
    @slot('body')
    <p class="save-label">
      お問い合わせを受け付けました。
      <hr class="register-label-horizontal-1">
    </p>
    <div class="confirm_btn"><a href="/"><button class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2">Topページへ</button></a></div>
    @endslot
  @endcomponent
@endsection
