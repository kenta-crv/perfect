@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '契約・請求情報（複数店舗で本部支払いの場合）')
@section('content')

@component('admin.component._p-index')
@slot('body')
<div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="store-title">- 契約・請求情報</span>
    </div>
<div class="c-main-box active-cont">
    <div class="c-main-body">
      <div class="box-description mgn-b-3 mgn-t-4">
        <div class="distribution-desc">
          <span>店舗管理者のみの機能です。</span>
          <p> 現在の契約と請求内容を確認することができます。</p>
        </div>
      </div>
      <div class="box-description">
        <div class="box-desc-txt">
          <span>契約情報 </span>
          <p> （金額は月額・税別の表示です）（　）は税込み金額です</p>
        </div>
      </div>
      <div class="box-receipt box_receipt_width_adjust">
        <table>
          <thead>
            <tr>
              <th><strong>プラン</strong></th>
              <th><u class="lbl-main lbl_main_thickness">ベーシック</u></th>
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
                <p class="receipt-desc margin_zero receipt_desc_right">0円</p>
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
                <p class="receipt-desc receipt_desc_right">+2661円	</p>
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
                <p class="receipt-desc receipt_desc_right">▲741円		</p>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td class="fnt-wgt-5 pdg-t-2 toot_td">
                <span class="receipt-desc">合計</span>
              </td>
              <td class="toot_td"></td>
              <td class="pdg-t-2">
              <p class="receipt-desc receipt_desc_right receipt_desc_inline">7,420円</p>
              （税込8,162円）
              </td>
            </tr>
          </tfoot>
        </table>

        <div class="receipt-btm ">
          <div class="fnt-wgt-5 pdg-t-2">
            <span class="receipt-desc">次回請求日</span>
          </div>
          <div class="pdg-t-2">
            2022年07月27日
          </div>
        </div>
      </div>

      <div class="box-description">
        <div class="box-desc-txt">
          <span>決済方法</span>
        </div>
        <div class="distribution-desc">
          <p> アスケイト本部　一括払い</p>
        </div>
      </div>
      <div class="box-description">
        <div class="box-desc-txt mgn-b-4">
          <span>契約情報 </span>
          <p> （金額は月額・税別の表示です）（　）は税込み金額です</p>
        </div>
        <div class="billing-info-table w-per-14 overflow-x">
            <table class="table_new_collapse">
              <tr>
                <th class="th_headers th_header_first_border" style="min-width: 181px;">年月日</th>
                <th class="th_headers" style="min-width: 181px;">プラン </th>
                <th class="th_headers" style="min-width: 126px;">追加ユーザー</th>
                <th class="th_headers" style="min-width: 126px;">掲載数追加</th>
                <th class="th_headers" style="min-width: 171px;">請求金額</th>
                <th class="th_headers th_header_last_border" style="min-width: 111px;">明細書</th>
              </tr>
              <tr>
                <td class="td_border_left td_content_adjust">2022年06月27日</td>
                <td class='td_align_left_cbh'>ベーシック</td>
                <td class='td_align_left_cbh'>1</td>
                <td class='td_align_left_cbh'>0</td>
                <td class='td_align_right_cbh'>5,500円(6,050円)</td>
                <td class="td_pdf_border_right td_align_left_cbh td_underline_cbh">PDF</td>
              </tr>
              <tr>
                <td class="td_border_left td_content_adjust">2022年05月27日</td>
                <td class='td_align_left_cbh'>ベーシック</td>
                <td class='td_align_left_cbh'>0</td>
                <td class='td_align_left_cbh'>0</td>
                <td class='td_align_right_cbh'>5,000円(5,500円)</td>
                <td class="td_pdf_border_right td_align_left_cbh td_underline_cbh">PDF</td>
              </tr>
              <tr>
                <td class="td_border_left td_border_bottom td_content_adjust">2022年04月27日</td>
                <td class="td_border_bottom td_align_left_cbh">ベーシック</td>
                <td class="td_border_bottom td_align_left_cbh">1</td>
                <td class="td_border_bottom td_align_left_cbh">0</td>
                <td class="td_border_bottom td_align_right_cbh">5,000円(5,500円)</td>
                <td class="td_border_bottom td_pdf_border_right bottom_right_contractBilling td_align_left_cbh td_underline_cbh">PDF</td>
              </tr>
            </table>
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
