@extends('robore.layout.layout--forms')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('store.component._p-index')
@slot('body')
<div class="c-contianer-box_4 w-per-16">
  <div class="box-data">
    <div class="container-table">
      <div class="container_center">
        <p class="register-label">
          会社概要
          <hr class="register-label-horizontal register_borderline_adjust">
        </p>
        <div class="register-description mgn-t-10">
          {{-- <p class="font_description">会社概要</p> --}}
          <div class="company_about">
            <table>
              <tr>
                <td colspan="2" class="pdg-r-20" >
                  <div class="txt-alg-c"><p class="font_description mgn-t-3 mgn-b-3 ">会社概要</p></div>
                </td>
              </tr>
              <tr>
                <th style="width: 75px;"><p class="font_description">会社名：</p></th>
                <td style="width: 100px;"><p class="font_description">株式会社ロボレ</p></td>
              </tr>
              <tr>
                <th><p class="font_description">設立年月日：</p></th>
                <td><p class="font_description">2022年3月9日</p></td>
              </tr>
              <tr>
                <th><p class="font_description">資本金：</p></th>
                <td><p class="font_description">1,000万円</p></td>
              </tr>
              <tr>
                <th><p class="font_description">主要株主：</p></th>
                <td><p class="font_description">株式会社プレンティー</p></td>
              </tr>
              <tr>
                <th><p class="font_description">役員：</p></th>
                <td>
                  <p class="font_description">代表取締役　佐竹義之</p>
                  <p class="font_description">取締役　茂木利勝</p>
                  <p class="font_description">取締役　乃美徹則</p>
                </td>
              </tr>
              <tr>
                <th><p class="font_description">所在地：</p></th>
                <td><p class="font_description">〒141-0021　東京都品川区上大崎2-25-5　久米ビル6F</p></td>
              </tr>
              <tr>
                <th><p class="font_description">法人番号</p></th>
                <td><p class="font_description">9010701042364</p></td>
              </tr>
              <tr>
                <th><p class="font_description">問い合わせ先：</p></th>
                <td><p class="font_description"><span class="grn-txt">admin@robore.co.jp</span></p></td>
              </tr>
            </table>
          </div>
          <div class="company_about">
            <table>
              <tr>
                <td colspan="2" class="pdg-r-11">
                  <div class="txt-alg-c"><p class="font_description mgn-t-3 mgn-b-3">特定商取引法に基づく表記</p></div>
                </td>
              </tr>
              <tr>
                <th style="width: 75px;"><p class="font_description">販売事業者名:</p></th>
                <td style="width: 100px;"><p class="font_description">株式会社ロボレ</p></td>
              </tr>
              <tr>
                <th><p class="font_description">代表者:</p></th>
                <td><p class="font_description">佐竹 義之</p></td>
              </tr>
              <tr>
                <th><p class="font_description">所在地:</p></th>
                <td><p class="font_description">東京都品川区上大崎2-25-5 久米ビル6F</p></td>
              </tr>
              <tr>
                <th><p class="font_description">ホームページ:</p></th>
                <td><p class="font_description">URL <span class="grn-txt">http://robore.co.jp/</span></p></td>
              </tr>
              <tr>
                <th><p class="font_description">メールアドレス:</p></th>
                <td><p class="font_description"><span class="grn-txt">admin@robore.co.jp</span></p></td>
              </tr>
              <tr>
                <th><p class="font_description">電話番号 :</p></th>
                <td><p class="font_description">お電話でのお問い合わせは承っておりません。お手数ですが、お問い合わせフォームよりお問い合わせ下さい。</p></td>
              </tr>
              <tr>
                <th><p class="font_description">電話番号 :</p></th>
                <td><p class="font_description">販売価格:該当ページをご参照ください。</p></td>
              </tr>
              <tr>
                <th><p class="font_description">商品代金以外の必要料金:</p></th>
                <td><p class="font_description">該当ページをご参照ください。</p></td>
              </tr>
              <tr>
                <th><p class="font_description">引き渡し時期:</p></th>
                <td><p class="font_description">オンラインにおけるサービス利用です。</p></td>
              </tr>
              <tr>
                <th><p class="font_description">お支払い方法:</p></th>
                <td><p class="font_description">毎月月末締め、翌月に口座振替、クレジットカード、銀行振込にてお支払いください。</p></td>
              </tr>
              <tr>
                <th><p class="font_description">返品や交換・キャンセルについて:</p></th>
                <td><p class="font_description">サービスの特性上、返品・返金は出来兼ねますので、ご了承下さい。</p></td>
              </tr>
              <tr>
                <th><p class="font_description">不良品の取扱条件:</p></th>
                <td><p class="font_description">現状有姿による利用となります。</p></td>
              </tr> 
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endslot
@endcomponent
@endsection