@extends('admin.layout.layout--admin')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}
      {{--  店舗のホームページ設定  --}}
      ホーム　>　債権管理
    @endslot
    @slot('action')

    @endslot
    @slot('body')
    <div class="c-contianer-box">
        <div class="box-data">
            <div class="input_search">
                <table class="p-table">
                    <thead class="p-table__head">
                      <tr class="p-table__head__tableRow_3">
                          <th class="th_1">ID▽</th>
                          <th class="th_1">プラン▽</th>
                          <th class="th_1">店舗名▽</th>
                          <th class="th_1">未払い▽</th>
                          <th class="th_1">未払額▼</th>
                          <th class="th_1">入金額</th>
                          <th class="th_1">入金日</th>
                          <th class="th_1">備考</th>
                      </tr>
                    </thead>
                    <tbody class="p-table__data">
                      <tr>
                          <td class="td_1">R654321</td>
                          <td class="td_1">スターター</td>
                          <td class="td_1">プレンティー　株式会社</td>
                          <td class="td_1">24000</td>
                          <td class="td_1">3000</td>
                          <td class="td_1">0</td>
                          <td class="td_1">7/2/2022</td>
                          <td class="td_1">井本）振込確認</td>
                      </tr>
                      <tr>
                          <td class="td_1">R123456</td>
                          <td class="td_1">ベーシック</td>
                          <td class="td_1">有限会社　ミキハウジング</td>
                          <td class="td_1">－7,000</td>
                          <td class="td_1">40000</td>
                          <td class="td_1">7000</td>
                          <td class="td_1">7/2/2022</td>
                          <td class="td_1">井本）振込確認</td>
                      </tr>
                    </tbody>
                </table><br/><br/><br/>
                <div class="foot_3">
                    <div class="p-login__buttonArea">
                        <button type="submit" class="c-button c-button--full c-button--thinBlue">確定する</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    @endslot
  @endcomponent

@endsection

