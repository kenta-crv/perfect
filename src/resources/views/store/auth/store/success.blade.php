@extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録（本部登録）完了')
@section('content')
  @component('store.component._p-index')
  @slot('body')
  <div class="container_center "></div>
  <p class="register-label">
    新規登録が完了いたしました。
    <hr class="register-label-horizontal">
  </p>
</div><br/>
  <div class='registerHeadquarter_btn'>
    <a type ='button' href="/store/login"><button class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2">ログイン</button></a>
  </div>
  @endslot
  @endcomponent
@endsection
