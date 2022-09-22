@extends('web.layouts.login_layout')

@section('page_name', 'ログイン完了')
@section('title', 'Qchan')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトのログイン完了。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, ログイン完了')
@section('url', request()->url())
@section('image', asset('image/img/ogp.png'))

@section('content')
<div class="p-login">
	<div class="p-login__head">
		<p class="text">ログイン</p>
	</div>

	<div class="p-login__body">
		<div class="l-container__sp">
			<div class="p-login__body__member">
				<div class="head">
					<p class="title">会員登録が完了しました</p>
					<p class="text">ご登録ありがとうございます。<br>入力いただきましたメールアドレス宛に<br>確認メールをお送りいたしましたのでご確認ください。</p>
				</div>
        <div class="foot">
          <div class="p-login__buttonArea">
            <a href="{{ route('web.home') }}" class="c-button c-button--full c-button--thinBlue">トップページへ</a>
          </div>
        </div>
			</div>
		</div>
	</div>


</div>
@endsection

