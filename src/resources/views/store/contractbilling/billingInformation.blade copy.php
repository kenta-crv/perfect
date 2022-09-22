
@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '契約・請求情報')
@section('content')

@component('admin.component._p-index')
  @slot('body')
  <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="store-title">契約・請求情報</span>
    </div>
  <div class="c-main-box active-cont">
      <div class="c-main-body">
        <div class="c-contianer-box">
          <div class="box-description mgn-b-3 mgn-t-4">
            <div class="distribution-desc">
              <span>店舗管理者のみの機能です。</span>
              <p>現在の契約と請求内容を確認することができます。</p>
            </div>
            <label class="cont-alert" for="">
              <p>※ 3,850円（税込み）の未払いがございます。お手数ですが、早急に次の銀行口座にお振込みををお願いします。　○○銀行○○支店（xxx）普通　yyyyyyy　カ）ロボレ</p>
              {{--  <span class="c-x-mark"></span>  --}}
            </label>
          </div>
          <div class="box-data">
            <div class="box-desc-txt">
              <span>契約情報</span>
              <p>（金額は月額・税別の表示です）（　）は税込み金額です</p>
            </div>
            <div class="box-receipt box_receipt_billing_adjust">
              <table>
                <thead>
                  <tr>
                    <th><strong>プラン</strong></th>
                    <th><u class="lbl-main cb_underline">ベーシック</u></th>
                    <th class="th_headers_yen_adjust">5,000円</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="pdg-t-2">
                      <p>接続可能流通サイト数</p>
                      <p>出稿可能ポータルサイト数</p>
                      <p>HP掲載物件数</p>
                      <p>ユーザー数</p>
                    </td>
                    <td>
                      <p>5サイト</p>
                      <p>3サイト</p>
                      <p>300件</p>
                      <p>3ユーザー</p>
                    </td>
                    <td>
                    </td>
                  </tr>
                  <tr>
                    <td class="pdg-t-2 fnt-wgt-5">
                      <span class="receipt-desc">追加ユーザー</span>
                    </td>
                    <td class="pdg-t-2">
                      <p class="receipt-desc">1ユーザー</p>
                    </td>
                    <td class="pdg-t-2">
                      <p class="receipt-desc receipt_desc_right">+500円	</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="pdg-t-2 fnt-wgt-5">
                      <span class="receipt-desc">掲載物件数追加</span>
                    </td>
                    <td class="pdg-t-2">
                      <p class="receipt-desc">0</p>
                    </td>
                    <td class="pdg-t-2">
                      <p class="receipt-desc receipt_desc_right">+0円</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="pdg-t-2 fnt-wgt-5">
                      <span class="receipt-desc">前月日割分</span>
                    </td>
                    <td class="pdg-t-2">
                      <p class="receipt-desc"></p>
                    </td>
                    <td class="pdg-t-2">
                      <p class="receipt-desc receipt_desc_right">	+2661円</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="pdg-t-2 fnt-wgt-5">
                      <span class="receipt-desc">割引</span>
                    </td>
                    <td class="pdg-t-2">
                      <p class="receipt-desc"></p>
                    </td>
                    <td class="pdg-t-2">
                      <p class="receipt-desc receipt_desc_right">▲741円	</p>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td class="fnt-wgt-5 pdg-t-2 td_span_discount_adjust">
                      <span class="receipt-desc">合計</span>
                    </td>
                    <td class="td_span_discount_adjust"></td>
                    <td class="pdg-t-2">
                      <p class="receipt-desc receipt_desc_right receipt_desc_inline">7,420円</p>
                      （税込8,162円）
                    </td>
                  </tr>
                </tfoot>
              </table>
              <div class="receipt-btm">
                <div class="fnt-wgt-5 pdg-t-2">
                  <span class="receipt-desc">次回請求日</span>
                </div>
                <div class="pdg-t-2">
                  2022年07月27日
                </div>
              </div>
            </div>

            <div class="box-description">
              <div class="box-desc-txt  mgn-t-5">
                <span>決済方法</span>

                @if($account->payment_method == 0)
                <h1 class="option-txt mgn-l-20" >銀行の口座引落 </h1>
                @elseif($account->payment_method == 1)
                <h1 class="option-txt mgn-l-20"> クレジットカード</h1>
                @elseif($account->payment_method == 2)
                <h1 class="option-txt mgn-l-20">銀行振込</h1>
                @endif
                <label for="">
                  <p>
                    @if($account->payment_method == 0)
                  <a href="{{ url('store/setting/paymentMethod/credit') }}" class="option-txt mgn-l-20">クレジットカードに変更</a>
                    @elseif($account->payment_method == 1)
                    <a href="{{url('store/setting/paymentMethod/credit')}}" class="option-txt mgn-l-20">クレジットカードの変更</a>
                    @elseif($account->payment_method == 2)
                    <a href="{{url('store/setting/paymentMethod/credit')}}" class="option-txt mgn-l-20">クレジットカードに変更</a>
                    @endif
                  </p>
                  <p>
                    @if($account->payment_method == 0)
                    <a href="" class="option-txt mgn-l-20"></a>
                    @elseif($account->payment_method == 1)
                    <a href="{{ url('store/setting/paymentMethod/debit') }}" class="option-txt mgn-l-20">口座振替に変更</a>
                    @elseif($account->payment_method == 2)
                    <a href="{{ url('store/setting/paymentMethod/debit') }}" class="option-txt mgn-l-20">口座振替に変更</a>
                    @endif
                  </p>
                  @if($account->payment_method == 0)
                  <h1 class="option-txt mgn-l-20">※銀行振込をご希望の方は、弊社までご連絡ください。</h1>
                  @elseif($account->payment_method == 1)
                  <h1 class="option-txt mgn-l-20">※銀行振込をご希望の方は、弊社までご連絡ください。</h1>
                  @elseif($account->payment_method == 2)
                  <h1 class="option-txt mgn-l-20"></h1>
                  @endif
                </label>
                </div>
            </div>
            <div class="container-table margin-top--01">
              <div class="box-description mgn-b-4">
                <div class="box-desc-txt">
                  <span>契約情報</span>
                  <p>（金額は月額・税別の表示です）（　）は税込み金額です</p>
                </div>
              </div>
              <div class="p-billing-info-table overflow-x">
                <table>
                  <tr>
                    <th style="min-width: 144px;">年月日</th>
                    <th style="min-width: 145px;">プラン </th>
                    <th style="min-width: 126px;">追加ユーザー</th>
                    <th style="min-width: 126px;">掲載数追加</th>
                    <th style="min-width: 222px;">請求金額</th>
                    <th style="min-width: 126px;">明細書</th>
                    <th style="min-width: 126px;">領収書</th>
                    <th style="min-width: 145px;">引落結果</th>
                    <th style="min-width: 147px;">お支払い</th>
                  </tr>
                  @foreach($bills as $bill)
                  <form method="get" action="{{ route('storeAdmin.contractBilling.pdf') }}">
                    <tr>
                      <td>{{ date('Y年m月d日', strtotime($bill->billing_date)) }}</td>
                      <td class='align_left_cb'>ベーシック</td>
                      <td class='align_left_cb'>1</td>
                      <td class='align_left_cb'>0</td>
                      <td class='align_right_cb'>{{ $bill->add_user_fee }}円({{ $bill->add_property_fee }}円)</td>
                      <td class="pdf-txt align_left_cb"><button type="submit" class="pdf-txt" style="border: 0;
                      background: #fff;">PDF</button></td>
                      <td class="pdf-txt align_left_cb"><button type="submit" class="pdf-txt" style="border: 0;
                      background: #fff;">PDF</button></td>
                      <td class='align_left_cb' style="background: #ffe0e0;">失敗</td>
                      <td class='align_left_cb' style="background: #ffe0e0;">未払い</td>
                    </tr>
                  </form>

                  @endforeach
                  {{-- <tr>
                    <td>2022年05月27日</td>
                    <td class='align_left_cb'>ベーシック</td>
                    <td class='align_left_cb'>0</td>
                    <td class='align_left_cb'>0</td>
                    <td class='align_right_cb'>5,000円(5,500円)</td>
                    <td class="pdf-txt align_left_cb align_left_cb">PDF</td>
                    <td class="pdf-txt align_left_cb align_left_cb">PDF</td>
                    <td class='align_left_cb' style="background: #ffe0e0;">失敗</td>
                    <td class='align_left_cb'>お支払い済</td>
                  </tr>
                  <tr>
                    <td>2022年04月27日</td>
                    <td class='align_left_cb'>ベーシック</td>
                    <td class='align_left_cb'>1</td>
                    <td class='align_left_cb'>0</td>
                    <td class='align_right_cb'>5,000円(5,500円)</td>
                    <td class="pdf-txt align_left_cb">PDF</td>
                    <td class="pdf-txt align_left_cb">PDF</td>
                    <td class='align_left_cb'>成功</td>
                    <td class='align_left_cb'>お支払い済</td>
                  </tr> --}}
                </table>
              </div>
              <br/>
              <div class="container-table-footer">
                <div class="box-description">
                  <div class="box-desc-txt">
                    <span>複数店舗まとめて決済</span>
                  </div>
                </div>
                <div class="distribution-desc-3">
                  <span>こちらの店舗以外にもグループ等で店舗を持っており、本部でまとめてお支払いされる場合は、こちらからその手続きができます。</span>
                  <strong>【手続きの手順】</strong>
                  <span>(1)<u class="lbl-main">こちら</u>から、本部用の新規アカウントを作成します。</span>
                  <span>(2)作成したアカウントに移動し、そこから決済をまとめる店舗を追加します。</span>
                </div>
                <p></p>

              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  @endslot
@endcomponent
<script>
    // for tabbing top
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tabbing");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

</script>
@endsection

