@extends('web.layouts.login_layout')

@section('page_name', 'ログイン完了')
@section('title', 'Qchanにログインしました')
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
					<p class="title">メッセージを送信しました</p>
					<p class="text">メールアドレスにパスワード変更用の確認メールをお送りしました。ご確認をお願いいたします。</p>
				</div>
				<div class="foot">
					<div class="p-login__buttonArea p-buttonArea">
			      <a href="" class="c-button c-button--height__medium">ログインに戻る</a>
			    </div>
				</div>				
			</div>
		</div>	
	</div>	
	
		
</div>	
@endsection


