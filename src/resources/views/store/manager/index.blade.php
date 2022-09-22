@extends('store.layouts.layout-store-home')
@section('title', $title ?? 'TOPダッシュボード')
@section('content')
  @component('admin.component._p-index')
    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="store-title">- 請求情報</span>
    </div>
    <div class="c-main-box active-cont">
      <div class="c-main-body">
       <span><span class="font-weight">6月30日</span>までに、次の金額をお振込みください。（　）は税込み金額です</span>
       <div class="billing-info-table-manager overflow-x">
        <table class="table_new_collapse_manager-2">
          <tr>
            <th class="th_headers th_header_first_border" style="min-width: 165px;">お支払い期限</th>
            <th class="th_headers" style="min-width: 120px;">契約店舗数 </th>
            <th class="th_headers" style="min-width: 145px;">請求対象店舗数</th>
            <th class="th_headers" style="min-width: 180px;">請求金額</th>
            <th class="th_headers" style="min-width: 100px;">請求書</th>
            <th class="th_headers th_header_last_border" style="min-width: 110px;">支払方法</th>
          </tr>

          <tr>
            <td class="td_border_left-manager td_border_bottom-manager">2022年05月31日</td>
            <td class="td_border_bottom-manager num_align_right">4</td>
            <td class="td_border_bottom-manager num_align_right">3</td>
            <td class="td_border_bottom-manager">16,500円(18,150円)</td>
            <td class="td_border_bottom-manager">PDF</td>
            <td class="td_border_bottom td_pdf_border_right_manager">銀行振込</td>
          </tr>
        </table>
      </div>
          <br/>
            <div class=" input--calendar">
                <label class="cont-alert-manager" for="">
                    <p>振込先口座　　○○銀行○○支店（xxx）　普通　yyyyyyy　カ）ロボレ</p>
                    <span class="c-x-mark"></span>
                </label>
            </div>
            <br/>
            <span class="font-weight">決済方法</span>
            <div class="display-radio width-full mgn-l-2">
                              <label class="c-radio-cnt">
                                店舗管理者のみ
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                              </label>
                              <label class="c-radio-cnt mgn-l-3">
                                店舗全員へ
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                              </label>
                              <label class="c-radio-cnt mgn-l-3">
                                メールはしない。（画面でのお知らせのみ）
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                              </label>
                            </div>
            {{--  <div class="radio-button-notification">
                <div class="radio-button-1">
                  <input wire:model="usage_plan" type="radio" value="1" /><span class="radio-label-button-manager">店舗管理者のみ</span>
                </div>
                <div class="radio-button-2">
                  <input wire:model="usage_plan" type="radio" value="1" /><span class="radio-label-button-manager">店舗全員へ</span>
                </div>
                <div class="radio-button-3">
                  <input wire:model="usage_plan" type="radio" value="1" /><span class="radio-label-button-manager">メールはしない。（画面でのお知らせのみ）</span>
                </div>
            </div>  --}}
            <br/><br/>
            <span class="font-weight">過去のお支払い状況請求</span>
            <div class="billing-info-table overflow-x">
              <table class="table_new_collapse_manager">
                <tr>
                  <th class="th_headers th_header_first_border" style="min-width: 165px;">年月日</th>
                  <th class="th_headers" style="min-width: 120px;">契約店舗数 </th>
                  <th class="th_headers" style="min-width: 145px;">請求対象店舗数</th>
                  <th class="th_headers" style="min-width: 180px;">請求金額</th>
                  <th class="th_headers" style="min-width: 100px;">請求書</th>
                  <th class="th_headers" style="min-width: 110px;">支払方法</th>
                  <th class="th_headers th_header_last_border" style="min-width: 165px;">お支払確認日</th>
                </tr>
                <tr>
                  <td class="td_border_left">2022年05月31日</td>
                  <td class="td_num_align_adjust">4</td>
                  <td class="td_num_align_adjust">3</td>
                  <td>16,500円(18,150円)</td>
                  <td>PDF</td>
                  <td>銀行振込</td>
                  <td class="td_pdf_border_right">2022年06月01日	</td>
                </tr>

                <tr>
                  <td class="td_border_left td_border_bottom">2022年05月31日</td>
                  <td class="td_border_bottom num1_align_right">4</td>
                  <td class="td_border_bottom num1_align_right">3</td>
                  <td class="td_border_bottom">16,500円(18,150円)</td>
                  <td class="td_border_bottom">PDF</td>
                  <td class="td_border_bottom">銀行振込</td>
                  <td class="td_border_bottom td_pdf_border_right_manager">2022年06月01日</td>
                </tr>
              </table>
            </div>
      </div>
   </div>

    @endslot
  @endcomponent
@endsection


