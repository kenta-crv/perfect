@extends('web.layouts.login_layout')

@section('page_name', 'ログイン')
@section('title', 'Qchanマイページへのログイン')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトのログイン。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, ログイン')
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
					<p class="description">更新済の方は<br>こちらからログインしてください</p>
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
            <li class="p-formList__item">
              <div class="p-formList__item__head">
                <p class="p-formList__item__head__title">パスワード</p>
              </div>
              <div class="p-formList__item__body">
                <div class="c-input c-input--full">
                  <input placeholder="パスワード" name="last_name" type="text" value="">
                </div>           
              </div>
            </li>  
					</ul>	
				</div>
				<div class="foot">
					<div class="p-login__buttonArea p-buttonArea">
			      <a href="" class="c-button c-button--heightLarge">ログインする</a>
			    </div>
			    <div class="p-login__buttonArea p-buttonArea">
	          <a href="" class="c-button c-button--text">パスワードをお忘れの方</a>
	        </div>
				</div>	
					
			</div>
			<div class="p-login__body__register">
				<div class="text">
					<p class="title">はじめてのご登録の方へ</p>
				</div>
				<div class="p-login__buttonArea p-buttonArea">
	          <a href="" class="c-button c-button--blue c-button--radiustSmail">新規会員登録</a>
	        </div>
			</div>
		</div>	
	</div>	
	
		
</div>	
@endsection


