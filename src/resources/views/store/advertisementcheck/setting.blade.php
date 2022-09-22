@extends('store.layouts.layout--store')
@section('title', $title ?? 'ユーザー設定')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}
        ポータルサイト（広告出稿）設定
    @endslot
    @slot('action')

    @endslot
    @slot('body')
    <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <p>	ユーザー別ログイン設定　：　全ての設定をできるのは、店舗管理者のみの機能です</p>
            <p>御社の店舗ユーザーごとに、どのIDでログインさせるかを設定してください。</p>
            <p>なお、店舗スタッフアカウントの人は、自分のログインIDのみ編集することができます。</p>
          </div>
        </div>
        <div class="p-auth">
            <div class="p-auth__box_2">
              <div class="p-auth__box__head">
                {{-- <div class="p-auth__box__head__logo">
                  <img src="{{asset('image/logo/logo.svg')}}" width="140" height="32">
                </div> --}}
                <h2 class="p-auth__box__head__title">
                    SUUMO
                </h2>
              </div>
              <div class="p-auth__box__body">

                <li class="p-list__item p-list__item--center">
                  <div class="p-list__item__label">
                    佐竹
                  </div>
                  <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="c-input c-input--full">
                        &nbsp;&nbsp;&nbsp;xxxxxxxxxxx
                    </div>
                  </div>
                </li>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                        田中
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        &nbsp;&nbsp;&nbsp;xxxxxxxxxxx
                      </div>
                    </div>
                  </li><br/>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                        鈴木
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" name="text" placeholder="" value="クリックで選択">
                      </div>
                    </div>
                  </li><br/>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                        斉藤
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" name="text" placeholder="" value="クリックで選択">
                      </div>
                    </div>
                  </li><br/>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                        広瀬
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" name="text" placeholder="" value="クリックで選択">
                      </div>
                    </div>
                  </li><br/>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                        石原
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" name="text" placeholder="" value="クリックで選択">
                      </div>
                    </div>
                  </li><br/>
                  @if($errors->first())
                    <div class="p-formError p-formError--admin">
                      <p class="message">
                        <span class="invalid-feedback" role="alert">
                          {{-- @foreach ($errors->first() as $error) --}}
                            <strong>{{ $errors->first() }}</strong>
                          {{-- @endforeach --}}
                        </span>
                      </p>
                    </div>
                  @endif
              </div>
            </div>
          </div><br/>
          <div class="foot_3">
            <div class="p-login__buttonArea">
                <button type="submit" class="c-button c-button--full c-button--thinBlue">保存</button>
            </div>
        </div><br/>
        <div class="box-title">
            <p>	表示されている物件流通サイトは、MENUの「ポータルサイト選択」で設定しているサイトです。</p>
            <p>表示されているユーザーは、MENUの「ロボレのユーザー設定」で設定しているユーザーです。</p>
          </div>
      </div>
    @endslot
@endcomponent
@endsection
