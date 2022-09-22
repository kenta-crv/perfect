@extends('store.layouts.layout-store-home')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('admin.component._p-index')
@slot('body')
<div class="c-contianer-box_2">
  <div class="box-data">
    <div class="container-table margin-top--01">
        <div id="London" class="tabcontent" style="display: block;">
          <div class="box-display-01 width-full" x-data="">
            <div class="c-container-sidebar" >
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
              <div class="search-settings mgn-b-5">
                <div class="cont-alert">
                  <span>ここに、必要な時にシステム的なレコメンドやアラートが表示。なければ本エリアは無くなり、全体が上にあがる。</span>
                </div>
              </div>
              <div class="stepper">
                <div class="step-header">
                  <div class="my-steps" x-data>
                    <template x-for="step in $store.steps.items">
                      <span
                        @click="$store.steps.current = step.label"
                        x-text="step.label">
                      </span>
                    </template>

                  </div>
                  <div class="step-desc" x-data>
                    <div class="" x-show="$store.steps.current == 'step1'">
                      使い方 Step1
                    </div>
                    <div class="" x-show="$store.steps.current == 'step2'">
                      使い方 Step2
                    </div>
                  </div>
                  <i class="fa-solid path_138"></i>
                </div>

                <div class="step-body">
                  <ul x-data>
                    <template x-for="step in $store.steps.items ">
                        <template x-for="list in step.content ">
                          <li>
                            <div class="l-12 l-12--gap24 mgn-l-3">
                              <div clas="l-12__3" x-text="list.label">

                              </div>
                              <div clas="l-12__6 " x-text="list.desc">

                              </div>
                            </div>
                          </li>
                        </template>
                    </template>
                  </ul>
                </div>
              </div>

              <div class="step-result" x-data>
                <div class="select_property">
                  <span class="explain" >  絞込み検索を行う場合は、先に対象物件のチェックボックスをONにして、検索してください。</span>
                      <label for="" >表示方法：</label>
                      <select name="" id="" >
                        <option value="">仲介用表示</option>
                      </select>
                </div>

                <div class="tbl-result" >
                  <div class="stepper">
                    <div class="step-header">
                      <div class="step-desc" x-data>
                        <div class="" >
                          物件情報の見方dfdfdf
                        </div>
                      </div>
                      <i class="fa-solid path_138"></i>
                    </div>
                      <div class="step-body_2">
                        <div class="tbl-result overflow-x" >
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
                                  <td  colspan="5" rowspan="5">
                                  <span class="image-box">画像</span>
                                  </td>
                                  <td colspan="4" rowspan="5" style="width:100%;max-width:12%;">
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
                                              <span class="spl-desc">敷</span>
                                              <span class="spl-desc_2">敷金・保証金</span>
                                            </div>
                                          </div>

                                        </li>
                                        <li class="mgn-t-2">
                                          <div class="pay-details">
                                            <div class="pay-money">
                                              <span class="spl-desc">礼</span>
                                              <span class="spl-desc_2">礼金・権利金</span>
                                            </div>
                                          </div>

                                        </li>
                                      </div>
                                    </div>
                                  </ul>

                                  </td>
                                  <td rowspan="1" colspan="8">物件名・部屋</td>
                                  <td >更新日</td>
                                  <td>元サイトへ</td>

                              </tr>
                              <tr>
                                <td colspan="5" style="width:100%;max-width:30%;">所在地</td>
                                <td colspan="4" rowspan="3">
                                  <div style="display:flex; justify-content: space-around;">
                                    <ul style="text-align:left;">
                                      <li>面積</li>
                                      <li>所在階／建階	</li>
                                      <li>築年月</li>
                                    </ul>
                                    <ul style="text-align:left;">
                                      <li>物件種目</li>
                                      <li>間取り</li>
                                    </ul>
                                  </div>
                                </td>
                                <td>広告掲載</td>
                              </tr>
                              <tr>
                                <td rowspan="2" colspan="5">
                                    <p>沿線駅・交通 1</p>
                                    <p>沿線駅・交通 2</p>
                                </td>
                                <td>取引態様</td>
                              </tr>
                              <tr>
                              </tr>
                              <tr>
                                <td colspan="3" style="width:100%;max-width:20%;">登録会社</td>
                                <td colspan="3">電話番号</td>
                                <td colspan="3">AD</td>
                                <td colspan="3">詳細表示</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                  </div>
                </div><br/>

                <div class="select_property" >
                  <span class="explain" >  検索結果 {{ $property_count }}件 （レインズ {{ $property_count }}件 / atBB 0件）</span>

                      <label for="" >表示方法：</label>
                      <select name="" id="" >
                        <option value="">仲介用表示</option>
                      </select><br/>

                </div>


                <div class="select_property" >
                  <div class="checkbox-right" >
                    <input type="checkbox" id="vehicle1" name="vehicle1" class="search-checkbox" value="Bike" checked="checked">
                    <label for="vehicle1">レインズ</label>
                    <label for="">表示方法：</label>
                    <select name="" id="">
                      <option value="">仲介用表示</option>
                    </select><br/>
                  </div>
                </div>

                <div class="tbl-result overflow-x">
                  <div id="spinner" {{ $status == 0 ? 'hidden' : '' }}>
                    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                  </div>

                  @if($properties != null)
                    @foreach ($properties as $property)
                    <table class="property_results" {{ $status == 1 ? 'hidden' : '' }} style="margin">
                        <tbody>
                          <tr>
                            <td colspan="7" rowspan="5">
                              <input type="checkbox">
                              <div class="rating-wrapper">
                                <input type="radio" name="rating" id="star">
                                <label for="rating"></label>
                              </div>
                            </td>
                            <td  colspan="5" rowspan="5">
                            <span class="image-box">画像</span>
                            </td>
                            <td colspan="4" rowspan="5" style="width:100%;max-width:12%;">
                              <span class="rent-ttl">{{ $property['賃料'] }}</span>
                            <ul>
                              <div class="rent-pay" style="display: flex;justify-content: center;">
                                <div class="rent-right-pay" style="text-align: left;">
                                  <li class="mgn-t-2">
                                    <div class="pay-details">
                                      <div class="pay-money">
                                          <span class="spl-desc">管</span>
                                          <span class="spl-desc_2">{{ $property['管理費'] }}・{{ $property['共益費'] }}</span>
                                      </div>
                                    </div>

                                  </li>
                                  <li class="mgn-t-2">
                                    <div class="pay-details">
                                      <div class="pay-money">
                                        <span class="spl-desc">敷</span>
                                        <span class="spl-desc_2">{{ explode("/", $property['敷金／保証金'])[0] }}・{{ explode("/", $property['敷金／保証金'])[1] }}</span>
                                      </div>
                                    </div>

                                  </li>
                                  <li class="mgn-t-2">
                                    <div class="pay-details">
                                      <div class="pay-money">
                                        <span class="spl-desc">礼</span>
                                        <span class="spl-desc_2">{{ explode("/", $property['礼金／権利金'])[0] }}・{{ explode("/", $property['礼金／権利金'])[1] }}</span>
                                      </div>
                                    </div>

                                  </li>
                                </div>
                              </div>
                            </ul>

                            </td>
                            <td rowspan="1" colspan="8">{{ $property['建物名'] }}</td>
                            <td style="background-color: #ffe0e0;">更新日</td>
                            <td ><a style="color:#395722;text-decoration:underline;">レインズ</a></td>

                        </tr>
                        <tr>
                          <td colspan="5" style="width:100%;max-width:30%;">{{ $property['所在地'] }}</td>
                          <td colspan="4" rowspan="3">
                            <div style="display:flex; justify-content: space-around;">
                              <ul style="text-align:left;">
                                <li>{{ $property['使用部分面積'] }}</li>
                                {{--  Temporary / 建階  as 用途地域 --}}
                                <li>{{ $property['所在階'] }}／{{ $property['用途地域'] }}	</li>
                                <li>{{ $property['築年月'] }}</li>
                              </ul>
                              <ul style="text-align:left;">
                                <li>{{ $property['物件種目'] }}</li>
                                <li>{{ $property['間取'] }}</li>
                              </ul>
                            </div>
                          </td>
                          <td style="background-color: #ffe0e0;">広告掲載</td>
                        </tr>
                        <tr>
                          <td rowspan="2" colspan="5">
                              <p>{{ $property['沿線駅'] }}・{{  $property['交通'] }}</p>
                          </td>
                          <td>{{ $property['取引態様'] }}</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                          <td colspan="3" style="width:100%;max-width:20%;">{{ $property['商号'] }}</td>
                          <td colspan="3">{{ $property['電話番号'] }}</td>
                          <td colspan="3" style="background-color: #ffe0e0;">AD</td>
                          <td colspan="3"><a style="color:#395722;text-decoration:underline;" href="{{route ('storeAdmin.search.details')}}">詳細</a></td>
                        </tr>
                      </tbody>
                    </table>
                    @endforeach
                  @endif
                </div>

              </div>
            </div>
          </div>



            <br/>
            <br/>
            {{-- <div class="margin-right--5">
              <div class="c-input">
                <label class="c-lbl-white-01" for="">
                  <span class="c-icn--magnifying-glass"></span>
                </label>
              </div>
            </div>
            <div class="c-input c-input--full">
              <p class="clear-cond">条件をクリア</p>
            </div>
            <div class="c-input-01  display-inline--flex">
              <input type="email" name="email" placeholder="この検索に名前を付けて保存" class="input-01">
              <label class="c-lbl-white " for="">保存
                <span class=""></span>
              </label>
            </div> --}}

              <div class="c-heading">
                <div class="display-inline--flex">
                  <span> 自社ホームページやSUUMOへの出稿、または出稿するための編集</span>
                  <a href="#" class="btn-action-default">クリック</a>
                </div>
              </div>


            <div x-data="{ open: false }">
              <div class="c-details">
                <span>地図表示</span>

                <a  class="arrow" x-on:click="open = ! open">
                  <span class="material-icons">
                    keyboard_arrow_up
                  </span>
                </a>
              </div>


              <div x-show="open">
                  <div class="data-infoes">
                      <div class="img-list ">
                        <img src="{{asset('image/img/room1.png')}}" height="80" width="79">
                        <img src="{{asset('image/img/room2.png')}}" height="80" width="79">
                        <img src="{{asset('image/img/room3.png')}}" height="80" width="79">
                        <img src="{{asset('image/img/room4.png')}}" height="80" width="79">
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>広告転載区分</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>物件番号</p>
                          </div>
                          <div class="infoes">
                            <p>100115011127</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>登録・更新日</p>
                          </div>
                          <div class="infoes">
                            <p>2019/10/11</p>
                          </div>
                        </div>
                      </div>
                      <span>契約情報</span>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>賃料</p>
                          </div>
                          <div class="infoes">
                            <p>14.7万円</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>賃料</p>
                          </div>
                          <div class="infoes">
                            <p>14.7万円</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>礼金</p>
                          </div>
                          <div class="infoes">
                            <p>1ヶ月</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>敷金</p>
                          </div>
                          <div class="infoes">
                            <p>1ヶ月</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>鍵交換代等</p>
                          </div>
                          <div class="infoes">
                            <p>鍵交換代金あり　22,000円</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>管理費</p>
                          </div>
                          <div class="infoes">
                            <p>5,000円／月</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>共益費</p>
                          </div>
                          <div class="infoes">
                            <p>なし</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>保険</p>
                          </div>
                          <div class="infoes">
                            <p>加入要　/　2年間　20,000円,000円</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>契約期間</p>
                          </div>
                          <div class="infoes">
                            <p>2年</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>保証金</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>家賃保証</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>契約期間</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>保証金</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>家賃保証</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>契約期間</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                      </div>
                      <span>物件情報</span>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>建物名</p>
                          </div>
                          <div class="infoes">
                            <p>グラスヒルズ高輪ウエスト</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>物件種目</p>
                          </div>
                          <div class="infoes">
                            <p>グラスヒルズ高輪ウエスト</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>建物名</p>
                          </div>
                          <div class="infoes">
                            <p>マンション</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>間取</p>
                          </div>
                          <div class="infoes">
                            <p>1LDK</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>間取り内訳</p>
                          </div>
                          <div class="infoes">
                            <p>洋 3.9　LDK 8.3</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>築年月</p>
                          </div>
                          <div class="infoes">
                            <p>1988年09月</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>新築フラグ</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>所在階／建階</p>
                          </div>
                          <div class="infoes">
                            <p>1階/3階建</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>専有面積</p>
                          </div>
                          <div class="infoes">
                            <p>31.60㎡</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>住所</p>
                          </div>
                          <div class="infoes">
                            <p>東京都品川区荏原５丁目11-21</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>利用駅2</p>
                          </div>
                          <div class="infoes">
                            <p>東急目黒線 武蔵小山 徒歩12分</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>利用駅3</p>
                          </div>
                          <div class="infoes">
                            <p>東急池上線 荏原中延 徒歩14分</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>利用駅4</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>利用駅5</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>リフォーム</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>リノベーション</p>
                          </div>
                          <div class="infoes">
                            <p>2016年03月　内容：２０１６年３月内容リノベーション済。</p>
                          </div>
                        </div>
                      </div>
                      <span>取引情報</span>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>現況</p>
                          </div>
                          <div class="infoes">
                            <p>居住中　2019年11月09日退去予定</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>入居</p>
                          </div>
                          <div class="infoes">
                            <p>予定　2019年11月下旬</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>登録・更新日</p>
                          </div>
                          <div class="infoes">
                            <p>2019/10/11</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>広告転載区分</p>
                          </div>
                          <div class="infoes">
                            <p>可能（ただし要連絡）</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>取引態様</p>
                          </div>
                          <div class="infoes">
                            <p>貸主</p>
                          </div>
                        </div>

                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>報酬</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>報酬形態</p>
                          </div>
                          <div class="infoes">
                            <p>当方不払</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>負担割合借主</p>
                          </div>
                          <div class="infoes">
                            <p>100%</p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>配分割合客付</p>
                          </div>
                          <div class="infoes">
                            <p>100%</p>
                          </div>
                        </div>

                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>鍵情報</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>内見情報</p>
                          </div>
                          <div class="infoes">
                            <p></p>
                          </div>
                        </div>

                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>鍵情報</p>
                          </div>
                          <div class="infoes">
                            <p>ガーデニング可。入居定員2名。礼金0プランあり：礼金0プランは賃料12.7蔓延、敷金1か月</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>その他</p>
                          </div>
                          <div class="infoes">
                            <p>その他.7蔓延、敷金1か月</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-infoes">
                        <div class="margin-left-auto1">
                          <div class="label">
                            <p>登録会社</p>
                          </div>
                          <div class="infoes">
                            <p>三井不動産レジデンシャルリース（株）　賃貸運営本部　運営一部営業課</p>
                            <p>代表：0570-783-434</p>
                            <p>担当：賃貸運営本部　運営一部</p>
                            <p>担当電話：0570783434</p>
                          </div>
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
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
@endsection
