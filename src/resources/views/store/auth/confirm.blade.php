@extends('web.layouts.login_layout')
@section('page_name', '入力内容の確認')
@section('title', 'Qchan')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトの入力内容の確認。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, 入力内容の確認')
@section('url', request()->url())
@section('image', asset('image/img/ogp.png'))
@section('content')
<div class="p-login">
	<div class="p-login__head">
		<p class="text">入力内容の確認</p>
	</div>

	<div class="p-login__body">
		<div class="l-container__sp">
      {{-- @dump($data) --}}
      <div class="p-confirm">
		<div class="p-confirm--body">
			<div class="p-form">
              <ul class="p-formList">

                <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">ニックネーム</p>
	              </div>
	              <div class="p-formList__item__body">
	                <article class="c-input c-input--full">
	                  {{ $data['nickname'] }}
	                </article>
	              </div>
	            </li>

				<li class="p-formList__item ">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">メールアドレス</p>
	              </div>
	              <div class="p-formList__item__body">
	                <article class="c-input c-input--full">
	                  {{ $data['email'] }}
	                </article>
	              </div>
	            </li>
	
	            <li class="p-formList__item ">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">パスワード</p>
	              </div>
	              <div class="p-formList__item__body">
	                <article class="c-input c-input--full">
	                  *******
	                </article>
	              </div>
	            </li>

				<li class="p-formList__item ">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">住所</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="l-12 l-12--center l-12--gap8">
	                  <article class="c-input c-input--full">
	                    {{ $data['zipcode'] }}
	                  </article>
	                  <article class="c-input c-input--full">
	                    {{ Helper::prefNameFormat($data['prefecture']) }} {{ $data['address'] }}{{ $data['small_address'] }}
	                  </article>
	                  </article>
	                </div>
	              </div>
	            </li>

    			<li class="p-formList__item ">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">氏名</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="l-12 l-12--gap8">
	                  <div class="l-12__6">
	                    <article class="c-input c-input--full">
	                      {{ Helper::FullName($data['last_name'],$data['first_name']) }}
	                    </article>
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
	                    <article class="c-input c-input--full">
	                      {{ Helper::FullName($data['last_name_kana'],$data['first_name_kana']) }}
	                    </article>
	                  </div>
	                </div>
	              </div>
	            </li>

				<li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">プロフィール画像</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="l-12 l-12--center l-12--nowrap l-12--gap8">
	                  <article class="c-input c-input--full">
	                   <img src="{{ $data['photo_src'] }}">
					   <input type="hidden" name="photo_path" value="{{ $data['photo_path'] }}">
	                  </article>
	                </div>
	              </div>
	            </li>

	            <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">性別</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="l-12 l-12--gap8">
	                  <article class="c-input c-input--full">
	                    {{ Helper::gender_type($data['gender']) }}
	                  </article>
	                </div>
	              </div>
	            </li>
	
	            <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">生年月日</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="l-12 l-12--center l-12--nowrap l-12--gap8">
	                  <article class="c-input c-input--full">
	                    {{ $data['birthday'] }}
	                  </article>
	                </div>
	              </div>
	            </li>

	            <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">電話番号</p>
	              </div>
	              <div class="p-formList__item__body">
	                <div class="l-12 l-12--center l-12--nowrap l-12--gap8">
	                  <article class="c-input c-input--full">
	                    {{ $data['tel'] }}-{{ $data['tel2'] }}-{{ $data['tel3'] }}
	                  </article>
	                </div>
	              </div>
	            </li>
	
	            <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">パチンコ派パチスロ派</p>
	              </div>
	              <div class="p-formList__item__body">
	                <article class="c-input c-input--full">
	                  {{-- {{ Helper::interest_type($data['pachislot_flag']) }} --}}
					  {{-- {{ $data['pachislot_flag'] }} --}}
					  @if( $data['pachislot_flag'] == 1)
					  	パチンコ派
					  @endif	
					  @if( $data['pachislot_flag'] == 2)
					  	パチスロ派
				  	  @endif
					  @if( $data['pachislot_flag'] == 3)
					  	両方
					  @endif
					  @if( $data['pachislot_flag'] == 4)
					 	未経験
				  	  @endif
	                </article>
	              </div>
	            </li>
	
	            <li class="p-formList__item">
	              <div class="p-formList__item__head">
	                <p class="p-formList__item__head__title">メルマガ通知</p>
	              </div>
	              <div class="p-formList__item__body">
	                <article class="c-input c-input--full">
	                  {{ Helper::magazine_type($data['email_magazine_flag']) }}
	                </article>
	              </div>
	            </li>
	          </ul>
	        </div>
	      </div>
	      <div class="p-confirm--foot">
	        <div class="p-login__buttonArea">
	          <a href="{{ route('web.register.create') }}" class="c-button c-button--full c-button--blue">登録する</a>
	        </div>
	        <div class="p-login__buttonArea">
	          <button type="button" onclick="history.back()" class="c-button c-button--full c-button--gray c-button--heightregular">入力内容を修正</button>
	        </div>
	      </div>
	    </div>  
		</div>
	</div>
</div>
@endsection


