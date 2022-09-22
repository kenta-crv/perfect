@extends('store.layouts.layout--store')
@section('title', $title ?? '胞衣兵')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}
        マイページ
    @endslot
    @slot('action')

    @endslot
    @slot('body')
    <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <span></span>作成者
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                          <input type="text" name="title" placeholder="タイトル">
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <span></span>メールアドレス
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                          <input type="text" name="title" placeholder="タイトル">
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <span></span>パスワード
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                            パスワードの変更
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <span></span>ロール権限
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                            管理者
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <span></span>アクセスできる物件情報サイト
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                            レインズ、at BB
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
          </div>
        </div>
      </div>
    @endslot
@endcomponent
@endsection


{{-- @extends('store.layouts.login_layout')
@section('content')

    <div class="header_center">
        ヘッダ
        <hr>
    </div>

    <div class="box_nav_2">
        メニュー
    </div>

    <div class="header_left_label_robore_staff">
        マイページ
    </div>

    <div class="header_left_label_robore_staff_detail">
        お名前

        <div class="input_left_robore">
            <input class="input_name" name="name" value="佐竹 義之">
        </div>
    </div>
    <div class="header_left_label_robore_staff_detail">
        メールアドレス

        <div class="input_left_robore">
            <input class="input_name" name="name" value="satake.y@plenty.co.jp">
        </div>
    </div>
    <div class="header_left_label_robore_staff_detail">
        パスワード

        <div class="input_left_robore">
            パスワードの変更
        </div>
    </div>
    <div class="header_left_label_robore_staff_detail">
        ロール権限

        <div class="input_left_robore">
            管理者
        </div>
    </div>
    <div class="header_left_label_robore_staff_detail">
        アクセスできる物件情報サイト

        <div class="input_left_robore">
            レインズ、at BB
        </div>
    </div>
    @endsection --}}
