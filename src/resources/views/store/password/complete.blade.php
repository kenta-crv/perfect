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

	<div class="p-login__body">
		<div class="l-container__sp">
			<div class="p-login__body__member">
				<div class="head">
					<p class="title">パスワード再設定メールを<br>送信しました</p>
					<p class="text">
            ご指定のメールアドレス宛に<br>パスワード再設定メールをお送りしました。
            <br/>メールに記入されたURLからパスワードを再設定してください。
          </p>
				</div>
				<div class="foot">
					<div class="p-login__buttonArea">
            <a href="{{ route('web.login') }}" class="c-button c-button--full c-button--thinBlue">ログインに戻る</a>
          </div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection


