<div
  class="c-list-tbl"
  x-data="modal">

  <table>
    <tbody>
      <tr>
        <th style="min-width: 19%;">対応日	</th>
        <th style="min-width: 11%;">入力者</th>
        <th style="min-width: 60%;">タイトル／内容 ※タイトルのみ表示。クリックで内容が表示されます</th>
        <th style="min-width: 9%;"></th>
       </tr>
       <tr class="va-t">
        <td>
          <div class="c-input " style="width:221px;">
          <input type="email" name="email" placeholder="初回登録日" class="input_1" >
          <span class="c-icn--calendar-01" style="top:30%;"></span>
          </div>
        </td>
        <td>
          <div class="input ">
              <input type="email" name="email" placeholder="" class="admin-txt-input">
          </div>
        </td>
        <td>
          <div class="input ">
              <input type="email" name="email" placeholder="タイトル" class="admin-txt-input">
              <textarea row="3" cols="1" class="admin-txt-area" placeholder="内容"></textarea>
          </div>
        </td>
        <td class="va-m ">
          <div>
              <button
                @click="toggle"
                class="mpage-btn modal-button"
                style="width: 80px;">
                新規作成
              </button>
          </div>
        </td>
       </tr>
       <tr>
        <td>
          <div class="lbl-txt">
              <label class="" for="">2022年6月27日（木）11:23</label>
          </div>
        </td>
        <td>
          <div class="lbl-txt">
              <label class="" for="">鈴木</label>
          </div>
        </td>
        <td>
          <div class="grn-txt txt-alg-l">
              <strong>また引落ができなかった様です</strong>
          </div>
        </td>
        <td>
          <div class="">
              <button class="mpage-btn">編集</button>
        </td>
       </tr>
       <tr>
        <td>
          <div class="lbl-txt">
              <label class="" for="">2022年6月11日（水）17:13</label>
          </div>
        </td>
        <td>
          <div class="lbl-txt">
              <label class="" for="">茂木</label>
          </div>
        </td>
        <td>
          <div class="admin-txt">
              <label class="admin-h-txt">鈴木様に返信しました。</label>
              <label class="admin-h-txt-2">
                  <span>6/11　12:99</span>
                  <span>5月分の料金について、請求が多いのでは？との連絡をLINEでいただく。
                      営業的には4月末までの割引を発行していたため、その旨をご連絡して納得いただいた</span>
              </label>
          </div>
        </td>
        <td>
          <div class="">
              <button class="mpage-btn">保存</button>

          </div>
        </td>
       </tr>
       <tr>
          <td>
              <div class="lbl-txt">
                  <label class="" for="">2022年6月10日（火）14:03</label>
              </div>
          </td>
          <td>
              <div class="lbl-txt">
                  <label class="" for="">鈴木</label>
              </div>
          </td>
          <td>
              <div class="grn-txt txt-alg-l">
                  <strong>料金について</strong>
              </div>
          </td>
          <td>
              <div class="">
                  <button class="mpage-btn">編集</button>
              </div>
            </td>
       </tr>
    </tbody>
  </table>

  <div
    class="bg-[#000000cc] fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40"
    x-cloak
    x-show="open">

    <div x-show="open" class="modal-content bg-white rounded-lg  transform  ">
      <div class="close-modal">
        <i x-show="open" class="c-icn-close" x-on:click="open = false"></i>
      </div>
      <p class='p_modal'>このお手続きをした時から、休眠となり機能が凍結されます。</p>
        <div class='modal_head'>
          【休眠中について】
        </div>
        <div class='modal_p2'>
          <p>管理者はロボレにログインし、再開の手続きが行えます。</p>
          <p>前入金分は、休眠した日から日割り分を再開時まで持ち越します。返金はいたしません。</p>
        </div>

        <div class='modal_p3'>
          <p>休眠からの再開については、管理者の方がログインし再開手続きを行う事で、すぐに機能が復帰します。</p>
        </div>
        <div class='modal_content_button'>
          <button class="modal-button " @click="nextModal" >休眠する</button>
        </div>
    </div>
  </div>

  <div
    class="bg-[#000000cc] fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40"
    x-cloak
    x-show="modal2">

    <div x-show="modal2" class="modal-content bg-white rounded-lg  transform  ">
      <div class="close-modal">
        <i x-show="modal2" class="c-icn-close" x-on:click="modal2 = false"></i>
      </div>

      <div class="modal-content">
        <p class='p_modal_2'>このお手続きをした時から、休眠が解除となります。</p>
        <div>
          <table class="p-table_modal_store_detail">
            <thead class="p-table__head">
            </thead>
            <tbody class="p-table__data">
              <tr class="notification_tr_adjust">
                  <td class="td_30 th_1_leftradius_help th_help_color">
                    休眠日
                  </td>
                  <td class='td_30 th_1_rightradius_help'>
                    2022年11月14日
                  </td>
              </tr>
              <tr>
                  <td class='td_30 th_help_color'>
                    再開日
                  </td>
                  <td class='td_30'>
                    2023年3月20日
                  </td>
              </tr>
              <tr>
                  <td class='td_30 th_help_color'>
                    日割持越金額
                  </td>
                  <td class='td_30'>
                    16日分　　2,667円（税込み2,933円）
                  </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class='modal_content_button'>
          <button >再開する</button>
        </div>
      </div>
    </div>
  </div>
</div>


