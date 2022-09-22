@extends('web.layouts.login_layout')
@section('page_name', 'パスワードをお忘れの方へ')
@section('title', 'Qchan')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトのパスワードをお忘れの方へ。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, パスワードをお忘れの方へ,再設定')
@section('url', request()->url())
@section('image', asset('image/img/ogp.png'))

@section('content')
<div class="p-login">
  <div class="p-login__head">
    <p class="text">パスワード再設定</p>
  </div>
  {{ Form::open(['route' => 'web.forget', 'method' => 'post']) }}
  <div class="p-login__body">
    <div class="l-container__sp">
      <div class="p-login__body__member">
        <div class="head">
          <p class="title">パスワードお忘れの方へ</p>
          <p class="text">
            ご登録のメールアドレスを<br>ご入力後送信ボタンを押してください。
            <br>パスワード再設定ページのURLをメールでお送りします。</p>
          </p>
        </div>
        <div class="body">
          <ul class="p-formList">
            <li class="p-formList__item">
              <div class="p-formList__item__head">
                <p class="p-formList__item__head__title">メールアドレス</p>
              </div>
              <div class="p-formList__item__body">
                <div class="c-input c-input--full">
                  <input placeholder="メールアドレス" name="email" type="email" value="">
                </div>
                @include('web.layouts.error', ['name' => 'email'])
                {{-- @error('email')
                  <div class="p-formError">
                    <p class="message">
                      <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスの入力は必須です</strong>
                      </span>
                    </p>
                  </div>
                @enderror --}}
              </div>
            </li>
          </ul>
        </div>
        <div class="foot">
          <div class="p-login__buttonArea">
            <button type="submit" class="c-button c-button--full c-button--thinBlue">送信する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{ Form::close() }}

</div>
@endsection


