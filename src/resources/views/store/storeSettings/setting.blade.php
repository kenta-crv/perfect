@extends('store.layouts.layout--store')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}
      設定
    @endslot
    @slot('action')

    @endslot
    @slot('body')
      <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <p>	お支払いをまとめて本部がされる場合は、こちらから設定ください</p>
            <p class="header_3">・	新規で店舗を作成し追加</p><br/>
            <p class="header_3">・	既にロボレを使っている店舗の支払いをまとめるため追加</p>
            <p class="header_8">この場合は、該当する店舗の管理者権限で、次からログインしてください。</p>
            <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label_2">
                    ログインID
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input">
                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                  </div>
                </div>
                <div class="p-list__item__label_3">
                    パスワード
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input">
                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                  </div>
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="c-input">
                        <button type="submit" class="c-button c-button--full c-button--thinBlue">ログイン</button>
                    </div>
                </div>
              </li><br/>

            <p class="header_10">・ 現在まとめている店舗一覧　：　該当の店舗の管理者権限でログインすると、その店舗のお支払いはまとめから解除され、その店舗がお支払いする事になります。</p>
            <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label_2">
                    ログインID
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input">
                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                  </div>
                </div>
                <div class="p-list__item__label_3">
                    パスワード
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input">
                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                  </div>
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="c-input">
                        <button type="submit" class="c-button c-button--full c-button--thinBlue">ログイン</button>
                    </div>
                </div>
              </li>
          </div><br/>
          <table class="p-table_2">
            <tr>
                <td class="td_2">有限会社　ミキハウジング</td>
                <td class="td_3">$R123456</td>
              </tr>
              <tr>
                <td class="td_2">株式会社　アスケイト</td>
                <td class="td_3">R111111</td>
              </tr>
              <tr>
                <td class="td_2">プレンティー　株式会社</td>
                <td class="td_3">R654321</td>
              </tr>
          </table>
        </div>
      </div>
    @endslot
  @endcomponent
@endsection
