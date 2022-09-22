@extends('store.layouts.layout-store-home')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
@slot('body')
@php($current_route = (string)str_replace('.', ' ', Request::path()))
@php ($accId = $userAcc)
<div class="c-contianer-box_2 width-full">
  <div class="box-data">
    <div class=" input--calendar mgn-5">
      <label class="cont-alert" for="">
        <p>ここに、必要な時にシステム的なレコメンドやアラートが表示。なければ本エリアは無くなり、全体が上にあがる。</p>
        <span class="c-x-mark"></span>
      </label>
    </div>
    <div class="container-table ">
      <div id="London" class="tabcontent" style="display: block;">
        <div class="box-display-01 width-full" x-data="">
          <div class="c-container-sidebar" >
            <div class="form">
              <div class="p-sidebar-heading">
                <span> この検索に名前を付けて保存</span>
                <a href="#" class="p-sidebar-btn bg-white saveSearch" href="">保存</a>
              </div>
              <div class="p-sidebar-info">
                <span>Step1 の検索条件（再検索用）</span>
              </div>
              <div class="p-sidebar-heading">
                <span> 検索サイト</span>
                <a class="p-sidebar-btn bg-white" href="">変更</a>
              </div>
              <div class="p-sidebar-info">
                @foreach($site_enabled as $site_id => $site)
                  <span class="site_id" style="display:none"> {{$site_id}} </span>
                  @if($site_id == 0)
                  <span> レインズ </span>
                  @elseif($site_id == 1)
                  <span> at BB </span>
                  @elseif($site_id == 2)
                  <span> イタンジ </span>
                  @elseif($site_id == 3)
                  <span> 東急住宅リース </span>
                  @elseif($site_id == 4)
                  <span> 三井不動産レジデンシャルリース </span>
                  @elseif($site_id == 5)
                  <span> 住友不動産</span>
                  @endif
                  <span>
                    @if( $totalsites > 1)
                    <span {{ $totalsites -= 1 }}> ,</span>
                    @endif
                  </span>
                @endforeach
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
              <input type="text" class="wd--93 padding-5" name="property_name">
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading padding-5">
                <span>賃料</span>
              </div>
              <div class="slct-box-cont">
                <div class="display-inline--flex width-full">
                  <input type="text" class="wd--75 padding-5" name="fee_min">
                  <span class="p-sidebar-info-01">万円～</span>
                </div>
                <div class="display-inline--flex margin width-full">
                  <input type="text" class="wd--75 margin-left--28 padding-5" name="fee_max">
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
                  <label class="c-lbl-green" for="" name="town" value="1">1R</label>
                  <label class="" for=""></label>
                  <label class="" for=""></label>
                </div>
                <div class="display-inline--flex">
                  <label class="c-lbl-green tip" for="">1K..
                    {{--  <span>This is the CSS tooltip showing up when you mouse over the link</span>  --}}
                  </label>
                  <label class="c-lbl-white" data-title="1LDK" for="">1DK..</label>
                  <label class="c-lbl-green" for="">1LDK..</label>
                </div>
                <div class="display-inline--flex ">
                  <label class="c-lbl-white" for="">2K..</label>
                  <label class="c-lbl-green" data-title="3DK/LK/SDK/SLK" for="">2DK..</label>
                  <label class="c-lbl-white" data-title="3DK/LK/SDK/SLK" for="">1DK..</label>
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
                  <input type="text" class="wd--75 padding-5" name="area_min">
                  <span class="p-sidebar-info-01">㎡～</span>
                </div>
                <div class="display-inline--flex margin width-full">
                  <input type="text" class="wd--75 margin-left--28 padding-5" name="area_max">
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
                <span>築年数</span>
              </div>
              <div class="slct-box-cont">
                <div class="display-inline--flex width-full">
                  <input type="text" class="wd--75 padding-5" name="start_build">
                  <span class="p-sidebar-info-01">年 〜</span>
                </div>
                <div class="display-inline--flex margin width-full">
                  <input type="text" class="wd--75 margin-left--28 padding-5" name="end_build">
                  <span class="p-sidebar-info-01">年 </span>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="p-sidebar-heading padding-5">
                <span>フリーワード</span>
              </div>
              <input type="text" class="wd--93 padding-5" name="keyword">
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
              <div class="stepper stepper_aborder_adjust">
                <div class="step-header step_header_adjust">
                  <div class="my-steps" x-data="">
                    <template x-for="step in $store.steps.items">
                      <span
                        class="mgn-l-3"
                        :class="{ 'active': step.label == $store.steps.current, '' : step.label != $store.steps.current}"
                        @click="$store.steps.current = step.label" x-text="step.label + '  >'">
                      </span>
                    </template>
                  </div>
                  <div class="step-desc" x-data="">
                    <div class="" x-show="$store.steps.current == 'step1'">
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
            </div>

            <div class="step-result" >
              <div class="select_property">
                <div class="explain">
                  <span  >  絞込み検索を行う場合は、先に対象物件のチェックボックスをONにして、検索してください。</span>

                </div>
                <div class="exl-select">
                  <label for=""  class="mgn-r-2">表示方法：</label>
                  <select name="" id="" class="wdt-1">
                    <option value="">仲介用表示</option>
                  </select>
                </div>

              </div>

              <div class="tbl-result tbl-result_search" >
                <div class="stepper stepper_aborder_adjust2">
                  <div class="step-header step_aborder_adjust">
                    <div class="step-desc" >
                      <div class="" >
                        物件情報の見方
                      </div>
                    </div>
                    <i class="fa-solid path_138"></i>
                  </div>
                  <div class="step-body_2 step_body_2_adjust">
                    <div class="tbl-result overflow-x" >
                      <table>
                        <tbody>
                          <tr>
                            <td class="td_width_adjust" colspan="7" rowspan="5" style="width:100%;max-width:10%;">
                              <input type="checkbox">
                              <div class="rating-wrapper">
                                <input type="radio" name="rating" id="star">
                                <label for="rating"></label>
                              </div>
                            </td>
                            <td colspan="5" rowspan="5" style="width:100%;max-width:10%;">
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
                            <td>元サイトへ</td>
                            <td>元サイトへ</td>

                          </tr>
                          <tr>
                            <td colspan="5">所在地</td>
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

              <div class="select_property" >
                <div class="explain display-inline--flex">
                  <div class="disc">
                    <label for="">検索結果</label>
                    <span>{{ $properties->total() }}</span>
                    <label for="">件 （レインズ</label>
                    <span>{{ $properties->whereNull('image_number')->whereNull('内見開始日')->whereNull('手数料')->whereNull('案内可能日')->whereNull('構造 規模')->count() }}</span>
                    <label>    件 / atBB <span>{{ $properties->whereNotNull('image_number')->count() }}</span></label>
                    <label>    件 / イタンジ <span>{{ $properties->whereNotNull('内見開始日')->count() }}</span></label>
                    <label>    件 / 東急住宅リース <span>{{ $properties->whereNotNull('手数料')->count() }}</span></label>
                    <label>    件 / 三井不動産レジデンシャルリース <span>{{ $properties->whereNotNull('案内可能日')->count() }}</span></label>
                    <label>    件 / 住友不動産 <span>{{ $properties->whereNotNull('構造 規模')->count() }}</span>件）</label>
                  </div>
                </div>
                  <div class="exl-select">
                    <select name="" id="" class="wdt-1">
                      <option value="">反応速い順</option>
                    </select>
                </div>

              </div>


              <div class="select_property" >
                <div class="checkbox-right" >
                  <input type="checkbox" id="vehicle1" name="vehicle1" class="search-checkbox" value="Bike" checked="checked">
                  <label for="vehicle1">レインズ</label>
                  <label for="">表示方法：</label>
                  <select name="" id="" class="wdt-2 mgn-l-4">
                    <option value="">仲介用表示</option>
                  </select><br/>
                </div>
              </div>

                <div class="tbl-result tbl-result_search overflow-x">
                  <div id="spinner" {{ $status == 0 ? 'hidden' : '' }}>
                    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                  </div>

                  @if($properties != null)
                    @foreach ($properties as $key => $property)

                    <table class="property_results" {{ $status == 1 ? 'hidden' : '' }} style="margin">
                        <tbody>
                          <tr>
                            <td colspan="7" rowspan="5" style="width:100%;max-width:10%;">
                              <input type="checkbox">
                              <div class="rating-wrapper">
                                <input type="radio" name="rating" id="star">
                                <label for="rating"></label>
                              </div>
                            </td>
                            <td  colspan="5" rowspan="5" style="width:100%;max-width:10%;">
                              @if(array_key_exists('image_number', $property))
                                <img src="{{ $property['image_src'] }}" alt="">
                              @else
                                <span class="image-box">画像</span>
                              @endif
                            </td>
                            <td colspan="4" rowspan="5" style="width:100%;max-width:12%;">
                              @if(array_key_exists('image_number', $property))
                              <div class="c-image_atbb">
                                <img src="{{ $property['賃料'] }}" alt="rent_atbb">
                                <span>万円</span>
                              </div>
                              @else
                                <span class="rent-ttl">{{ $property['賃料'] }}</span>
                              @endif
                            <ul>
                              <div class="rent-pay" style="display: flex;justify-content: center;">
                                <div class="rent-right-pay" style="text-align: left;">
                                  <li class="mgn-t-2">
                                    <div class="pay-details">
                                      <div class="pay-money">
                                          <span class="spl-desc">管</span>
                                          <span class="spl-desc_2">{{ array_key_exists('管理費', $property) ? $property['管理費'] : '-' }}・{{ $property['共益費'] }}</span>
                                      </div>
                                    </div>

                                  </li>
                                  <li class="mgn-t-2">
                                    <div class="pay-details">
                                      <div class="pay-money">
                                        <span class="spl-desc">敷</span>
                                        @if(array_key_exists('敷金／保証金', $property))
                                          <span class="spl-desc_2">{{ explode("/", $property['敷金／保証金'])[0] }}・{{ explode("/", $property['敷金／保証金'])[1] }}</span>
                                        @else
                                          <span class="spl-desc_2">{{ $property['敷金'] }}・-</span>
                                        @endif
                                      </div>
                                    </div>

                                  </li>
                                  <li class="mgn-t-2">
                                    <div class="pay-details">
                                      <div class="pay-money">
                                        <span class="spl-desc">礼</span>
                                        @if(array_key_exists('礼金／権利金', $property))
                                          <span class="spl-desc_2">{{ explode("/", $property['礼金／権利金'])[0] }}・{{ explode("/", $property['礼金／権利金'])[1] }}</span>
                                        @else
                                          <span class="spl-desc_2">{{ $property['礼金'] }}・-</span>
                                        @endif
                                      </div>
                                    </div>

                                  </li>
                                </div>
                              </div>
                            </ul>

                            </td>
                            <td rowspan="1" colspan="8">{{ $property['建物名'] }}</td>
                            <td style="background-color: #ffe0e0;">更新日</td>
                            <td ><a style="color:#395722;text-decoration:underline;font-size:12px;">
                              @if(array_key_exists('image_number', $property))
                                atBB
                              @elseif(array_key_exists('内見開始日', $property))
                                イタンジ
                              @elseif(array_key_exists('手数料', $property))
                                急住宅リース
                              @elseif(array_key_exists('案内可能日', $property))
                                三井不動産レジデンシャルリース
                              @elseif(array_key_exists('構造 規模', $property))
                                住友不動産
                              @else
                                レインズ
                              @endif
                            </a></td>
                        </tr>
                        <tr>
                          <td colspan="5" style="width:100%;max-width:30%;">{{ $property['所在地'] }}</td>
                          <td colspan="4" rowspan="3">
                            <div style="display:flex; justify-content: space-around;">
                              <ul style="text-align:left;">
                                <li>{{ $property['使用部分面積'] }}</li>
                                {{--  Temporary / 建階  as 用途地域 --}}
                                {{--  Tokyu Update  --}}
                                @if(!array_key_exists('手数料', $property))
                                  <li>{{ array_key_exists('所在階', $property) ? $property['所在階'] : '-' }}／{{ array_key_exists('用途地域', $property) ? $property['用途地域'] : '-' }}	</li>
                                @else
                                  <li>{{ $property['所在階'] }}	</li>
                                @endif
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
                              <p>
                                @if(!array_key_exists('交通', $property))
                                  @if(count(explode('バス停', $property['沿線駅'])) > 1)
                                    {{ explode('バス停', $property['沿線駅'])[0] }}・バス停 {{ explode('バス停', $property['沿線駅'])[1] }}
                                  @else
                                    {{ $property['沿線駅'] }}・ -
                                  @endif
                                @elseif(array_key_exists('交通', $property))
                                  {{ $property['沿線駅'] }}・{{ $property['交通'] }}
                                @endif
                              </p>
                          </td>
                          <td>{{ array_key_exists('取引態様', $property) ? $property['取引態様'] : '-' }}</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                          <td colspan="3" style="width:100%;max-width:20%;">{{ $property['商号'] }}</td>
                          <td colspan="3">{{ $property['電話番号'] }}</td>
                          <td colspan="3" style="background-color: #ffe0e0;">{{ array_key_exists('ad', $property) ? $property['ad'] : 'AD' }}</td>
                          <td colspan="3"><a style="color:#395722;text-decoration:underline;" href="{{url('store/search/details/'. $key)}}">詳細</a></td>
                          {{-- <td colspan="3"><a style="color:#395722;text-decoration:underline;" href="{{route ('storeAdmin.search.details')}}">詳細</a></td> --}}
                        </tr>
                      </tbody>
                    </table>
                    @endforeach
                  @endif

                  <div class="mgn-b-10">
                    {{ $properties->links() }}

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
<div class="sticky-footer">
  @if ($current_route == 'store/search/mocklist' || $current_route == 'store/search/list')
    <div class="btn-step-2 mgn-t-5">
      {{-- <a href="#" class="c-lbl-white-01">保存</a> --}}
      <span class="step2">Step2 選択した物件について</span>
      <a href="#" class="c-lbl-white-2 margin--5" data-remodal-target="result_search">足りない情報のみを収集</a>
      <a href="#" class="c-lbl-green3 margin--5" data-remodal-target="result_search">こだわり検索を追加</a>
    </div>
    @else
      <div class="search-bottom">
        <div class="search-margin-bottom">
          <div class="sb-btm">
            <form class="search-btm" method="POST" action="">
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

      </div>
  @endif

</div>
{{-- Create Event Modal --}}
<section class="remodal p-remodal--form" data-remodal-id="result_search">
  <div class="p-modal">
    <div class="p-modal--title">
      <div class="p-index__head__title">
        {{-- Temporary Icon to be replaced --}}
        {{-- <div class="c-image c-image--user"></div> --}}
        検索結果一覧 こだわり検索
      </div>
    </div>
    <div class="container_body">
      <div class="container_search">
        <div class="container_search_adjust">
          <ul class="container_ul">
            <li class="container_text">こだわり検索をやめる</li>
            <li class="fa fa-angle-down" aria-hidden="true"></li>
          </ul>
        </div>
    </div>
    <div class="search_line"></div>
      <div class="container_distribution">
        <div class="container_distribution_container">
            検索する流通サイト（選択したサイト全てで検索できない項目については、項目に取消線が表示されます。）
        </div>
      </div>
      <div class="container_rain">
        <div class="container_rain_adjust">
          <ul class="container_rain_ul">
            <label class="c-lbl-green2 margin--5" for="">レインズ</label>
            <label class="c-lbl-green2 margin--5" for="">atBB</label>
            <label class="c-lbl-white margin--5" for="">いえらぶ</label>
            <label class="c-lbl-white margin--5" for="">イタンジ</label>
            {{-- <li class="container_button1"><p>レインズ</p></li> --}}
            {{-- <li class="container_button2"><p>atBB</p></li>
            <li class="container_button3"><p>いえらぶ</p></li>
            <li class="container_button4"><p>イタンジ</p></li> --}}
          </ul>
        </div>
      </div>
      <div class="first_dotted_lines"></div>

      <div class="container_lifeline">
        <div class="container_lifeline_adjust">
            <form class="container_lifeline_ul">
              <h1 class="container_lifeline_text1"><p>イタンジ</p></h1>
              <div class="container_lifeline_center">
                <input type="checkbox" id="city_gas" name="city_gas" value="gas">
                <label for="city_gas" class="label-checkbox"> 都市ガス</label><br>
                <input type="checkbox" id="propane_gas" name="propane_gas" value="propane">
                <label for="propane_gas" class="label-checkbox"> プロパンガス</label><br>
              </div>
            </form>
        </div>
      </div>
      <div class="second_dotted_lines"></div>

      <div class="container_kitchen">
        <div class="container_kitchen_adjust">
          <ul class="container_kitchen_ul">
            キッチン
            <div class="container_kitchen_center">
                <input type="checkbox" id="gas_stove" name="gas_stove" value="stove">
                <label for="gas_stove" class="label-checkbox">ガスコンロ設置化</label><br>
                <input type="checkbox" id="more_stove"="more_stove" value="morestove">
                <label for="more_stove" class="label-checkbox">コンロ2口以上</label><br>
                <input type="checkbox" id="system_kitchen" name="system_kitchen" value="systemkitchen">
                <label for="system_kitchen" class="label-checkbox">システムキッチン</label><br>
                <div class="tooltip-icon">
                  <i class='fas fa-exclamation-circle' style='font-size:26px;color:#ff6161'></i>
                  <div class="tooltip-design">
                    <span class="tooltiptext"><span class="tooltip-message">次のサイトは検索できません。<br/>
                      レインズ / atBB</span></span>
                  </div>

                </div>


              </div>
          </ul>
        </div>
        <div class="container_kitchen_line2">
          <ul class="container_kitchen_line2_ul">
            <div class="container_kitchen_line2_center">
              <input type="checkbox" id="island_stove" name="island_stove" value="island">
              <label for="island_stove" class="label-checkbox">アイランドキッチン</label><br>
              <input type="checkbox" id="cooking_heater" name="cooking_heater" value="heater">
              <label for="cooking_heater" class="label-checkbox">IHクッキングヒーター</label><br>
              <input type="checkbox" id="dishwater" name="dishwater" value="dishwater">
              <label for="dishwater" class="label-checkbox">食器乾燥機</label><br>
              <input type="checkbox" id="dryer" name="dryer" value="dryer">
              <label for="dryer" class="label-checkbox">食器洗浄乾燥機</label><br>
              <input type="checkbox" id="disposer" name="disposer" value="disposer">
              <label for="disposer" class="label-checkbox">ディスポーザー</label><br>
            </div>
          </ul>
        </div>
        <div class="container_kitchen_line3">
          <div class="container_kitchen_line3_ul">
            <div class="container_kitchen_line3_center">
              <input type="checkbox" id="refrigerator" name="refrigerator" value="refrigerator">
              <label for="refrigerator" class="label-checkbox">冷蔵庫</label><br>
              <i class='fas fa-exclamation-circle' style='font-size:26px;color:#ff6161'></i>
              <input type="checkbox" id="water_purifier" name="water_purifier" value="waterpurifier">
              <label for="water_purifier" class="label-checkbox">浄水器</label><br>
            </div>
          </div>
        </div>
      </div>
      <div class="third_dotted_lines"></div>

        <div class="container_bath_toilet">
          <div class="container_bath_toilet_adjust">
            <ul class="container_bath_toilet_ul">
              バス・トイレ
              <div class="container_bath_toilet_center">
                <input type="checkbox" id="private_toilet" name="private_toilet" value="privatetoilet">
                <label for="private_toilet" class="label-checkbox">専用トイレ</label><br>
                <input type="checkbox" id="warm_water" name="warm_water" value="warmwater">
                <label for="warm_water" class="label-checkbox">温水洗浄便座</label><br>
                <input type="checkbox" id="private_bus" name="private_bus" value="privatebus">
                <label for="private_bus" class="label-checkbox">専用バス</label><br>
                <input type="checkbox" id="reheating" name="reheating" value="reheating">
                <label for="reheating" class="label-checkbox">追焚機能</label><br>
                <input type="checkbox" id="separate" name="separate" value="separate">
                <label for="separate" class="label-checkbox">バス・トイレ別</label><br>
                <input type="checkbox" id="independence" name="independence" value="independence">
                <label for="independence" class="label-checkbox">洗面所独立</label><br>
              </div>

            </ul>
          </div>
          <div class="container_bath_toilet_adjust2">
            <ul class="container_bath_toilet_ul2">
              <div class="container_bath_toilet_adjust2_center">
                <input type="checkbox" id="bathroom_shower" name="bathroom_shower" value="bathroomshower">
                <label for="bathroom_shower" class="label-checkbox">シャワー付き洗面化粧台</label><br>
                <input type="checkbox" id="washing_machine" name="washing_machine" value="washingmachine">
                <label for="washing_machine" class="label-checkbox">洗濯機置場</label><br>
                <input type="checkbox" id="indoor_washing" name="indoor_washing" value="indoorwashing">
                <label for="indoor_washing" class="label-checkbox">室内洗濯機置場</label><br>
                <input type="checkbox" id="bathroom_dryer" name="bathroom_dryer" value="bathroomdryer">
                <label for="bathroom_dryer" class="label-checkbox">浴室乾燥機</label><br>
              </div>

            </ul>
          </div>
        </div>

        <div class="fourth_dotted_line"></div>

        <div class="container_airconditioner">
          <div class="container_airconditioner_adjust">
            <ul class="container_airconditioner_ul">
                冷暖房
                <div class="container_airconditioner_center">
                  <input type="checkbox" id="air_conditioner" name="air_conditioner" value="airconditioner">
                  <label for="air_conditioner" class="label-checkbox">エアコン</label><br>
                  <input type="checkbox" id="floor_heating" name="floor_heating" value="bathroomdryer">
                  <label for="floor_heating" class="label-checkbox">床暖房</label><br>
                  <input type="checkbox" id="conservatory" name="conservatory" value="bathroomdryer">
                  <label for="conservatory" class="label-checkbox">FF暖房</label><br>
                </div>

            </ul>
          </div>
        </div>

        <div class="fifth_dotted_lines"></div>

        <div class="container_security">
          <div class="container_security_adjust">
            <ul class="container_security_ul">
                セキュリティ
                <div class="container_security_center">
                  <input type="checkbox" id="dimple_key" name="dimple_key" value="dimplekey">
                  <label for="dimple_key">ディンプルキー</label><br>
                  <input type="checkbox" id="auto_lock" name="auto_lock" value="autolock">
                  <label for="auto_lock">オートロック</label><br>
                  <input type="checkbox" id="intercom" name="intercom" value="intercom">
                  <label for="intercom">モニター付きインターホン</label><br>
                  <input type="checkbox" id="security" name="security" value="security">
                  <label for="security">24時間セキュリティ</label><br>
                </div>

            </ul>
          </div>
        </div>

        <div class="sixth_dotted_lines"></div>

        <div class="container_storage">
          <div class="container_storage_adjust">
            <ul class="container_storage_ul">
              収納
              <div class="container_storage_center">
                <input type="checkbox" id="storage_space" name="storage_space" value="storagespace">
                <label for="storage_space" class="label-checkbox">収納スペース</label><br>
                <input type="checkbox" id="walkin_closet" name="walkin_closet" value="walkincloset">
                <label for="walkin_closet" class="label-checkbox">ウォークインクローゼット</label><br>
                <input type="checkbox" id="shoes_closet" name="shoes_closet" value="shoescloset">
                <label for="shoes_closet" class="label-checkbox">シューズインクローゼット</label><br>
              </div>

            </ul>
          </div>
        </div>

        <div class="seventh_dotted_lines"></div>

        <div class="container_comfortable">
          <div class="container_comfortable_adjust">
            <ul class="container_comfortable_ul">
              快適環境
              <div class="container_comfortable_center">
                <input type="checkbox" id="bs" name="bs" value="bs">
                <label for="bs" class="label-checkbox">BS/CS/CATV</label><br>
                <input type="checkbox" id="free_internet" name="free_internet" value="freeinternet">
                <label for="free_internet" class="label-checkbox">インターネット無料</label><br>
                <input type="checkbox" id="internet_compatible" name="internet_compatible" value="internetcompatible">
                <label for="internet_compatible" class="label-checkbox">インターネット対応</label><br>
                <input type="checkbox" id="high_speed" name="high_speed" value="highspeed">
                <label for="high_speed" class="label-checkbox">高速インターネット</label><br>
                <input type="checkbox" id="loft" name="loft" value="loft">
                <label for="loft" class="label-checkbox">ロフト</label><br>
              </div>

            </ul>
          </div>

          <div class="container_comfortable_adjust2">
            <ul class="container_comfortable_ul2">
              <div class="container_comfortable_adjust2_center">
                <input type="checkbox" id="flooring" name="flooring" value="flooring">
                <label for="flooring" class="label-checkbox">フローリング</label><br>
                <input type="checkbox" id="double_glazing" name="double_glazing" value="doubleglazing">
                <label for="double_glazing" class="label-checkbox">複層ガラス</label><br>
                <input type="checkbox" id="balcony" name="balcony" value="balcony">
                <label for="balcony" class="label-checkbox">バルコニー</label><br>
                <input type="checkbox" id="garden" name="garden" value="garden">
                <label for="garden" class="label-checkbox">庭</label><br>
                <input type="checkbox" id="barrier_free" name="barrier_free" value="barrierfree">
                <label for="barrier_free" class="label-checkbox">バリアフリー</label><br>
                <input type="checkbox" id="electric" name="electric" value="electric">
                <label for="electric" class="label-checkbox">オール電化</label><br>
              </div>

            </ul>
          </div>

          <div class="container_comfortable_adjust3">
              <ul class="container_comfortable_ul3">
                <div class="container_comfortable_adjust3_center">
                  <input type="checkbox" id="garbage_disposal" name="garbage_disposal" value="garbagedisposal">
                  <label for="garbage_disposal" class="label-checkbox">24時間ゴミ出し化</label><br>
                </div>

              </ul>
          </div>
        </div>

        <div class="eigth_dotted_lines"></div>

        <div class="container_building_equip">
          <div class="container_building_equip_adjust">
            <ul class="container_building_equip_ul">
              建物設備
              <div class="container_building_equip_center">
                <input type="checkbox" id="parking" name="parking" value="parking">
                <label for="parking" class="label-checkbox">駐車場</label><br>
                <input type="checkbox" id="parking_slot" name="parking_slot" value="parkingslot">
                <label for="parking_slot" class="label-checkbox">駐車場2台分</label><br>
                <input type="checkbox" id="bicycle_park" name="bicycle_park" value="bicyclepark">
                <label for="bicycle_park" class="label-checkbox">駐輪場</label><br>
                <input type="checkbox" id="bike_yard" name="bike_yard" value="bikeyard">
                <label for="bike_yard" class="label-checkbox">バイク置場</label><br>
                <input type="checkbox" id="trunk_room" name="trunk_room" value="trunkroom">
                <label for="trunk_room" class="label-checkbox">トランクルーム</label><br>
                <input type="checkbox" id="elevator" name="elevator" value="elevator">
                <label for="elevator" class="label-checkbox">エレベーター</label><br>
              </div>

            </ul>
          </div>

          <div class="container_building_equip_adjust2">
            <ul class="container_building_equip_ul2">
              <div class="container_building_equip_adjust2_center">
                <input type="checkbox" id="delivery_box" name="delivery_box" value="deliverybox">
                <label for="delivery_box" class="label-checkbox">宅配ボックス</label><br>
                <input type="checkbox" id="designers" name="designers" value="designers">
                <label for="designers" class="label-checkbox">デザイナーズ</label><br>
                <input type="checkbox" id="reform_history" name="reform_history" value="reformhistory">
                <label for="reform_history" class="label-checkbox">リフォーム履歴あり</label><br>
                <input type="checkbox" id="renovation_history" name="renovation_history" value="renovationhistory">
                <label for="renovation_history" class="label-checkbox">リノベーション履歴あり</label><br>
              </div>

            </ul>
          </div>

          <div class="container_building_equip_adjust3">
            <ul class="container_building_equip_ul3">
              <div class="container_building_equip_adjust3_center">
                <input type="checkbox" id="seismic_isolation" name="seismic_isolation" value="seismicisolation">
                <label for="seismic_isolation" class="label-checkbox">免震・制震・制震構造</label><br>
              </div>

            </ul>
          </div>
        </div>

        <div class="nineth_dotted_lines"></div>

        <div class="container_others">
          <div class="container_others_adjust">
            <ul class="container_others_ul">
              その他
              <div class="container_others_center">
                <input type="checkbox" id="administrator" name="administrator" value="administrator">
                <label for="administrator" class="label-checkbox">分譲タイプ</label><br>
                <input type="checkbox" id="maisonette" name="maisonette" value="maisonette">
                <label for="maisonette" class="label-checkbox">メゾネット</label><br>
                <input type="checkbox" id="free_rent" name="free_rent" value="freerent">
                <label for="free_rent" class="label-checkbox">フリーレント</label><br>
                <input type="checkbox" id="credit_card" name="credit_card" value="creditcard">
                <label for="credit_card" class="label-checkbox">クレジットカード決済可</label><br>
                <input type="checkbox" id="executive" name="executive" value="executive">
                <label for="executive" class="label-checkbox">管理人</label><br>
              </div>

            </ul>
          </div>
        </div>

        <div class="tenth_dotted_lines"></div>

        <div class="container_condition">
          <div class="container_condition_adjust">
            <ul class="container_condition_ul">
              条件
              <div class="container_condition_center">
                <input type="checkbox" id="immediate" name="immediate" value="immediate">
                <label for="immediate" class="label-checkbox">即入居</label><br>
                <input type="checkbox" id="pets_allowed" name="pets_allowed" value="petsallowed">
                <label for="pets_allowed" class="label-checkbox">ペット可・相談</label><br>
                <input type="checkbox" id="musical_instrument" name="musical_instrument" value="musicalinstrument">
                <label for="musical_instrument" class="label-checkbox">楽器可・相談</label><br>
                <input type="checkbox" id="women_only" name="women_only" value="womenonly">
                <label for="women_only" class="label-checkbox">女性限定</label><br>
                <input type="checkbox" id="men_only" name="men_only" value="menonly">
                <label for="men_only" class="label-checkbox">男性限定</label><br>
                <input type="checkbox" id="students_only" name="students_only" value="students">
                <label for="students_only" class="label-checkbox">学生限定</label><br>
              </div>

            </ul>
          </div>

          <div class="container_condition_adjust2">
            <ul class="container_condition_ul2">
              <div class="container_condition_adjust2_center">
                <input type="checkbox" id="two_people" name="two_people" value="twopeople">
                <label for="two_people" class="label-checkbox">二人入居可</label><br>
                <input type="checkbox" id="consultation" name="consultation" value="consultation">
                <label for="consultation" class="label-checkbox">高齢者可・相談</label><br>
                <input type="checkbox" id="foreign" name="foreign" value="foreign">
                <label for="foreign" class="label-checkbox">外国籍可・相談</label><br>
                <input type="checkbox" id="corporate_contracts" name="corporate_contracts" value="corporatecontracts">
                <label for="corporate_contracts" class="label-checkbox">法人契約限定</label><br>
                <input type="checkbox" id="contract_request" name="contract_request" value="contractrequest">
                <label for="contract_request" class="label-checkbox">法人契約希望</label><br>
              </div>

            </ul>
          </div>

          <div class="container_condition_adjust3">
            <ul class="container_condition_ul3">
              <div class="container_condition_ul3_center">
                <input type="checkbox" id="office_usage" name="office_usage" value="officeusage">
                <label for="office_usage" class="label-checkbox">事務所使用可</label><br>
              </div>

            </ul>
          </div>
        </div>

        <div class="eleveth_dotted_lines"></div>

        <div class="container_advertising">
          <div class="container_advertising_adjust">
            <ul class="container_advertising_ul">
              広告・AD
              <div class="container_advertising_center">
                <input type="checkbox" id="announcement" name="announcement" value="announcement">
                  <label for="announcement" class="label-checkbox">広告可（要確認含）</label><br>
                  <div class="alltext_adjust_center">
                    <label class="alltext_adjust" for="all_text"><p class="alltext_adjust">AD</p></label><br>
                    <input type="text" id="all_text" name="text">
                    <label for="all_text"><p class="alltext_adjust">広告可（要確認含）</p></label><br>
                  </div>
              </div>
            </ul>
          </div>
        </div>

        <div class="container_execute">
          <div class="container_execute_adjust">
              <span class="center_pp">選択した物件について、こだわり検索の実行</span>
              <div class="tooltip-icon2">
                <i class='fas fa-exclamation-circle' style='font-size:26px;color:#ff6161'></i>
                <div class="tooltip-design2">
                  <span class="tooltiptext2">
                    <span class="tooltip-message2">
                      この項目は、「レインズ」で検索できないため、この項目選択を<br/>
                      外すか、検索する流通サイトからレインズを外してください。
                    </span>
                  </span>
                </div>

              </div>
          </div>
        </div>
  </div>
</section>
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

  $('.saveSearch').on('click', function(){
    let sites = [];
    let site_ids

    let area_min = $('input[name=area_min]').val()
    let area_max = $('input[name=area_max]').val()

    let property_name = $('input[name=property_name]').val()
    let fee_min = $('input[name=fee_min]').val()
    let fee_max = $('input[name=fee_max]').val()
    let town = $('input[name=town]').val()
    let keyWord = $('input[name=keyword]').val()


    let start_build = $('input[name=start_build]').val()
    let end_build = $('input[name=end_build]').val()

    $('.site_id').each(function(){
      site_ids = $(this).text().split(',')
      sites = sites.concat(site_ids)
    })

    $.ajax({
      datatype: 'json',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ route('storeAdmin.search.saveSearch') }}",
      data: {
        'target_site': sites.toString(),
        'account_id': {{ $accId }},
        'railway_name': null,
        'station': '',
        'city': '1',
        'town': '1',
        'name': property_name,
        'fee_min': fee_min,
        'fee_max': fee_max,
        'area_min': area_min,
        'area_max': area_max,
        'keyword': keyWord,
        'year_build_start': start_build,
        'year_build_end': end_build,
      },success: function(){
        alert('saved successfully')
      },error: function(data){
        alert(data.responseText)
      }
    })

  })
  </script>
@endsection
