@extends('admin.layout.layout--auth')
@section('title', $title ?? 'ログイン')
@section('content')
{{--  <form method="POST" action="#">  --}}
  @csrf
  <div class="p-auth">
    <div class="p-auth__box">
      <div class="p-auth__box__head">
        <div class="p-auth__box__head__logo">
          <img src="{{asset('image/logo/logo.svg')}}" width="140" height="32">
        </div>
        <h2 class="p-auth__box__head__title">
          パスワード再発行
        </h2>
      </div>
      <div class="p-auth__box__body">
        <ul class="p-list p-list--column">
          <li class="p-list__item p-list__item--center">
            <div class="p-list__item__label"></div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">
              <div class="c-input c-input--full">
                登録済みのメールアドレスを入力の上、「送信ボタン」をクリックしてください。
              </div>
            </div>
          </li>
          <li class="p-list__item p-list__item--center">
            <div class="p-list__item__label">
              ログイン用メールアドレス
            </div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">
              <div class="c-input c-input--full">
                <input type="text" name="email" placeholder="mail@address.co.jp" value="{{ old("email") }}">
              </div>
            </div>
          </li>
          @if($errors->first())
            <div class="p-formError p-formError--admin">
              <p class="message">
                <span class="invalid-feedback" role="alert">
                  {{-- @foreach ($errors->first() as $error) --}}
                    <strong>{{ $errors->first() }}</strong>
                  {{-- @endforeach --}}
                </span>
              </p>
            </div>
          @endif
          <li class="p-list__item p-list__item--center">
            <div class="p-list__item__label"></div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">
              <button type="submit"  id="loginAccount" class="c-button c-button--large c-button--full">ログイン</button>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </div>
{{--  </form>  --}}
@endsection
