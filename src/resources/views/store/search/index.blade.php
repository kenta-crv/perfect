@extends('store.layouts.layout-store-home')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
@slot('body')
<div class="c-contianer-box_2 width-full">

  <div class="box-data">
    <div class=" input--calendar mgn-5">
      <label class="cont-alert" for="">
        <p>ここに、必要な時にシステム的なレコメンドやアラートが表示。なければ本エリアは無くなり、全体が上にあがる。</p>
        <span class="c-x-mark"></span>
      </label>
    </div>
    @if( session('api_message') )
      <div class="input--calendar mgn-5">
        <label class="cont-alert" for="">{{ session('api_message') }}
          <span class="c-x-mark"></span>
        </label>
      </div>
    @endif
    <div class="container-table ">
      <div id="London" class="tabcontent" style="display: block;">
        <div class="box-display-01 width-full" x-data="">
          <div class="c-container-sidebar" x-show="$store.steps.current == 'step2'" style="display: none;">
            <div class="form">
              <div class="p-sidebar-heading">
                <span> この検索に名前を付けて保存</span>
                <a class="p-sidebar-btn bg-white" href="">保存</a>
              </div>
              <div class="p-sidebar-info">
                <span>Step1 の検索条件（再検索用）</span>
              </div>
              <div class="p-sidebar-heading">
                <span> 検索サイト</span>
                <a class="p-sidebar-btn bg-white" href="">変更</a>
              </div>
              <div class="p-sidebar-info">
                <span>レインズ / at BB</span>
              </div>
              <div class="p-sidebar-heading padding-5">
                <span>物件種目</span>
              </div>
              <div class="p-sidebar-info">
                  <label class="c-lbl-green margin--5" for="">マンション</label>
                  <label class="c-lbl-white margin--5" for="">アパート</label>
                  <label class="c-lbl-white margin--5" for="">戸建</label>
                  <label class="c-lbl-green margin--5" for="">テラスハウス</label>

                  <label class="c-lbl-white margin--5" for="">その他</label>
                </div>
            </div>
            <div class="p-sidebar-heading">
              <span>都道府県</span>
              <a class="p-sidebar-btn bg-white" href="">変更</a>
            </div>
            <div class="p-sidebar-info">
              <span>東京 / 神奈川</span>
            </div>
            <div class="form-tabs">
              <div class="tab-details display-inline--flex" x-data="">
                <template x-for="tab in $store.tabs.items">
                  <a
                  :class="{ 'tab-active': tab.label == $store.tabs.current, 'tab-default': tab.label != $store.tabs.current}"
                  @click="$store.tabs.current = tab.label" x-text="tab.description">
                </a>
              </template>
              </div>
              <div class="tabs-result" x-data="">
                <div class="tab-box" x-show="$store.tabs.current == 'first'">
                  <div class="display-f-sb">
                    <span class="p-sidebar-info-02">品川区 / 大田区 / 横浜市中区</span>
                    <a class="p-sidebar-btn bg-white margin-left--auto" href="">追加</a>
                  </div>

                  <div class="p-sidebar-heading-01 margin-top--10">
                    <span>町村</span>
                    <a class="p-sidebar-btn bg-white" href="">変更</a>
                  </div>
                </div>
                <div class="tab-box" x-show="$store.tabs.current == 'second'" style="display: none;">
                  next tab
                </div>
              </div>

            </div>
            <div class="form-item">
              <div class="p-sidebar-heading padding-5">
                <span>建物・物件名</span>
              </div>
              <input type="text" class="wd--93 padding-5">
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading padding-5">
                <span>賃料</span>
              </div>
              <div class="slct-box-cont">
                <div class="display-inline--flex width-full">
                  <input type="text" class="wd--60 padding-5">
                  <span class="p-sidebar-info-01">万円～</span>
                </div>
                <div class="display-inline--flex margin width-full">
                  <input type="text" class="wd--60 margin-left--28 padding-5">
                  <span class="p-sidebar-info-01">万円</span>
                </div>
              </div>
              <div class="p-sidebar-opt">
                <label class="c-lbl-green margin--5" for="">管理費等込</label>
                <label class="c-lbl-green margin--5" for="">礼金無</label>
                <label class="c-lbl-white margin--5" for="">敷金等無</label>
              </div>
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading padding-5">
                <span>町村</span>
              </div>
              <div class="p-sidebar-opt">
                <div class="display-inline--flex margin-top--10">
                  <label class="c-lbl-green" for="">1R</label>
                  <label class="" for=""></label>
                  <label class="" for=""></label>
                </div>
                <div class="display-inline--flex">
                  <label class="c-lbl-green" for="">1K..</label>
                  <label class="c-lbl-white" for="">1DK..</label>
                  <label class="c-lbl-green" for="">1LDK..</label>
                </div>
                <div class="display-inline--flex ">
                  <label class="c-lbl-white" for="">2K..</label>
                  <label class="c-lbl-green" for="">2DK..</label>
                  <label class="c-lbl-green" for="">2LDK..</label>
                </div>
                <div class="display-inline--flex ">
                  <label class="c-lbl-white" for="">3K..</label>
                  <label class="c-lbl-green" for="">3DK..</label>
                  <label class="c-lbl-green" for="">3LDK..</label>
                </div>
                <div class="display-inline--flex ">
                  <label class="c-lbl-white" for="">4K..</label>
                  <label class="c-lbl-white" for="">4DK..</label>
                  <label class="c-lbl-white" for="">4LDK..</label>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading padding-5">
                <span>専有面積</span>
              </div>
              <div class="slct-box-cont">
                <div class="display-inline--flex width-full">
                  <input type="text" class="wd--60 padding-5">
                  <span class="p-sidebar-info-01">㎡　～</span>
                </div>
                <div class="display-inline--flex margin width-full">
                  <input type="text" class="wd--60 margin-left--28 padding-5">
                  <span class="p-sidebar-info-01">㎡</span>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading ">
                <span>建物構造</span>
                <a class="p-sidebar-btn bg-white" href="">追加</a>
              </div>
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading padding-5">
                <span>専有面積</span>
              </div>
              <div class="slct-box-cont">
                <div class="display-inline--flex width-full">
                  <input type="text" class="wd--60 padding-5">
                  <span class="p-sidebar-info-01">年 〜</span>
                </div>
                <div class="display-inline--flex margin width-full">
                  <input type="text" class="wd--60 margin-left--28 padding-5">
                  <span class="p-sidebar-info-01">年 </span>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading padding-5">
                <span>フリーワード</span>
              </div>
              <input type="text" class="wd--93 padding-5">
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading">
                <span>登録・公開日</span>
                <a class="p-sidebar-btn bg-white" href="">変更</a>
              </div>
              <div class="p-sidebar-info">
                <span>2021年9月15日以降</span>
              </div>
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading padding-5">
                <span>画像データ</span>
              </div>
              <div class="p-sidebar-opt display-inline--flex margin-top--10">
                <label class="c-lbl-green" for="">物件画像あり</label>
                <label class="c-lbl-white" for="">図面あり</label>
              </div>
            </div>
            <div class="form-item">
              <div class="p-sidebar-bottom">
                <label class="c-lbl-white margin-top--10" for="">再検索</label>
                <a class="clr-cond-01" href="">クリア</a>
              </div>
            </div>
          </div>

          <div class="c-container-content">
            <div class="stepper-container mgn-l-4 mgn-r-4">
              <div class="stepper c-stepper-storeHome">
                <div class="step-header">
                  <div class="my-steps" x-data="">
                    {{--  <template x-for="step in $store.steps.items">
                      <span
                        class="mgn-l-3"
                        :class="{ 'active': step.label == $store.steps.current, '' : step.label != $store.steps.current}"
                        @click="$store.steps.current = step.label" x-text="step.label + '  >'">
                      </span>
                    </template>  --}}
                  </div>
                  <div class="step-desc" x-data="">
                    <div class="step-title" x-show="$store.steps.current == 'step1'">
                      使い方 Step1
                    </div>
                    <div class="" x-show="$store.steps.current == 'step2'" style="display: none;">
                      使い方 Step2
                    </div>
                  </div>
                  <i class="fa-solid path_138"></i>
                </div>
                <div class="step-body">
                  <ul x-data="">
                    <li class="mgn-l-3 step-subhead">
                      検索元となる物件流通サイトにより検索条件が異なるため、ロボレでは次の方法にて一括検索ができます。
                    </li>
                    <li>
                      <div class="l-12 l-12--gap24 mgn-l-3">
                        <div class="step-info_mark">
                          Step1
                        </div>
                        <div class="l-12__6 ">
                          この画面にて、各業者間流通で共通の項目で検索します。
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="l-12 l-12--gap24 mgn-l-3">
                        <div class="step-info_mark">
                          Step2-1
                        </div>
                        <div class="l-12__6 ">
                          検索結果画面にて、気になる物件の詳細画面を別ウィンドウで見れます。
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="l-12 l-12--gap24 mgn-l-3">
                        <div class="step-info_mark">
                          Step2-2
                        </div>
                        <div class="l-12__6 ">
                          検索結果画面にて、気になる物件を選び、検索条件を追加して絞込み検索ができます。
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="step-result" x-data="">
              <div class="" x-show="$store.steps.current == 'step1'">
                <div class="search-result-01">
                  <div class="conditions">
                    <div class="cond-display">
                      <span class="cnd-01">保存した条件を下記の検索項目に入力</span>
                      <select class="keep-slct-01" name="" id="">
                        <option value="0"></option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="c-list-fields">
                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide"> ガイド</div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                      <label class="" for="">販売店グループマスタ </label>
                      </div>
                    </div>
                    <div class="l-12__9 display_inline--flex">
                      <div class="l-12 l-12--gap24 ">
                        <div class="l-12__2">
                          <div>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked="checked">
                            <label for="vehicle1">レインズ</label>
                          </div>
                        </div>
                        <div class="l-12__2">
                            <div>
                              <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked="checked">
                              <label for="vehicle1">at BB</label>
                            </div>
                        </div>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="c-list-fields display-inline-flex">
                  <div class="l-12 l-12--gap24 margin-bottom-01 ">
                    <div class="mandatory-flex">必須</div>
                    <div class="l-12__9 ">
                      <span class="mandatory-txt">「物件種目」と「都道府県」を選択してください。それぞれ複数選択可能です。
                      </span>
                    </div>
                  </div>
                </div>

                <div class="c-list-fields">
                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label display_inline--flex">
                      <div class="lbl-txt-01">
                        <label>物件種目 </label>
                        <label class="c-lbl-white" for="">ALL</label>
                      </div>
                    </div>
                    <div class="l-12__9 display_inline--flex">
                      <div class="l-12 l-12--gap24 box-display">
                        <label class="c-lbl-green margin--5" for="">マンション</label>
                        <label class="c-lbl-green margin--5" for="">アパート</label>
                        <label class="c-lbl-white margin--5" for="">戸建</label>
                        <label class="c-lbl-white margin--5" for="">テラスハウス</label>
                        <label class="c-lbl-white margin--5" for="">タウンハウス</label>
                        <label class="c-lbl-white margin--5" for="">その他</label>
                      </div>
                    </div>
                  </div>
                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label-01">
                      <label class="c-lbl-white margin--10" for="">都道府県 選択</label>
                    </div>
                    <div class="l-12__9">
                      <div class="box-display">
                          <label class="c-lbl-green margin--5" for="">東京都</label>
                          <label class="c-lbl-green margin--5" for="">神奈川県</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="c-list-fields display-inline-flex">
                  <div class="l-12 l-12--gap24 margin-bottom-01 ">
                    <div class="mandatory-flex">必須</div>
                    <div class="l-12__9 ">
                      <span class="mandatory-txt">『路線』か『市区群』のどちらかを選択し、検索条件を入力してください。（両方を使った検索はできません）</span>
                    </div>
                    </div>
                </div>

                <div class="c-list-fields">
                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label-01">
                      <label class="c-lbl-white margin--5" for="">路線 選択</label>
                      <label class="c-lbl-white margin--5" for="">路線 選択</label>
                    </div>
                    <div class="l-12__9 display_inline--flex">
                      <div class="l-12 l-12--gap24">
                        <span>路線を選択する場合は、左のボタンをクリックして選択ください。</span>
                        <span>駅を選択する場合は、先に路線を選択ください。（1回の検索で3か所まで。山手線で「東京～品川」）などの範囲指定も1か所計算。</span>
                      </div>
                    </div>
                  </div>
                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                        <label>駅からの徒歩</label>
                      </div>
                    </div>
                    <div class="l-12__9 display_inline--flex">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__4">
                          <div class="c-input-01 c-input--full display-inline--flex">
                            <input type="email" name="email" placeholder="">
                              <span class="width-full margin-left--5">分以内</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="c-list-fields ">
                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11 ">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label-01">
                      <label class="c-lbl-white margin--10" for="">路線 選択</label>
                      <label class="c-lbl-white margin--10" for="">路線 選択</label>
                    </div>
                    <div class="l-12__9 display_inline--flex">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__9">
                          <div class="box-display ">
                            <label class="c-lbl-green margin--5" for="">品川区</label>
                            <label class="c-lbl-green margin--5" for="">大田区</label>
                            <label class="c-lbl-green margin--5" for="">横浜市中区</label>
                          </div>
                        </div>
                        <div class="l-12__10">
                          <span>町村を選択する場合は、左のボタンをクリックして選択ください。（1回の検索で3か所まで。）</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="c-list-fields display-inline-flex">
                  <div class="l-12 l-12--gap24 margin-bottom-01 ">
                    <div class="c-any">任意</div>
                    <div class="l-12__9 ">
                      <span class="mandatory-txt">その他の条件を入力してください</span>
                    </div>
                  </div>
                </div>

                <div class="c-list-fields">
                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                        <label>建物・物件名</label>
                      </div>
                    </div>
                    <div class="l-12__9">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__11 input-box">
                          <div class="c-input-01 c-input--full display-inline--flex">
                            <input type="email" name="email" placeholder="" class="input-01">
                            <span class="width-full margin-left--5 input-txt">※入力されたワードは部分一致で検索します 〜</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11 ">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                      <label>賃料</label>
                      </div>
                    </div>
                    <div class="l-12__9">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__3">
                          <div class="c-input-01 c-input--full display-inline--flex input-box">
                              <input type="email" name="email" placeholder="" class="">
                              <span class="width-full margin-left--5 mgn-t-1">万円　～</span>
                          </div>
                        </div>
                        <div class="l-12__3">
                          <div class="c-input-01 c-input--full display-inline--flex input-box">
                              <input type="email" name="email" placeholder="" class="input-01">
                              <span class="width-full margin-left--5 mgn-t-1">万円</span>
                          </div>
                        </div>
                        <div class="l-12__5">
                          <span class="input-txt ">※サイトにより細かく検索ができないため、多めに検索し結果をロボレが判断し表示します。
                            （その場合、検索結果数が増えるため課金に注意ください）</span>
                        </div>
                        <div class="l-12__10 ">
                          <div class="l-12 l-12--gap24">
                            <div class="l-12__12">
                              <div class="box-display">
                                <label class="c-lbl-white margin--5" for="">管理・共益費込</label>
                                <label class="c-lbl-white margin--5" for="">礼金なし</label>
                                <label class="c-lbl-green margin--5" for="">敷金・保証料なし</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11 ">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                        <label>間取り</label>
                      </div>
                    </div>
                    <div class="l-12__9">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__12">
                          <ul class="p-list">
                            <li class="inline__display p-list__item p-list__item--center">
                              <div class="p-list__item__data l-12 l-12--gap24">
                                <div class="l-12__2 ">
                                  <span>掲載する期間</span>
                                </div>
                                <div class="l-12__1 ">
                                  <ul>
                                    <li class="box-display">
                                      <label class="c-lbl-white " for="">1K/SK</label>
                                    </li>
                                    <li class="box-display">
                                      <label class="c-lbl-white " for="">2K/SK</label>
                                    </li>
                                    <li class="box-display">
                                      <label class="c-lbl-white" for="">3K/SK</label>
                                    </li>
                                    <li class="box-display">
                                      <label class="c-lbl-white" for="">4K/SK</label>
                                    </li>
                                  </ul>
                                </div>
                                <div class="l-12__2">
                                  <ul>
                                    <li class="box-display">
                                      <label class="c-lbl-white " for="">1DK/LK/SDK/SLK</label>
                                    </li>
                                    <li class="box-display">
                                      <label class="c-lbl-white" for="">2DK/LK/SDK/SLK</label>
                                    </li>
                                    <li class="box-display">
                                      <label class="c-lbl-green" for="">3DK/LK/SDK/SLK</label>
                                    </li>
                                    <li class="box-display">
                                      <label class="c-lbl-white" for="">4DK/LK/SDK/SLK</label>
                                    </li>
                                  </ul>
                                </div>
                                <div class="l-12__1">
                                  <ul>
                                    <li class="box-display">
                                      <label class="c-lbl-white" for="">1LDK/SLDK</label>
                                    </li>
                                    <li class="box-display">
                                      <label class="c-lbl-white" for="">2LDK/SLDK</label>
                                    </li>
                                    <li class="box-display">
                                      <label class="c-lbl-white" for="">3LDK/SLDK</label>
                                    </li>
                                    <li class="box-display">
                                      <label class="c-lbl-green" for="">4LDK/SLDK</label>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11 ">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                        <label>専有面積</label>
                      </div>
                    </div>
                    <div class="l-12__9">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__3">
                          <div class="c-input-01 c-input--full display-inline--flex input-box">
                            <input type="email" name="email" placeholder="" class="input-01">
                            <span class="width-full margin-left--5 mgn-t-1">㎡ 〜</span>
                          </div>
                        </div>
                        <div class="l-12__3">
                          <div class="c-input-01 c-input--full display-inline--flex input-box">
                              <input type="email" name="email" placeholder="" class="input-01">
                              <span class="width-full margin-left--5 mgn-t-1">㎡</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt-01 margin--5">
                        <label>建物構造</label>
                        <label class="c-lbl-white" for="">ALL</label>
                        </div>
                    </div>
                    <div class="l-12__9 display_inline--flex ">
                      <div class="l-12 l-12--gap24 box-display">
                        <label class="c-lbl-green margin--5" for="">木造</label>
                        <label class="c-lbl-green margin--5 " for="">ブロック造</label>
                        <label class="c-lbl-green margin--5" for="">鉄骨造</label>
                        <label class="c-lbl-green margin--5" for="">ＲＣ</label>
                        <label class="c-lbl-green margin--5" for="">ＳＲＣ</label>
                        <label class="c-lbl-green margin--5" for="">ＰＣ</label>
                        <label class="c-lbl-green margin--5" for="">ＨＰＣ</label>
                        <label class="c-lbl-green margin--5" for="">軽量鉄骨造</label>
                        <label class="c-lbl-green margin--5" for="">ＡＬＣ</label>
                        <label class="c-lbl-green margin--5" for="">その他</label>
                      </div>
                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11 ">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                        <label>築年数</label>
                      </div>
                    </div>
                    <div class="l-12__9">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__3">
                          <div class="c-input-01 c-input--full display-inline--flex input-box">
                            <input type="email" name="email" placeholder="" class="input-01">
                            <span class="width-full margin-left--5 mgn-t-1">年 〜</span>
                          </div>
                        </div>
                        <div class="l-12__3">
                          <div class="c-input-01 c-input--full display-inline--flex input-box">
                              <input type="email" name="email" placeholder="" class="input-01">
                              <span class="width-full margin-left--5 mgn-t-1">年以内</span>
                          </div>
                        </div>
                        <div class="l-12__6">
                          <span class="input-txt">※新築を検索する場合は「0年以内」と入力</span>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                        <label>所在階数</label>
                      </div>
                    </div>
                    <div class="l-12__9">
                      <div class="l-12 l-12--gap24">
                        <br>
                        <div class="l-12__6">
                          <div class="c-input c-input--full display-inline--flex">
                            <div class="c-input c-input--radio">
                              <input id="authors_on" name="authors" type="radio" value="1" checked="checked">
                              <label for="authors_on">管理・共益費込</label>
                            </div>
                            <div class="c-input c-input--radio">
                              <input id="authors_on" name="authors" type="radio" value="1" checked="checked">
                              <label for="authors_on">階を指定</label>
                            </div>
                            <div class="c-input c-input--radio">
                              <input id="authors_on" name="authors" type="radio" value="1" checked="checked">
                              <label for="authors_on">最上階</label>
                            </div>
                          </div>
                        </div>

                        <div class="l-12__6 margin-left--auto">
                          <span class="width-full margin-left--5 input-txt">※検索できるサイトのみで検索。（検索できないサイトでも詳細画面で分かる場合もあるため、
                            その場合は本項目を使わず検索し詳細画面を確認ください。</span>
                        </div>
                      </div>
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__3">
                          <div class="c-input-01 c-input--full display-inline--flex input-box">
                            <input type="email" name="email" placeholder="">
                            <span class="width-full margin-left--5 mgn-t-1 ">階　～</span>
                          </div>
                        </div>
                        <div class="l-12__3">
                          <div class="c-input-01 c-input--full display-inline--flex input-box">
                              <input type="email" name="email" placeholder="">
                              <span class="width-full margin-left--5 mgn-t-1">階</span>
                          </div>
                        </div>
                        <div class="l-12__6">
                          <span class="width-full margin-left--5 input-txt">※サイトにより細かく検索ができないため、多めに検索し結果をロボレが判断し表示します。（その場合、検索結果数が増えるため課金に注意ください）</span>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                        <label>建物・物件名</label>
                      </div>
                    </div>
                    <div class="l-12__9">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__10">
                          <div class="c-input-01 c-input--full display-inline--flex input-box">
                            <input type="email" name="email" placeholder="" class="input-01">
                            <span class="width-full margin-left--5 input-txt">※BBサイトにより、備考欄のみの検索なためヒットしない事が多いです。</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                        <label>登録・公開日</label>
                      </div>
                    </div>
                    <div class="l-12__9">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__3">
                          <div class="c-input c-input--full input--calendar">
                            <label class="c-lbl-white c-input--full " for="">日付を選択
                              <span class="c-icn--calendar-01"></span>
                            </label>
                          </div>
                        </div>
                        <div class="l-12__4">
                          <span class="width-full input-txt">2021年9月15日以降</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt">
                        <label>取引態様</label>
                      </div>
                    </div>
                    <div class="l-12__9 ">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__9 ">
                          <div class="box-display">
                            <label class="c-lbl-green margin--5 " for="">貸主</label>
                            <label class="c-lbl-white margin--5" for="">代理</label>
                            <label class="c-lbl-white margin--5" for="">媒介</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="l-12 l-12--gap24 border-default-01 margin-bottom--11 ">
                    <div class="guide">
                      <div class="path_595"></div>
                    </div>
                    <div class="l-12__2 text-input__label">
                      <div class="lbl-txt margin--5">
                        <label>画像データ</label>
                      </div>
                    </div>
                    <div class="l-12__9">
                      <div class="l-12 l-12--gap24">
                        <div class="l-12__6">
                          <div class="box-display">
                            <label class="c-lbl-green margin--5" for="">物件画像あり</label>
                            <label class="c-lbl-white margin--5" for="">図面あり</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="select_property">
                <span class="explain" x-show="$store.steps.current == 'step2'" style="display: none;">  絞込み検索を行う場合は、先に対象物件のチェックボックスをONにして、検索してください。</span>
                  <label for="" x-show="$store.steps.current == 'step2'" style="display: none;">表示方法：</label>
                  <select name="" id="" x-show="$store.steps.current == 'step2'" style="display: none;">
                    <option value="">仲介用表示</option>
                  </select>
              </div>

              <div class="tbl-result" x-show="$store.steps.current == 'step2'" style="display: none;">
                <div class="stepper">
                  <div class="step-header">
                    <div class="step-desc" x-data="">
                      <div class="" x-show="$store.steps.current == 'step2'" style="display: none;">
                        物件情報の見方
                      </div>
                    </div>
                    <i class="fa-solid path_138"></i>
                  </div>
                  <div class="step-body_2">
                    <div class="tbl-result overflow-x" x-show="$store.steps.current == 'step2'" style="display: none;">
                      <table>
                        <tbody>
                          <tr>
                            <td colspan="7" rowspan="5">
                              <input type="checkbox">
                              <div class="rating-wrapper">
                                <input type="radio" name="rating" id="star">
                                <label for="rating"></label>
                              </div>
                            </td>
                            <td colspan="5" rowspan="5">
                              <span class="image-box">画像</span>
                            </td>
                            <td colspan="4" rowspan="5">
                              <span class="rent-ttl">賃料</span>
                            <ul>
                              <div class="rent-pay">
                                <div class="rent-right-pay">
                                  <li class="mgn-t-2">
                                    <div class="pay-details">
                                      <div class="pay-money">
                                          <span class="spl-desc">管</span>
                                          <span class="spl-desc_2">管理・共益費</span>
                                      </div>
                                    </div>

                                  </li>
                                  <li class="mgn-t-2">
                                    <div class="pay-details">
                                      <div class="pay-money">
                                        <span class="spl-desc">管</span>
                                        <span class="spl-desc_2">管理・共益費</span>
                                      </div>
                                    </div>

                                  </li>
                                  <li class="mgn-t-2">
                                    <div class="pay-details">
                                      <div class="pay-money">
                                        <span class="spl-desc">管</span>
                                        <span class="spl-desc_2">管理・共益費</span>
                                      </div>
                                    </div>

                                  </li>
                                </div>
                              </div>
                              </ul>

                            </td>
                            <td rowspan="1" colspan="8">物件名・部屋</td>
                            <td>元サイトへ</td>
                            <td>元サイトへ</td>

                          </tr>
                          <tr>
                            <td colspan="5">所在地</td>
                            <td colspan="4" rowspan="3">広告掲載</td>
                            <td>広告掲載</td>
                          </tr>
                          <tr>
                            <td rowspan="2" colspan="5">
                              <p>沿線駅・交通 1</p>
                              <p>沿線駅・交通 2</p>
                            </td>
                            <td>詳細表示</td>
                          </tr>
                          <tr>
                          </tr>
                          <tr>
                            <td colspan="3">登録会社</td>
                            <td colspan="3">電話番号</td>
                            <td colspan="3">AD</td>
                            <td colspan="3">詳細表示</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div><br>

              <div class="select_property" x-show="$store.steps.current == 'step2'" style="display: none;">
                <span class="explain" x-show="$store.steps.current == 'step2'" style="display: none;">  検索結果 120件 （レインズ 89件 / atBB 31件）</span>

                    <label for="" x-show="$store.steps.current == 'step2'" style="display: none;">表示方法：</label>
                    <select name="" id="" x-show="$store.steps.current == 'step2'" style="display: none;">
                      <option value="">仲介用表示</option>
                    </select><br>
              </div>


              <div class="select_property" x-show="$store.steps.current == 'step2'" style="display: none;">
                <div class="checkbox-right">
                  <input type="checkbox" id="vehicle1" name="vehicle1" class="search-checkbox" value="Bike" checked="checked">
                  <label for="vehicle1">レインズ</label>
                  <label for="">表示方法：</label>
                  <select name="" id="">
                    <option value="">仲介用表示</option>
                  </select><br>
                </div>
              </div>




              <div class="tbl-result overflow-x" x-show="$store.steps.current == 'step2'" style="display: none;">
                <table>
                  <tbody>
                      <tr>
                        <td colspan="7" rowspan="5">
                          <input type="checkbox">
                          <div class="rating-wrapper">
                            <input type="radio" name="rating" id="star">
                            <label for="rating"></label>
                          </div>
                        </td>
                        <td colspan="5" rowspan="5">
                        <span class="image-box">画像</span>
                        </td>
                        <td colspan="4" rowspan="5">
                          <span class="rent-ttl">14.5万円</span>
                        <ul>
                          <div class="rent-pay">
                            <div class="rent-right-pay">
                              <li class="mgn-t-2">
                                <div class="pay-details">
                                  <div class="pay-money">

                                      <span class="spl-desc">管</span>
                                      <span class="spl-desc_2">8,000円</span>

                                  </div>
                                </div>

                              </li>
                              <li class="mgn-t-2">
                                <div class="pay-details">
                                  <div class="pay-money">

                                      <span class="spl-desc">管</span>
                                      <span class="spl-desc_2">1ヶ月</span>

                                  </div>
                                </div>

                              </li>
                              <li class="mgn-t-2">
                                <div class="pay-details">
                                  <div class="pay-money">

                                      <span class="spl-desc">管</span>
                                      <span class="spl-desc_2">1ヶ月</span>

                                  </div>
                                </div>

                              </li>
                            </div>
                          </div>
                        </ul>

                        </td>
                        <td rowspan="1" colspan="8">物件名・部屋</td>
                        <td>元サイトへ</td>
                        <td>元サイトへ</td>

                    </tr>
                    <tr>
                      <td colspan="5">所在地</td>
                      <td colspan="4" rowspan="3">広告掲載</td>
                      <td>広告掲載</td>
                    </tr>
                    <tr>
                      <td rowspan="2" colspan="5">
                          <p>沿線駅・交通 1</p>
                          <p>沿線駅・交通 2</p>
                      </td>
                      <td>詳細表示</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                      <td colspan="3">登録会社</td>
                      <td colspan="3">電話番号</td>
                      <td colspan="3">AD</td>
                      <td colspan="3">詳細表示</td>
                    </tr>
                  </tbody>
                </table>

                <div class="pagination">
                  <ul>
                    <li>
                      <span>
                        <i class="arr-next"></i>
                      </span>
                    </li>
                    <li>
                      <span>1</span>
                    </li>
                    <li>
                      <span class="active">2</span>
                    </li>
                    <li>
                      <span>3</span>
                    </li>
                    <li>
                      <span>
                        <i class="arr-prev"></i>
                      </span>
                    </li>
                  </ul>
                </div>

              </div>



            </div>
          </div>
        </div>

      </div>
        <div id="Paris" class="tabcontent">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
          <h2>JavaScript Arrays</h2>
          <p id="demo"></p>
        </div>

        <div id="Tokyo" class="tabcontent">
          <h3>Tokyo</h3>
          <p>Tokyo is the capital of Japan.</p>
        </div>
    </div>
  </div>
