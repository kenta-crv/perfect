@extends('web.layouts.login_layout')

@section('page_name', 'パスワードをお忘れの方へ')
@section('title', 'Qchanログインのパスワード再発行')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトのパスワードをお忘れの方へ。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, みんなのクイズ, パスワード再発行')
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
					<p class="title">パスワードお忘れの方へ</p>
					<p class="text">メールアドレスにパスワード変更用の確認メールをお送りしました。ご確認をお願いいたします。</p>
				</div>
				<div class="body">
					<ul class="p-formList">
						<li class="p-formList__item">
              <div class="p-formList__item__head">
                <p class="p-formList__item__head__title">メールアドレス</p>
              </div>
              <div class="p-formList__item__body">
                <div class="c-input c-input--full">
                  <input placeholder="メールアドレス" name="last_name" type="text" value="">
                </div>           
              </div>
            </li> 
					</ul>	
				</div>
				<div class="foot">
					<div class="p-login__buttonArea p-buttonArea">
			      <a href="" class="c-button c-button--heightLarge">送信する</a>
			    </div>
				</div>				
			</div>
		</div>	
	</div>	
	
		
</div>	
@endsection


