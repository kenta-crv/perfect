@extends('web.layouts.login_layout')

@section('page_name', 'アカウントの有効化')
@section('title', 'Qchan')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトのアカウントの有効化。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, アカウントの有効化')
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
					<p class="text">確認メールのリンクがクリックされました。<br>アカウントが有効化されました。</p>
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


