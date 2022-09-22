@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
@slot('body')
  <div class="a-page-title">
    <span><strong style="color: #003a16;"></strong>ユーザー設定編集</span>
  </div>
<div class="c-main-box active-cont">
    <div class="c-main-body">
      <form action="{{ route('storeAdmin.setting.user.update', ["id" => $userData->id]) }}" method="POST">
        <input type="hidden" name="account_id" value="{{ $userData->id }}">
        @csrf
        {{ method_field('put') }}
      <div class="mpage-container">
        <div class="mpage-cont_mypage">
          <div class="l-12">
            <div class="l-12__4">
              <div class="mpage-title"><span>会社名・屋号  *</span></div>
            </div>
            <div class="l-12__7">
              <input type="text" class="mpage-input padding_left_mpage" id="fname" name="company" placeholder="会社名・屋号" value="{{ $userData->company_name }}">
            </div>
            <div class="l-12__1">
              <button type="submit" class="mpage-btn mgn-l-4 mgn-t-1">保存</button>
            </div>
          </div>
          <div class="l-12 mgn-t-1">
            <div class="l-12__4">
              <div class="mpage-title"><span>住所  *</span></div>
            </div>
            <div class="l-12__7">
              <input type="text" class="mpage-input" id="email" name="address" placeholder="住所" value="{{ $userData->address }}">
            </div>
            <div class="l-12__1">
              <button type="submit" class="mpage-btn mgn-l-4 mgn-t-1">保存</button>
            </div>
          </div>
          <div class="l-12 mgn-t-1">
            <div class="l-12__4">
              <div class="mpage-title"><span>電話番号  *</span></div>
            </div>
            <div class="l-12__7">
              <input type="text" class="mpage-input padding_left_mpage" id="email" name="tel" placeholder="電話番号" value="{{ $userData->tel }}">
            </div>
            <div class="l-12__1">
              <button type="submit" class="mpage-btn mgn-l-4 mgn-t-1">保存</button>

            </div>
          </div>
          <div class="l-12 mgn-t-1">
            <div class="l-12__4">
              <div class="mpage-title"><span>メールアドレス  *</span></div>
            </div>
            <div class="l-12__7">
              <input type="text" class="mpage-input padding_left_mpage" id="email" name="email" placeholder="メールアドレス" value="{{ $userData->email }}">
            </div>
            <div class="l-12__1">
              <button type="submit" class="mpage-btn mgn-l-4 mgn-t-1">保存</button>
            </div>
          </div>
        </form>
        <form method="post" action="{{ route('storeAdmin.mypage.changepassword') }}">
          <input type="hidden" name="account_id" value="{{ $userData->id }}">
          @csrf
          <div class="l-12 mgn-t-1">
            <div class="l-12__4">
              <div class="mpage-title"><span>パスワード</span></div>
            </div>
            <div class="l-12__2">
              <span class="mpage-desc mgn-t-2">旧パスワード</span>
            </div>
            <div class="l-12__5">
              <input type="password" class="mpage-input padding_left_mpage" id="password-field_current" name="current_password" placeholder="旧パスワードを入力してください" value="">
              @if(Session::get('fail'))
              <span class="text-danger"> {{ Session::get('fail') }}  </span>
              @endif
            </div>
          
          </div>
          <div class="l-12 mgn-t-1">
            <div class="l-12__4">
              <div class="mpage-title"><span></span></div>
            </div>
            <div class="l-12__2">
              <span class="mpage-desc mgn-t-2">新パスワード</span>
            </div>
            <div class="l-12__5">
              <input type="password" class="mpage-input padding_left_mpage" id="password-field" name="password" placeholder="新パスワードを入力してください">
            </div>
          </div>
          <div class="l-12 ">
            <div class="l-12__6">
              <div class=""><span></span></div>
            </div>
            <div class="l-12__5 mpage-input">
              <span class="mpage-notice mgn-t-2">※半角英数記号が使えます。6文字以上、32文字以内</span>
            </div>
          </div>
          <div class="l-12">
            <div class="l-12__5">
              <div class="mpage-title"><span></span></div>
            </div>
            <div class="l-12__1">
              <span class="mpage-desc mgn-t-4"></span>
            </div>
            <div class="mpage-l--2 mpage-input">
              <label class="cnt mgn-r-4 mgn-t-3">
                <input class="yellow form_category_type" type="checkbox" value="1"  name="reins" onclick="togglePassword()" >
                <span class="checkmark"></span>
                <label for="reins">新パスワードを表示</label>
              </label>
              <button type="submit" class="mpage-btn mgn-t-2">保存</button>
            </div>
          </div>
        </form>
          <div class="l-12 ">
            <div class="l-12__4">
              <div class="mpage-title"><span>ロール権限{{ $userData->store_id }}</span></div>
            </div>
            <div class="l-12__2">
              @if($userData->store_id == 1)
              <span class="mgn-t-2">管理者</span>
              @else
              <span class="mgn-t-2">スタッフ</span>
              @endif
            </div>
          </div>
          <div class="l-12">
            <div class="l-12__4">
              <div class="mpage-title"><span>アクセスできる物件情報サイト</span></div>
            </div>
            <div class="l-12__2">
              <span class="mgn-t-2">レインズ、at BB</span>
            </div>
          </div>
        </div>
      </div>
    
    </div>
 </div>

@endslot
  @endcomponent
@endsection