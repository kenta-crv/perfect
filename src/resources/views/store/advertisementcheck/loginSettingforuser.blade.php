@extends('store.layouts.layout--store')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
  @component('admin.component._p-index')
    @slot('title')
        ポータルサイト（広告出稿）設定
    @endslot
    @slot('action')

    @endslot
    @slot('body')
      <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <p>ユーザー別ログイン設定</p>
            <p>ポータルサイトに、どのIDでログインさせるかを設定してください。</p>
            <p>なお下記に表示されないポータルサイトに接続したい場合は、管理者にご相談ください。</p>
          </div>
        </div>
        <div class="box-data">
          <div class="container_item user_status">
            <div class="heading">
                <div class="label_right">
                    SUUMO
                </div>
                <div class="label_right">
                    xxxxxxxxxxx
                </div>
            </div>
            <div class="label_left">
                木村
            </div>
          </div>
          <div class="foot_3">
            <div class="p-login__buttonArea">
                <button type="submit" class="c-button c-button--full c-button--thinBlue">保存</button>
            </div>
        </div>
        </div>
      </div>
    @endslot
  @endcomponent
@endsection
