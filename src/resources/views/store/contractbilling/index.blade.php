@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '契約課金')
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
            <p>	物件情報を、ポータルサイトだけでなく店舗用のホームページに掲載することで、追加費用をかけることなく集客ができる可能性があります。</p>
            <p>また、店舗ホームページに物件情報を掲載したら、自動で無償でロボレポータルサイトにも掲載されます。</p>
          </div>
        </div>
        <div class="box-data">
          <h2>契約情報 （金額は月額・税別の表示です）</h2>
          <div class="box-receipt margin-55">
            <ul class="c-box-receipt-list">
              <li>
                <div class="receipt-desc margin-auto">
                  <span class="title">プラン</span>
                  <span>接続可能流通サイト数</span>
                  <span>出稿可能ポータルサイト数</span>
                  <span>HP掲載物件数</span>
                  <span>ユーザー数</span>
                </div>
                <div class="basic margin-auto">
                  <span>5サイト</span>
                  <span>3サイト</span>
                  <span>300件</span>
                  <span>3ユーザー</span>

                </div>
                <div class="total">
                  <span class="total-basic">5,000円</span>
                </div>
              </li>
              <hr>

              <li>
                <div class="receipt-desc margin-auto ">
                  <span>追加ユーザー</span>
                  <span>掲載物件数追加</span>
                  <span>前月日割分</span>
                  <span>割引</span>
                </div>
                <div class="basic margin-auto">
                  <span>1ユーザー</span>
                  <span>0</span>
                </div>
                <div class="total">
                  <span>+500円</span>
                  <span>+0円</span>
                  <span>+2661円</span>
                  <span>+741円</span>
                </div>
              </li>
              <hr>
              <li>
                <div class="basic margin-auto">
                  <span>合計</span>
                </div>
                <div class="total">
                  <span>+7,420円 （税込8,162円）</span>
                </div>
              </li>
            </ul>
          </div>
          <div class="box-footer">
            <div class="l-12__6 padding-left--30 padding-top--5">
              <div class="c-input c-input--full">
                <div class="c-input c-input--radio">
                  <input id="authors_on" name="authors" type="radio" value="1" checked="checked">
                  <label for="authors_on">企業</label>
                </div>
                <span class="unit_min"></span>
                  <div class="c-input c-input--radio">
                    <input id="authors_off" name="authors" type="radio" value="2">
                    <label for="authors_off">ユーザー</label>
                  </div>
                  <div class="c-input c-input--radio">
                    <input id="ff" name="authors" type="radio" value="3" checked="checked">
                    <label for="ff">企業</label>
                  </div>
                  <span class="unit_min"></span>
                  <div class="c-input c-input--radio">
                    <input id="dd" name="authors" type="radio" value="5" checked="checked">
                    <label for="dd">企業</label>
                  </div>
                  <span class="unit_min"></span>
              </div>
            </div>
          </div>
          <div class="container-table margin-top--01">
            <h2>請求情報　（金額は税別表示です）</h2>
            <br>
            <table class="p-table">
              <thead class="p-table__head">
                <tr class="p-table__head__tableRow">
                  <th class="table_border">年月日</th>
                  <th class="table_border">プラン</th>
                  <th class="table_border">追加ユーザー</th>
                  <th class="table_border">掲載数追加</th>
                  <th class="table_border">請求金額</th>
                  <th class="table_border">請求書</th>
                  <th class="table_border">引落結果</th>
                  <th class="table_border">お支払い</th>
                </tr>
              </thead>
              <tbody class="p-table__data">
                <tr>
                  <td class="table_border_2">6/27/2022</td>
                  <td class="table_border_2">ベーシック</td>
                  <td class="table_border_2">1</td>
                  <td class="table_border_2">0</td>
                  <td class="table_border_2">5,500円 （6,050円）</td>
                  <td class="table_border_2">PDF</td>
                  <td class="table_border_2">失敗</td>
                  <td class="table_border_2">未払い</td>
                </tr>
                <tr>
                  <td class="table_border_2">5/27/2022</td>
                  <td class="table_border_2">ベーシック</td>
                  <td class="table_border_2">1</td>
                  <td class="table_border_2">0</td>
                  <td class="table_border_2">5,500円 （6,050円）</td>
                  <td class="table_border_2">PDF</td>
                  <td class="table_border_2">失敗</td>
                  <td class="table_border_2">お支払い済</td>
                </tr>
                <tr>
                  <td class="table_border_2">4/27/2022</td>
                  <td class="table_border_2">ベーシック</td>
                  <td class="table_border_2">1</td>
                  <td class="table_border_2">0</td>
                  <td class="table_border_2">5,500円 （6,050円）</td>
                  <td class="table_border_2">PDF</td>
                  <td class="table_border_2">成功</td>
                  <td class="table_border_2">お支払い済</td>
                </tr>
              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    @endslot
  @endcomponent
@endsection
