@extends('web.layouts.login_layout')
@section('page_name', 'メールによる確認')
@section('title', 'Qchan')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトのメールによる確認。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, メールによる確認')
@section('url', request()->url())
@section('image', asset('image/img/ogp.png'))

@section('content')
<div class="header__primary">
  ログイン
</div>
<div class="p-login">
	<div class="p-login__body">
		<div class="l-container__sp">
			<div class="p-login__body__member">
				<div class="head">
					<p class="title">メールによる確認</p>
					<p class="text">確認メールをお送りいたしましたのでご確認ください。</p>
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


