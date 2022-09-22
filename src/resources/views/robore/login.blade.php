@extends('robore.layout.layout--home')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('store.component._p-index')
@slot('body')
<div class="c-contianer-box_4">
  <div class="box-data">
    <div class="container-table margin-top--01">
          <div class="container_center"></div>
          <p class="register-label">
            ログイン
            <hr class="register-label-horizontal">
          </p>
      </div><br/>
      <div class="container_center"></div>
        <div class="register-description">
            <p class="font_description">複数店舗のお支払いをまとめる場合は、最初に「本部」としてのアカウントを作成し、次に店舗ごとのアカウントを作成します。</p>
            <p class="font_description">本部のアカウント作成に費用はかかりません。</p>
        </div>
      </div><br/><br/>
        <form method="post">
          <li class="p-list__item p-list__item--center">
            <div class="hp-label">
              ログインID
            </div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">

                <div class="c-input c-input--full_40">
                    <input type="text" wire:model="company_name" placeholder=" 半角英数字をご入力ください" class="hp-input">
                </div>
                <span class="text-danger"> @error('company_name') {{ $message }} @enderror </span>
            </div>
          </li>
          <li class="p-list__item p-list__item--center">
            <div class="hp-label">
              パスワード
            </div>
            <div class="p-list__item__data" style="overflow-wrap: break-word;">

                <div class="c-input c-input--full_40">
                    <input type="text" wire:model="company_name" placeholder=" 半角英数字をご入力ください" class="hp-input">
                </div>
                <span class="text-danger"> @error('company_name') {{ $message }} @enderror </span>
            </div>
          </li>

            <br/><br/>
            <div class="foot_3">
              <div class="p-login__buttonArea">
                <button type="submit" class="c-button_10 c-button--full c-button--thinBlue"><span>ログイン</span></button><br/>
                  <a href="#">パスワードを忘れた場合</a>
              </div>

          </div>
        </form>
    </div>
</div>
@endslot
@endcomponent
@endsection
