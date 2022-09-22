@extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録（本部登録）')
@section('content')
  @component('store.component._p-index')
  @slot('body')
  <div class="container_center "></div>
  <p class="register-label">
    Thanks
    <hr class="register-label-horizontal">
  </p>
</div><br/>
  <div class='registerHeadquarter_btn'>
    <a type ='button' href="/register/registerHeadquarter"><button class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2">Return</button></a>
  </div>
  @endslot
  @endcomponent
@endsection
