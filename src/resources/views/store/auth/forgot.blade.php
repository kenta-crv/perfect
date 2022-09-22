@extends('admin.layout.layout--auth')
{{-- @extends('store.layouts.layout-store-hp') --}}
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('store.component._p-index-login')
@slot('body')


  <p class="login_label">パスワードリセット</p>
<div class="c-main-box --login">
  <div class="c-main-body">
        <form method="post" action="{{ route('storeAdmin.password.reset') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
            @if(Session::get('fail'))
            <div class="alert alert-dismissible alert-danger">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  {{ Session::get('fail') }}
            </div>
            @endif
            <li class="p-list__item p-list__item--center --login">
                <div class="p-list__item__label_2">
                メールアドレス
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="c-input c-input--full">
                    <input class="input--login" type="text" name="email" value="{{ $email ?? old('email') }}">
                </div>
                <span class="text-danger"> @error('email') {{ $message }}  @enderror </span>
                </div>
            </li>
            </li>
            <li class="p-list__item p-list__item--center --login">
            <div class="p-list__item__label_2">
                パスワード
            </div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="c-input c-input--full">
                <input class="input--login" type="password" name="password" placeholder="">
                </div>
                <span class="text-danger"> @error('password') {{ $message }}  @enderror </span>
            </div>
            </li>
            <li class="p-list__item p-list__item--center --login">
            <div class="p-list__item__label_2">
                パスワードの確認
            </div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="c-input c-input--full">
                <input class="input--login" type="password" name="confirm_password" placeholder="">
                </div>
                <span class="text-danger"> @error('password') {{ $message }}  @enderror </span>
            </div>
            </li>
            <br/>
            <div class="foot_3">
              <div class="p-login__buttonArea mgn-b-2">
                  <button type="submit" class="c-button c-button--full c-button--login">パスワード再設定用リンクの送信</button>
              </div>
            </div>
        </form>
@endslot
@endcomponent
  </div>
</div>
@endsection

