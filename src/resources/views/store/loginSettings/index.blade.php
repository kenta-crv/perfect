@extends('store.layouts.layout--store')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}
      店舗のホームページ設定
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
        <div class="box-data">
          <div class="container-table margin-top--01">
            <table class="p-table">
              <thead class="p-table__head">
                <tr class="p-table__head__tableRow">
                  <th class="table_border">レインズ</th>
                  <th class="table_border">at BB</th>
                  <th class="table_border">追加ユーザー</th>
                  <th class="table_border">いえらぶ</th>
                </tr>
              </thead>
              <tbody class="p-table__data">
                <tr>
                  <td class="table_border_2">331122334455</td>
                  <td class="table_border_2">000111222333</td>
                  <td class="table_border_2">クリックで選択</td>
                  <td class="table_border_2">クリックで選択</td>
                </tr>
                <tr>
                  <td class="table_border_2">646464564645</td>
                  <td class="table_border_2">002555255552</td>
                  <td class="table_border_2">クリックで選択</td>
                  <td class="table_border_2">クリックで選択</td>
                </tr>
              </tbody>
            </table>

          </div>
          <div class="box-data-footer margin-top--01">
            <p>表示されている物件流通サイトは、MENUの「物件流通サイト選択」で設定しているサイトです。</p>
            <p>表示されているユーザーは、MENUの「ロボレのユーザー設定」で設定しているユーザーです。</p>
          </div>
        </div>
      </div>
    @endslot
  @endcomponent
@endsection