</div>

<div class="search-bottom" x-show="$store.steps.current == 'step1'">
  <div class="sb-btm">
    <form class="search-btm" method="POST" action="{{ route('storeAdmin.search.list') }}">
      @csrf
      {{--  <input type="submit" value="検索">  --}}
      {{--  <input type="email" name="email" placeholder="検索" class="search_input">  --}}
      <button type="submit" class="search_property">
        <span>検索</span>
        <i class="c-icn--magnifying-glass"></i>
      </button>
    </form>
    <a href="#" class="clr-cond">条件をクリア</a>
    <select class="keep-slct" name="" id="" >
      <option value="0">この検索に名前を付けて保存</option>
    </select>
    <a href="#" class="c-lbl-white-01">保存</a>
  </div>
</div>
@endslot
  @endcomponent
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.store('steps', {
        current: 'step1',
        items: [
          {
            label: 'step1',
            desc: '一覧',
            content : [
              {
                label : 'Step1',
                desc : 'この画面にて、各業者間流通で共通の項目で検索します。'
              }
            ],
          },
          {
            label: 'step2',
            desc: '一覧',
            content : [
              {
                label : 'Step2-1',
                desc : '検索結果画面にて、気になる物件の詳細画面を別ウィンドウで見れます。',
              },
              {
                label : 'Step2-2',
                desc : '検索結果画面にて、気になる物件を選び、検索条件を追加して絞込み検索ができます。',
              },
            ],
          },

        ],
      })
    })
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

    document.addEventListener('alpine:init', () => {
      Alpine.store('tabs', {
        current: 'first',
        items: [
          {
            label: 'first',
            description: '市区群',
            class: 'tab-active',
            parent_id: 'first-tab',
          },
          {
            label: 'second',
            description: '路線',
            class: 'tab-default',
            parent_id: 'second-tab',
          },
        ],

        item_tabs: [
          {
            label: 'first',
            description: '賃貸居住検索',
            class: 'active',
            parent_id: 'first-tab',
          },
          {
            label: 'second',
            description: '賃貸居住 お気に入り',
            class: '',
            parent_id: 'second-tab',
          },
          {
            label: 'third',
            description: '広告出稿',
            class: '',
            parent_id: 'second-tab',
          },
        ],
        // use when tabs is more than 2
        showTabs(label, parent_id) {
          console.log(parent_id);
          for(keys in this.items){
            var item = this.items[keys];
            if(item['label'] == label){
              $('#'+parent_id).hide()
            }
            else{
              $('#'+item['parent_id']).show()
            }
          }
      }

    })
  })
  </script>
@endsection
