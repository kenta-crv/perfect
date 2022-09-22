@extends('web.layouts.login_layout')
@section('page_name', 'パスワード再設定')
@section('title', 'Qchan')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトのパスワード再設定。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, パスワード再設定')
@section('url', request()->url())
@section('image', asset('image/img/ogp.png'))

@section('content')
<div class="p-login">
	<div class="p-login__head">
		<p class="text">パスワード再設定</p>
	</div>

  {{ Form::open(['route' => 'web.password.update', 'method' => 'post']) }}
  <input type="hidden" name="token" value="{{ $token }}">
	<div class="p-login__body">
		<div class="l-container__sp">
			<div class="p-login__body__member">
				<div class="head">
					<p class="title">パスワード再設定</p>
					<p class="text">新しいパスワード入力し、<br>「パスワードを再設定する」ボタンをクリックしてください。</p>
				</div>
				<div class="body">
					<ul class="p-formList">
            <li class="p-formList__item">
              <div class="p-formList__item__head">
                <p class="p-formList__item__head__title">Eメール</p>
              </div>
              <div class="p-formList__item__body">
                <div class="c-input c-input--full">
                  <input type="email" data-option="size-l" name="email" placeholder="メールアドレス" value="{{ $email ?? old('email') }}" autocomplete="off">
                </div>
                @include('web.layouts.error', ['name' => 'email'])
              </div>
            </li>
						<li class="p-formList__item">
              <div class="p-formList__item__head">
                <p class="p-formList__item__head__title">パスワード(６文字以上)</p>
              </div>
              <div class="p-formList__item__body">
                <div class="c-input c-input--full">
                  <input type="password" name="password" placeholder="パスワードを入力" autocomplete="off">
                </div>
                @include('web.layouts.error', ['name' => 'password'])
              </div>
            </li>
            <li class="p-formList__item">
              <div class="p-formList__item__head">
                <p class="p-formList__item__head__title">パスワード確認用</p>
              </div>
              <div class="p-formList__item__body">
                <div class="c-input c-input--full">
                  <input type="password" name="password_confirmation" placeholder="パスワード(確認用)" autocomplete="off">
                </div>
              </div>
              @include('web.layouts.error', ['name' => 'password_confirmation'])
            </li>
					</ul>
				</div>
        <div class="foot">
          <div class="p-login__buttonArea">
            <button type="submit" class="c-button c-button--full c-button--thinBlue">パスワードを再設定する</button>
          </div>
        </div>
			</div>
		</div>
	</div>
  {{ Form::close() }}


</div>
@endsection


