@extends('web.layouts.login_layout')

@section('page_name', '新規登録')
@section('title', 'Qchanの新規登録')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトの新規登録。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, 新規登録')
@section('url', request()->url())
@section('image', asset('image/img/ogp.png'))

@section('content')
<div class="p-login">
	<div class="p-login__head">
		<p class="text">新規登録</p>
	</div>

	<div class="p-login__body">
		<div class="l-container__sp">
			<div class="p-login__body__member">
				<div class="head">
					<p class="title">プロフィール</p>
					<p class="cnt">※「＊」は必須項目となります。</p>
				</div>
				<div class="body">
					<div class="p-form">
						<ul class="p-formList">
		          <li class="p-formList__item p-formList__item--required">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">氏名</p>
	              </div>
	              <div class="p-formList__item__body">
		              <div class="l-12 l-12--gap8">
			              <div class="l-12__6">
			                <div class="c-input c-input--full">
			                  <input placeholder="山田" name="last_name" type="text" value="">
			                </div>
			              </div>
			              <div class="l-12__6">
			                <div class="c-input c-input--full">
			                  <input id="first_name" placeholder="名" name="first_name" type="text" value="">
			                </div>
			              </div>
		              </div>
	              </div>
	            </li>

	            <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">ふりがな</p>
	              </div>
	              <div class="p-formList__item__body">
		              <div class="l-12 l-12--gap8">
			              <div class="l-12__6">
			                <div class="c-input c-input--full">
			                  <input placeholder="せい" name="last_name" type="text" value="">
			                </div>
			              </div>
			              <div class="l-12__6">
			                <div class="c-input c-input--full">
			                  <input id="first_name" placeholder="めい" name="first_name" type="text" value="">
			                </div>
			              </div>
		              </div>
	              </div>
	            </li>


	            <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">ニックネーム</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="c-input c-input--full">
	                  <input placeholder="ニックネーム" name="last_name" type="text" value="">
	                </div>
	              </div>
	            </li>

	            <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">性別</p>
	              </div>
	              <div class="p-formList__item__body">
		              <div class="l-12 l-12--gap8">
			              <div class="l-12">
			                <div class="c-input c-input--radio">
			                  <input id="gender_men" name="gender" type="radio" value="1">
												<label for="gender_men">男性</label>
			                </div>
			              </div>
			              <div class="l-12">
			                <div class="c-input c-input--radio">
			                  <input id="gender_women" checked="checked" name="gender" type="radio" value="2">
												<label for="gender_women">女性</label>
			                </div>
			              </div>
		              </div>
	              </div>
	            </li>

	            <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">生年月日</p>
	              </div>
	              <div class="p-formList__item__body">
		              <div class="l-12 l-12--center l-12--nowrap l-12--gap8">
			              <div class="l-12__auto">
			                <div class="c-input c-input--full">
			                  <input placeholder="年" name="last_name" type="text" value="">
			                </div>
			              </div>
			              <div class="l-12__none">年</div>
			              <div class="l-12__auto">
			                <div class="c-input c-input--full">
			                  <input placeholder="月" name="last_name" type="text" value="">
			                </div>
			              </div>
			              <div class="l-12__none">月</div>
			              <div class="l-12__auto">
			                <div class="c-input c-input--full">
			                  <input placeholder="日" name="last_name" type="text" value="">
			                </div>
			              </div>
			              <div class="l-12__none">日</div>
		              </div>
	              </div>
	            </li>


	            <li class="p-formList__item p-formList__item--required">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">住所</p>
	              </div>
	              <div class="p-formList__item__body">
		              <div class="l-12 l-12--center l-12--gap8">
		                <div class="c-input c-input--full">
		                  <input placeholder="郵便番号" name="last_name" type="text" value="">
		                </div>
		                <div class="c-input--select c-input--full">
			                <select name="" id="" class="c-select c-input__form">
				                <option value="">都道府県を選択</option>
				                <option value="">東京都</option>
				              </select>
	                	</div>
		                <div class="c-input c-input--full">
		                  <input placeholder="市区町村" name="last_name" type="text" value="">
		                </div>
		                <div class="c-input c-input--full">
		                  <input placeholder="番地・建物名・部屋番号" name="last_name" type="text" value="">
		                </div>
		              </div>
	              </div>
	            </li>



		          <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">電話番号</p>
	              </div>
	              <div class="p-formList__item__body">
		              <div class="l-12 l-12--center l-12--nowrap l-12--gap8">
			              <div class="l-12__auto">
			                <div class="c-input c-input--full">
			                  <input placeholder="" name="last_name" type="text" value="">
			                </div>
			              </div>
			              <div class="l-12__auto">-</div>
			              <div class="l-12__auto">
			                <div class="c-input c-input--full">
			                  <input placeholder="" name="last_name" type="text" value="">
			                </div>
			              </div>
			              <div class="l-12__auto">-</div>
			              <div class="l-12__auto">
			                <div class="c-input c-input--full">
			                  <input placeholder="" name="last_name" type="text" value="">
			                </div>
			              </div>
		              </div>
	              </div>
	            </li>

							<li class="p-formList__item p-formList__item--required">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">メールアドレス</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="c-input c-input--full">
	                  <input placeholder="メールアドレスを入力してください" name="last_name" type="text" value="">
	                </div>
	              </div>
	            </li>

	            <li class="p-formList__item p-formList__item--required">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">パスワード</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="c-input c-input--full">
	                  <input placeholder="6文字以上を入力してください" name="last_name" type="text" value="">
	                </div>
	              </div>
	            </li>

	            <li class="p-formList__item p-formList__item--required">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">パスワード確認用</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="c-input c-input--full">
	                  <input placeholder="6文字以上を入力してください" name="last_name" type="text" value="">
	                </div>
	              </div>
	            </li>

							<li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">パチンコ派パチスロ派</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="c-input--select c-input--full">
		                 <select name="" id="" class="c-select c-input__form">
			                 <option value="">パチンコ派</option>
			                 <option value="">バチスロスロ派</option>
			                </select>
	                </div>
	              </div>
	            </li>


	        	</ul>
					</div>
				</div>
				<div class="foot">
					<div class="p-newsLetter">
						<ul class="p-formList">
							<li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">メルマガを受け取りますか</p>
	              </div>
	              <div class="p-formList__item__body" style="display: flex;justify-content: center;">
		              <div class="l-12 l-12--gap8">
			              <div class="l-12">
			                <div class="c-input c-input--radio">
			                  <input id="receive" name="newsletter" type="radio" value="1">
												<label for="receive">受け取る</label>
			                </div>
			              </div>
			              <div class="l-12">
			                <div class="c-input c-input--radio">
			                  <input id="accept" checked="checked" name="newsletter" type="radio" value="2">
												<label for="accept">受け取らない</label>
			                </div>
			              </div>
		              </div>
	              </div>
	            </li>
						</ul>
					</div>

					<div class="p-login__buttonArea p-buttonArea">
			      <a href="" class="c-button c-button--heightLarge">登録する</a>
			    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


