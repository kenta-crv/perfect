@extends('store.layouts.layout--store')
@section('title', $title ?? 'スケジュールチェック')
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
            <p>	出稿チェックスケジュール</p>
            <p class="header_3">出稿した物件情報が集客中かを夜中にチェックし、集客終了していれば広告を終了させる機能です。</p>
            <p class="header_3">特別な理由がない限り、「毎日」で設定ください。</p>
          </div>
        </div>
        <div class="foot_3">
            <table class="p-table">
                <thead class="p-table__head">
                  <tr class="p-table__head__tableRow">
                      <th>物件流通サイト</th>
                      <th>ID</th>
                      <th>スケジュール</th>
                  </tr>
                </thead>
                <tbody class="p-table__data">
                  <tr>
                      <td>SUUMO</td>
                      <td>xxxxxxxxx</td>
                      <td>
                        <div class="c-input c-input--full-3">
                            <input type="email" name="password" placeholder="" value="毎日">
                        </div>
                      </td>
                    </tr>
                </tbody>
              </table><br/>
              <div class="p-login__buttonArea">
                <button type="submit" class="c-button c-button--full c-button--thinBlue">ログイン</button>
            </div>
        </div>
      </div>
    @endslot
@endcomponent
@endsection
