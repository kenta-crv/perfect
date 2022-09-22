@extends('admin.layout.layout--auth')
@section('title', $title ?? 'ログイン')
@section('content')
<form method="POST" action="{{ route('admin.auth.login') }}">
  @csrf
  <div class="p-auth">
    <div class="p-auth__box_3">
      <div class="p-auth__box__head">
        {{-- <div class="p-auth__box__head__logo">
          <img src="{{asset('image/logo/logo.svg')}}" width="140" height="32">
        </div> --}}
        
        <h2 class="p-auth__box__head__title">
            <div class="container_center_2">
                <div class="container_box">
                    モダンアパートメント武蔵小山(モダンアパートメントムサシコヤマ)/104
                </div>
            </div><br/>
        </h2>
      </div>
      <div class="p-auth__box__body">
        
        <li class="p-list__item p-list__item--center">
          <div class="p-list__item__label">
            お問合せの種類　（必須）
          </div>
          <div class="p-list__item__data" style="overflow-wrap: break-word;">
            <div class="l-12 l-12--gap16">
                <div class="l-12__2 width-full_5">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                    <label for="vehicle1">空室かどうか確認したい</label><br>
                </div>
            </div>
          </div>
          <div class="p-list__item__data" style="overflow-wrap: break-word;">
            <div class="l-12 l-12--gap16">
                <div class="l-12__2 width-full_5">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                    <label for="vehicle1">内見したい</label><br>
                </div>
            </div>
          </div>
          <div class="p-list__item__data" style="overflow-wrap: break-word;">
            <div class="l-12 l-12--gap16">
                <div class="l-12__2 width-full_5">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                    <label for="vehicle1">その他</label><br>
                </div>
            </div>
          </div>
        </li>
          <li class="p-list__item p-list__item--center">
            <div class="p-list__item__label">
                お名前　（必須）
            </div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">
              <div class="c-input c-input--full">
                <input type="password" name="password" placeholder="" value="{{ old("password") }}">
              </div>
            </div>
          </li>
          <li class="p-list__item p-list__item--center">
            <div class="p-list__item__label">
                メールアドレス　（必須）
            </div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">
              <div class="c-input c-input--full">
                <input type="password" name="password" placeholder="" value="{{ old("password") }}">
              </div>
            </div>
          </li>
          <li class="p-list__item p-list__item--center">
            <div class="p-list__item__label">
                電話番号
            </div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">
              <div class="c-input c-input--full">
                <input type="password" name="password" placeholder="" value="{{ old("password") }}">
              </div>
            </div>
          </li>
          <li class="p-list__item p-list__item--center">
            <div class="p-list__item__label">
                その他連絡事項
            </div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">
              <div class="c-input c-input--full">
                <textarea name="" id="" cols="30" rows="10"></textarea>
              </div>
            </div>
          </li>
          
            <div class="foot_3">
              <div class="p-login__buttonArea">
                  <button type="submit" class="c-button c-button--full c-button--thinBlue">確認画面へ</button>
              </div>
          </div>
      </div>
    </div>
  </div>
</form>
@endsection




{{-- @extends('store.layouts.login_layout')
@section('page_name', 'ログイン')
@section('title', 'Qchan')
@section('description', 'クイズチャンネルはロボレがお届けするパチンコ・パチスロのクイズサイトのログイン。')
@section('keywords', 'Qchan, ロボレ, クイズ, パチンコ, パチスロ, ログイン')
@section('url', request()->url())
@section('image', asset('image/img/ogp.png'))

@section('content')
<div class="header__primary">
  ログイン
  <hr>
</div>
<div class="p-login">
  {{ Form::open(['route' => ['store.login'], 'method' => 'post', 'novalidate' => true]) }}
	<div class="p-login__body">
		<div class="l-container__sp">
			<div class="p-login__body__member">
				<div class="body">
					<ul class="p-formList">
						<li class="p-formList__item">
              <div class="p-formList__item__body">
                <div class="c-input c-input--full">
                  <div class="login_label">ログインID:</div> <input placeholder="メールアドレス" name="email" type="email" value="{{ old('email') }}">
                </div>
              </div>
              @include('store.layouts.error', ['name' => 'email'])
            </li>
            <li class="p-formList__item">
              <div class="p-formList__item__body">
                <div class=" c-input c-input--full ">
                  <div class="login_label">パスワード:</div> <input placeholder="パスワード" class="no-radius" name="password" type="password" value="">
                </div>
              </div>
              @include('store.layouts.error', ['name' => 'password'])
            </li>
					</ul>
				</div>
        <div class="foot">
          <div class="p-login__buttonArea">
            <button type="submit" class="c-button c-button--full c-button--thinBlue">ログイン</button>
            <a href="{{route('store.forget')}}" class="c-button--text">パスワードを忘れた場合</a>
          </div>
        </div>
			</div>
		</div>
	</div>
  {{Form::close()}}
</div>
@endsection

 --}}
