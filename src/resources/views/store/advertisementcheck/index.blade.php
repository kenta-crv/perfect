@extends('store.layouts.layout--store')
@section('title', $title ?? '出稿スケジュールチェック')
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
            <p>	出稿チェックスケジュール　：　全てのアカウントに対し、設定をできるのは店舗管理者のみの機能です</p>
            <p>出稿した物件情報が、集客中かを夜中にチェックし、集客終了していれば広告を終了させる機能です。</p>
            <p class="header_3">特別な理由がない限り、「毎日」で設定ください。</p>
          </div>
        </div>
        <div class="foot_3">
            <table class="p-table">
                <thead class="p-table__head">
                  <tr class="p-table__head__tableRow">
                      <th class="table_border">物件流通サイト</th>
                      <th class="table_border">ID</th>
                      <th class="table_border">スケジュール</th>
                  </tr>
                </thead>
                <tbody class="p-table__data">
                  <tr>
                      <td class="table_border_2">SUUMO</td>
                      <td class="table_border_2">xxxxxxxxx</td>
                      <td class="table_border_2">
                        <div class="c-input c-input--full-3">
                            <input type="email" name="password" placeholder="" value="毎日">
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="table_border_2">SUUMO</td>
                      <td class="table_border_2">yyyyyyyyy</td>
                      <td class="table_border_2">
                        <div class="c-input c-input--full-3">
                            <input type="email" name="password" placeholder="" value="毎日">
                        </div>
                      </td>
                  </tr>
                </tbody>
              </table>
        </div>
      </div>
    @endslot
@endcomponent
@endsection
