@extends('admin.layout.layout--admin')
@section('title', $title ?? '債権管理')
@section('content')
  @component('admin.component._p-index')
    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span>
      <div class="a-page-title-2">
        <span>債権管理</span>
      </div>
    </div>
      <div class="box-description_credit">
          <div class="box-title box_title_adjust">
            <p class="decription1_1 ">銀行振込等で支払いが確認できたら入金額を入力してください。債務額より多い金額が入力された場合は、「前受け金」として将来の利用料と相殺します。</p>
            <p class="decription1_1 ">何度か督促しても支払ってくれない場合は、一時医療停止か休眠、または退会を行ってください。</p>
          </div>
      </div>

      <div class="c-main-box_credit active-cont">
          <div class="c-contianer-box c_credit_border">
            <div class="box-data">
              <div class="container_center credit_container_adjust">
                  <div class="container_box_2 container_box_credit_adjust">
                      店舗検索
                      <span class="credit_icon__2">
                      </span>
                  </div>
              </div><br/>
              <div class="container_center">
                  <div class="credit__title">
                      前受け ・ 消込み
                  </div>
              </div>
              <div class="pagination-cont1-body">
                <div class="admin-btn-cont1">
                  <div class="admin-btn ">
                    <span>CSVアップロードで更新</span>
                  </div>
                </div>
                <div class="pagination-cont">
                  <div class="pagination mgn-b-01">
                    <ul>
                      <li class="page-item disabled" aria-disabled="true" aria-label="« 前">
                        <a class="" aria-hidden="true">
                          <i class="arr-prev"></i>
                        </a>
                      </li>
                      <li class="page-item " aria-current="page">
                        <a class="active">1</a>
                      </li>
                      <li class="page-item">
                        <a class="a_credit_inactive">2</a>
                      </li>
                      <li class="page-item">
                        <a class="a_credit_inactive">3</a>
                      </li>
                      <li class="page-item">
                        <a class="a_credit_inactive">4</a>
                      </li>
                      <li class="page-item">
                        <a class="a_credit_inactive">...</a>
                      </li>
                      <li class="page-item">
                        <a class="a_credit_inactive">60</a>
                      </li>
                      <li>
                        <a class="" href="http://localhost:8000/store/search/mocklist?id=6f4gmz810qet3pxy&amp;page=2" rel="next" aria-label="次 »">
                          <i class="arr-next"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="mgn-t-3 mgn-r-5">
                    <select class="keep-slct-01 width-75" name="" id="">
                      <option value="0">10  </option>
                    </select>
                  </div>
                  <div class="mpage-desc mgn-t-5">
                    <span>件表示 / ページ</span>
                  </div>
                </div>
                <div class="admin-btn-cont">
                  <div class="admin-btn ">
                    <span>CSVアップロードで更新</span>
                  </div>
                </div>
              </div>

              <br/>
              <div class="c-list-tbl mgn-l-3 mgn-r-3">
                  <table class="p-table p_credit_table">
                        <tr class="">
                            <th class="credit">
                              <div class="display-inline--flex width-full">
                                <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">ID</span>
                                <div class="sorting mgn-l-ato">
                                  <span class="c-icn-polygon-up"></span>
                                  <span class="c-icn-polygon-down-active"></span>
                                </div>
                              </div>
                            </th>
                            <th class="credit">
                              <div class="display-inline--flex width-full">
                                <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">プラン</span>
                                <div class="sorting mgn-l-ato">
                                  <span class="c-icn-polygon-up"></span>
                                  <span class="c-icn-polygon-down-active"></span>
                                </div>
                              </div>
                            </th>
                            <th class="credit">
                              <div class="display-inline--flex width-full">
                                <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">店舗名</span>
                                <div class="sorting mgn-l-ato">
                                  <span class="c-icn-polygon-up"></span>
                                  <span class="c-icn-polygon-down-active"></span>
                                </div>
                              </div>
                            </th>
                            <th class="credit">
                              <div class="display-inline--flex width-full">
                                <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">未払い</span>
                                <div class="sorting mgn-l-ato">
                                  <span class="c-icn-polygon-up"></span>
                                  <span class="c-icn-polygon-down-active"></span>
                                </div>
                              </div>
                            </th>
                            <th class="credit">
                              <div class="display-inline--flex width-full">
                                <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">未払額</span>
                                <div class="sorting mgn-l-ato">
                                  <span class="c-icn-polygon-up"></span>
                                  <span class="c-icn-polygon-down-active"></span>
                                </div>
                              </div>
                            </th>
                            <th class="credit">
                              <div class="display-inline--flex width-full">
                                <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">入金額</span>
                                <div class="sorting mgn-l-ato">
                                  <span class="c-icn-polygon-up"></span>
                                  <span class="c-icn-polygon-down-active"></span>
                                </div>
                              </div>
                            </th>
                            <th class="credit">
                              <div class="display-inline--flex width-full">
                                <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">入金日</span>
                                <div class="sorting mgn-l-ato">
                                  <span class="c-icn-polygon-up"></span>
                                  <span class="c-icn-polygon-down-active"></span>
                                </div>
                              </div>
                            </th>
                            <th class="credit">
                              <div class="display-inline--flex width-full">
                                <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">備考</span>
                                <div class="sorting mgn-l-ato">
                                  <span class="c-icn-polygon-up"></span>
                                  <span class="c-icn-polygon-down-active"></span>
                                </div>
                              </div>
                            </th>
                        </tr>
                      <tbody class="p-table__data">
                        <tr>
                            <td>R12345</td>
                            <td>ベーシック</td>
                            <td class="tf_color">有限会社ミキハウジング</td>
                            <td>6.6か月分</td>
                            <td>33000</td>
                            <td>
                              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                  <div class="c-input c-input--full_4 c_input_full_shadow">
                                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                                  </div>
                              </div>
                            </td>
                            <td class="">
                              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                  <div class="c-input c-input--full_4 c_input_full_shadow">
                                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                                  </div>
                              </div>
                            </td>
                            <td class="">
                              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                  <div class="c-input c-input--full_4 c_input_full_shadow">
                                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                                  </div>
                              </div>
                            </td>
                        </tr>
                        <td>R111111</td>
                            <td>ベーシック</td>
                            <td class="tf_color">株式会社アスケイト</td>
                            <td >10.0か月分</td>
                            <td >3,0000</td>
                            <td >
                              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                  <div class="c-input c-input--full_4 c_input_full_shadow">
                                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                                  </div>
                              </div>
                            </td>
                            <td >
                              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                  <div class="c-input c-input--full_4 c_input_full_shadow">
                                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                                  </div>
                              </div>
                            </td>
                            <td >
                              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                  <div class="c-input c-input--full_4 c_input_full_shadow">
                                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                                  </div>
                              </div>
                            </td>
                        </tr>
                        <td>R111111</td>
                            <td >ベーシック</td>
                            <td class="tf_color">プレンティー株式会社</td>
                            <td >9.0か月分</td>
                            <td >2,7000</td>
                            <td >
                              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                  <div class="c-input c-input--full_4 c_input_full_shadow">
                                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                                  </div>
                              </div>
                            </td>
                            <td class="">
                              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                  <div class="c-input c-input--full_4 c_input_full_shadow">
                                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                                  </div>
                              </div>
                            </td>
                            <td class="-border">
                              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                  <div class="c-input c-input--full_4 c_input_full_shadow">
                                    <input type="password" name="password" placeholder="" value="{{ old("password") }}">
                                  </div>
                              </div>
                            </td>
                        </tr>
                      </tbody>
                  </table><br/><br/><br/>
                  <div class="foot_3">
                      <div class="p-login__buttonArea">
                          <button type="submit" class="credit__button modal-button"  href="#myModal_credit">確認</button>
                      </div>
                  </div>
                  <div class="pagination-cont2-body">
                    <div class="pagination-cont">
                      <div class="pagination mgn-b-01">
                        <ul>
                          <li class="page-item disabled" aria-disabled="true" aria-label="« 前">
                            <a class="" aria-hidden="true">
                              <i class="arr-prev"></i>
                            </a>
                          </li>
                          <li class="page-item " aria-current="page">
                            <a class="active  ">1</a>
                          </li>
                          <li class="page-item">
                            <a class="a_credit_inactive">2</a>
                          </li>
                          <li class="page-item">
                            <a class="a_credit_inactive">3</a>
                          </li>
                          <li class="page-item">
                            <a class="a_credit_inactive">4</a>
                          </li>
                          <li class="page-item">
                            <a class="a_credit_inactive">...</a>
                          </li>
                          <li class="page-item">
                            <a class="a_credit_inactive">60</a>
                          </li>
                          <li>
                            <a class="" href="http://localhost:8000/store/search/mocklist?id=6f4gmz810qet3pxy&amp;page=2" rel="next" aria-label="次 »">
                              <i class="arr-next"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="mgn-t-3 mgn-r-5">
                        <select class="keep-slct-01 width-75" name="" id="">
                          <option value="0">10  </option>
                        </select>
                      </div>
                      <div class="mpage-desc mgn-t-5">
                        <span>件表示 / ページ</span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
      </div>

      <!-- Trigger/Open The Modal -->
      {{--  <button class="modal-button" href="#myModal_credit">Open Modal</button>  --}}

      <!-- The Modal -->
      <div id="myModal_credit" class="modal">
        <!-- Modal content -->
        <div class="modal-content_credit">
          <span class="close">&times;</span>
          <div class="c-list-tbl mgn-l-3 mgn-r-3">
            <table class="p-table p_credit_table">
                  <tr class="">
                      <th class="credit">
                        <div class="display-inline--flex width-full">
                          <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">ID</span>
                          <div class="sorting mgn-l-ato">
                            <span class="c-icn-polygon-up"></span>
                            <span class="c-icn-polygon-down-active"></span>
                          </div>
                        </div>
                      </th>
                      <th class="credit">
                        <div class="display-inline--flex width-full">
                          <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">プラン</span>
                          <div class="sorting mgn-l-ato">
                            <span class="c-icn-polygon-up"></span>
                            <span class="c-icn-polygon-down-active"></span>
                          </div>
                        </div>
                      </th>
                      <th class="credit">
                        <div class="display-inline--flex width-full">
                          <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">店舗名</span>
                          <div class="sorting mgn-l-ato">
                            <span class="c-icn-polygon-up"></span>
                            <span class="c-icn-polygon-down-active"></span>
                          </div>
                        </div>
                      </th>
                      <th class="credit">
                        <div class="display-inline--flex width-full">
                          <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">未払い</span>
                          <div class="sorting mgn-l-ato">
                            <span class="c-icn-polygon-up"></span>
                            <span class="c-icn-polygon-down-active"></span>
                          </div>
                        </div>
                      </th>
                      <th class="credit">
                        <div class="display-inline--flex width-full">
                          <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">未払額</span>
                          <div class="sorting mgn-l-ato">
                            <span class="c-icn-polygon-up"></span>
                            <span class="c-icn-polygon-down-active"></span>
                          </div>
                        </div>
                      </th>
                      <th class="credit">
                        <div class="display-inline--flex width-full">
                          <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">入金額</span>
                          <div class="sorting mgn-l-ato">
                            <span class="c-icn-polygon-up"></span>
                            <span class="c-icn-polygon-down-active"></span>
                          </div>
                        </div>
                      </th>
                      <th class="credit">
                        <div class="display-inline--flex width-full">
                          <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">入金日</span>
                          <div class="sorting mgn-l-ato">
                            <span class="c-icn-polygon-up"></span>
                            <span class="c-icn-polygon-down-active"></span>
                          </div>
                        </div>
                      </th>
                      <th class="credit">
                        <div class="display-inline--flex width-full">
                          <span class="mgn-t-1 fnt-sz-4 fnt-wgt-3">備考</span>
                          <div class="sorting mgn-l-ato">
                            <span class="c-icn-polygon-up"></span>
                            <span class="c-icn-polygon-down-active"></span>
                          </div>
                        </div>
                      </th>
                  </tr>
                <tbody class="p-table__data">
                  <tr>
                      <td>R12345</td>
                      <td>ベーシック</td>
                      <td class="tf_color">有限会社ミキハウジング</td>
                      <td>6.6か月分</td>
                      <td>33000</td>
                      <td>33000</td>
                      <td>2022年6月10日</td>
                      <td>井本）振込確認</td>
                     
                  </tr>
                  <td>R111111</td>
                      <td>ベーシック</td>
                      <td class="tf_color">株式会社アスケイト</td>
                      <td >10.0か月分</td>
                      <td >3,0000</td>
                      <td >3,0000</td>
                      <td >2022年6月10日</td>
                      <td >佐竹）振込確認</td>
                      
                    </tr>
                </tbody>
            </table><br/><br/><br/>
            <div class="foot_3">
                <div class="p-login__buttonArea">
                    <button type="submit" class="credit__button modal-button"  href="#myModal_credit">確定する</button>
                </div>
            </div>
            
        </div>
          <br>
        </div>
      </div>
    @endslot
  @endcomponent

<script>


  // Get the button that opens the modal
  var btn = document.querySelectorAll("button.modal-button");

  // All page modals
  var modals = document.querySelectorAll('.modal');

  // Get the <span> element that closes the modal
  var spans = document.getElementsByClassName("close");

  // When the user clicks the button, open the modal
  for (var i = 0; i < btn.length; i++) {
    btn[i].onclick = function(e) {
        e.preventDefault();
        modal = document.querySelector(e.target.getAttribute("href"));
        modal.style.display = "block";
        $('.l-frame__sidebar').css("zIndex", "0");
    }
  }

  // When the user clicks on <span> (x), close the modal
  for (var i = 0; i < spans.length; i++) {
  spans[i].onclick = function() {
      for (var index in modals) {
        if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
        $('.l-frame__sidebar').css("zIndex", "1");
      }
  }
}

// When the user clicks anywhere outside of the modal, close it
{{--  window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
     for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
     }
    }
}  --}}

  </script>
@endsection

