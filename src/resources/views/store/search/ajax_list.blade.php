
@extends('store.layouts.layout-store-home')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index-store')
@slot('body')
@php($current_route = (string)str_replace('.', ' ', Request::path()))
@php ($accId = $userAcc)
@php($array = config('const'))
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
          <form action="{{ route('storeAdmin.search.list') }}" method="POST" id="robore_search_property">
            @csrf
            <div class="box-display-01 width-full" x-data="">
              <div class="c-container-sidebar " style="margin-bottom: 100px;">
                <div class="form wd--254">
                  {{-- <div class="p-sidebar-heading">
                    <span> この検索に名前を付けて保存</span>
                    <a class="p-sidebar-btn bg-white saveSearch">保存</a>
                  </div>
                  <div class="p-sidebar-info">
                    <span>Step1 の検索条件（再検索用）</span>
                  </div> --}}
                  <div class="p-sidebar-heading">
                    <span> 検索サイト</span>
                    <a class="p-sidebar-btn bg-white" href="#" data-remodal-target="target_sites_modal">変更</a>
                  </div>
                  <div class="p-sidebar-info" id="target_sites">
                    @foreach($site_enabled as $key => $site)
                    <span class="site_id" style="display:none"> {{$site}} </span>
                      @if($site == 'reins')
                        <span id="reins_{{ $key }}" class="mgn-r-3"> レインズ </span>
                        <input type="hidden" name="site_enabled[]" value="{{ $site }}">
                      @elseif($site == 'atbb')
                        <span id="atbb_{{ $key }}" class="mgn-r-3"> at BB </span>
                        <input type="hidden" name="site_enabled[]" value="{{ $site }}">
                      @elseif($site == 'itandibb')
                        <span id="itandibb_{{ $key }}" class="mgn-r-3"> イタンジ </span>
                        <input type="hidden" name="site_enabled[]" value="{{ $site }}">
                      @elseif($site == 'tokyu')
                        <span id="tokyu_{{ $key }}" class="mgn-r-3"> 東急住宅リース</span>
                        <input type="hidden" name="site_enabled[]" value="{{ $site }}">
                      @elseif($site == 'mitsui')
                        <span id="mitsui_{{ $key }}" class="mgn-r-3"> 三井不動産レジデンシャルリース </span>
                        <input type="hidden" name="site_enabled[]" value="{{ $site }}">
                      @elseif($site == 'sumitomo')
                        <span id="sumitomo_{{ $key }}" class="mgn-r-3"> 住友不動産</span>
                        <input type="hidden" name="site_enabled[]" value="{{ $site }}">
                      @endif
                    @endforeach
                  </div>
                  <div class="p-sidebar-heading">
                    <span>物件種目</span>
                  </div>
                  <div class="p-sidebar-info" >
                    @foreach ($object_type as $key => $item)
                    <div class="display_inline">
                      <div class="act-cat">
                        @if(in_array($item, $selectedObjectType ?? []))
                        <input type="checkbox" class="object-type" checked value="{{ $item }}" name="object_type[]" id="object-type-{{ $key }}" hidden>
                        @else
                        <input type="checkbox" class="object-type" value="{{ $item }}" name="object_type[]" id="object-type-{{ $key }}" hidden>
                        @endif
                        <label for="object-type-{{ $key }}"  class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="p-sidebar-heading">
                  <span>都道府県</span>
                  <a class="p-sidebar-btn bg-white" href="" data-remodal-target="prefectures_modal">変更</a>
                </div>
                <div class="p-sidebar-info" id="selected-item-pref">
                  <span {{ $totalPrefSelect = count($selectedPref) }}></span>
                  @foreach($selectedPref as $key => $pref)
                    <span class="mgn-r-3" id="{{$pref}}">{{ $pref  }}</span>
                    <input type="hidden" name="prefectures[]" value="{{ $pref  }}" id="{{ $pref  }}" data-id="{{$key}}" data-value="{{$pref}}" class="selected_prefecture_hid"/>
                  @endforeach
                </div>
                <div class="tab-box-2">
                  <div class="form-tabs">
                    <div class="tab-details display-inline--flex" x-data="">
                      <template x-for="tab in $store.tabs.items">
                        <a
                        :class="{ 'tab-active': tab.label == $store.tabs.current, 'tab-default': tab.label != $store.tabs.current}"
                        @click="$store.tabs.current = tab.label" x-text="tab.description">
                      </a>
                    </template>
                    </div>
                  </div>
                  <div class="tabs-result" x-data="">
                    <div class="" x-show="$store.tabs.current == 'first'">
                      <div class="display-f-sb">
                        <span class="p-sidebar-info-02" id="checker">
                          <span {{ $totalCities = count($selectedCity) }}></span>
                            <div id="city_selected">
                              @foreach($searchData['prefectures'] as $pref)
                                @if (array_key_exists($pref, $searchData['cities'] ?? []))
                                  @foreach ($searchData['cities'][$pref] as $key => $city_data)
                                    @if ($searchData['cities'][$pref])
                                        <span class="fnt-sz-2" id="{{$city_data}}">{{ $city_data  ?? ''}}/</span>
                                        <input type="hidden" id="{{$city_data}}" name="cities[{{$pref}}][]" value="{{$city_data}}" data-pref-value="{{$pref}}" class="cities_selected"/>
                                    @endif
                                  @endforeach
                                @endif
                              @endforeach
                            </div>
                        </span>
                        <a class="p-sidebar-btn bg-white margin-left--auto" href="#" data-remodal-target="selected_prefectures_modal">変更</a>
                      </div>

                      <div class="p-sidebar-heading-01 margin-top--10">
                        <span>町村</span>
                        <a class="p-sidebar-btn bg-white" href="">追加</a>
                      </div>
                    </div>
                    <div class="" x-show="$store.tabs.current == 'second'" style="display: none;">
                      <div class="display-f-sb">
                        <span class="p-sidebar-info-02">
                        </span>
                        <a class="p-sidebar-btn bg-white margin-left--auto" href="">変更</a>
                    </div>
                    <div class="p-sidebar-heading-01 margin-top--10">
                      <span>町村</span>
                      <a class="p-sidebar-btn bg-white" href="">追加</a>
                    </div>
                  </div>
                </div>
              </div>


              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>駅から徒歩</span>
                </div>
                <input type="text" class="wd--80 padding-5 mgn-l-2 txt-alg-r" name="from_station" value="{{ $searchData['from_station'] ?? '' }}" style="
                margin-top: 10px;" >
                <span class="fnt-sz-4 mgn-l-3">分以内</span>
              </div>

              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>建物・物件名</span>
                </div>
                <input type="text" class="wd--92 padding-5" name="property_name" value="{{ $searchData['property_name'] ?? ''}}" style="margin-left: 10px;
                margin-top: 10px;">
              </div>

              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>賃料</span>
                </div>
                <div class="slct-box-cont">
                  <div class="display-inline--flex">
                    <input type="text" class="wd--75 padding-5 mgn-t-2 txt-alg-r mgn-r-1" name="fee_min" value="{{ $searchData['fee_min'] ?? ''}}"  style="height: 41px; margin-left: 5px;">
                    <span class="p-sidebar-info-01">万円～</span>
                  </div>
                  <div class="display-inline--flex margin">
                    <input type="text" class="wd--75 mgn-l-2 padding-5 txt-alg-r mgn-r-1" name="fee_max" value="{{ $searchData['fee_max'] ?? ''}}"  style="height: 41px; margin-top: 10px;">
                    <span class="p-sidebar-info-01">万円</span>
                  </div>
                </div>
                <div class="p-sidebar-opt mgn-t-3">
                  @foreach ($leasing_material as $key => $item)
                      <div class="display_inline">
                        <div class="act-cat">
                          @if(in_array($key, $other_fees ?? []))
                          <input type="checkbox" class="leasing-material" value="{{ $item }}" checked name="other_fees[]" id="leasing-material-{{ $key }}" hidden>
                          @else
                          <input type="checkbox" class="leasing-material" value="{{ $item }}" name="other_fees[]" id="leasing-material-{{ $key }}" hidden>
                          @endif
                          <label for="leasing-material-{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                        </div>
                      </div>
                    @endforeach
                </div>
              </div>
              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>間取り</span>
                </div>
                <div class="p-sidebar-opt" style="margin-left: 9px;">
                  <div class="display-inline--flex margin-top--10">
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" {{ in_array($planOfHouse[0], $madori ?? []) ? 'checked' : '' }} name="madori[]" id="test_1" value="1R" data-id="0" hidden da>
                      <label for="test_1" class="c-lbl-white vd_dt_typ ">1R</label>
                    </div>
                    <label class="" for=""></label>
                    <label class="" for=""></label>
                  </div>
                  <div class="display-inline--flex">
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" {{ in_array($planOfHouse[1], $madori ?? []) ? 'checked' : '' }} name="madori[]" id="test_2" value="1K" data-id="1" hidden>
                      <label for="test_2" class="c-lbl-white vd_dt_typ ">1K..</label>
                    </div>
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" {{ in_array($planOfHouse[5], $madori ?? []) ? 'checked' : '' }} name="madori[]" id="test_6" value="1DK" data-id="5" hidden>
                      <label for="test_6" class="c-lbl-white vd_dt_typ ">1DK..</label>
                    </div>
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" {{ in_array($planOfHouse[9], $madori ?? []) ? 'checked' : '' }} name="madori[]" id="test_10" value="1LDK" data-id="9" hidden>
                      <label for="test_10" class="c-lbl-white vd_dt_typ ">1LDK..</label>
                    </div>
                  </div>
                  <div class="display-inline--flex ">
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" {{ in_array($planOfHouse[2], $madori ?? []) ? 'checked' : '' }} name="madori[]" id="test_3" value="2K" data-id="2" hidden>
                      <label for="test_3" class="c-lbl-white vd_dt_typ ">2K..</label>
                    </div>
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" {{ in_array($planOfHouse[6], $madori ?? []) ? 'checked' : '' }} name="madori[]" id="test_7" value="2DK" data-id="6" hidden>
                      <label for="test_7" class="c-lbl-white vd_dt_typ ">2DK..</label>
                    </div>
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" {{ in_array($planOfHouse[10], $madori ?? []) ? 'checked' : '' }} name="madori[]" id="test_11" value="2LDK" data-id="10" hidden>
                      <label for="test_11" class="c-lbl-white vd_dt_typ ">2LDK..</label>
                  </div>
                  </div>
                  <div class="display-inline--flex ">
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" name="madori[]" {{ in_array($planOfHouse[3], $madori ?? []) ? 'checked' : '' }} id="test_4" value="3K" data-id="3" hidden>
                      <label for="test_4" class="c-lbl-white vd_dt_typ ">3K..</label>
                    </div>
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" {{ in_array($planOfHouse[7], $madori ?? []) ? 'checked' : '' }} name="madori[]" id="test_8" value="3DK" data-id="7" hidden>
                      <label for="test_8" class="c-lbl-white vd_dt_typ ">3DK..</label>
                    </div>
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" {{ in_array($planOfHouse[11], $madori ?? []) ? 'checked' : '' }} name="madori[]" id="test_12" value="3LDK" data-id="11" hidden>
                      <label for="test_12" class="c-lbl-white vd_dt_typ ">3LDK..</label>
                    </div>
                  </div>
                  <div class="display-inline--flex ">
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" name="madori[]" {{ in_array($planOfHouse[4], $madori ?? []) ? 'checked' : '' }} id="test_5" value="4K" data-id="4" hidden>
                      <label for="test_5" class="c-lbl-white vd_dt_typ ">4K..</label>
                    </div>
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" name="madori[]" {{ in_array($planOfHouse[8], $madori ?? []) ? 'checked' : '' }} id="test_9" value="4DK" data-id="8" hidden>
                      <label for="test_9" class="c-lbl-white vd_dt_typ ">4DK..</label>
                    </div>
                    <div class="act-cat">
                      <input type="checkbox" class="plan-house-type" name="madori[]" {{ in_array($planOfHouse[12], $madori ?? []) ? 'checked' : '' }} id="test_13" value="4LDK" data-id="12" hidden>
                      <label for="test_13" class="c-lbl-white vd_dt_typ ">4LDK..</label>
                  </div>
                  </div>
                </div>
              </div>
              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>専有面積</span>
                </div>
                <div class="slct-box-cont">
                  <div class="display-inline--flex">
                    <input type="text" class="wd--75 padding-5 mgn-t-2 txt-alg-r mgn-r-1" name="area_min" value="{{ $searchData['area_min'] ?? '' }}" style="height: 41px; margin-left: 5px;">
                    <span class="p-sidebar-info-01">㎡ ～</span>
                  </div>
                  <div class="display-inline--flex">
                    <input type="text" class="wd--75 padding-5 mgn-t-2 txt-alg-r mgn-r-1 mgn-l-4" name="area_max" value="{{ $searchData['area_max'] ?? '' }}" style="height: 41px; margin-top: 10px;">
                    <span class="p-sidebar-info-01">㎡</span>
                  </div>
                </div>
              </div>
              <div class="form-item">
                <div class="p-sidebar-heading ">
                  <span>建物構造</span>
                  <a class="p-sidebar-btn bg-white" href="">追加</a>
                </div>
                <div class="p-sidebar-opt margin-top--10" style="margin-left: 9px;">
                  @foreach ($buildingStructures as $key => $item)
                    <div class="display_inline">
                      <div class="act-cat">
                        @if(in_array($item, $selected_bldg_str ?? []))
                        <input type="checkbox" class="bldg_struct" value="{{ $item }}" data-id="{{$key}}" checked name="bldg_structure[]" id="bldg_struct-{{ $key }}" hidden>
                        @else
                        <input type="checkbox" class="bldg_struct" value="{{ $item }}" data-id="{{$key}}" name="bldg_structure[]" id="bldg_struct-{{ $key }}" hidden>
                        @endif
                        <label for="bldg_struct-{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>築年数</span>
                </div>
                <div class="slct-box-cont">
                  <div class="display-inline--flex">
                    <input type="text" class="wd--75 padding-5 mgn-t-2 txt-alg-r mgn-r-1" name="year_build_min" value="{{ $searchData['year_build_min']  }}" style="height: 41px; margin-left: 5px;">
                    <span class="p-sidebar-info-01">年 〜</span>
                  </div>
                  <div class="display-inline--flex margin">
                    <input type="text" class="wd--75 padding-5 mgn-t-2 txt-alg-r mgn-r-1 mgn-l-4" name="year_build_max" value="{{ $searchData['year_build_max'] }}" style="height: 41px; margin-top: 10px;">
                    <span class="p-sidebar-info-01">年 </span>
                  </div>
                </div>
              </div>
              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>フリーワード</span>
                </div>
                <input type="text" class="wd--92 padding-5" name="free_word"  value="{{ $searchData['free_word'] }}" style="height: 41px; margin-left: 10px;
                margin-top: 10px;">
              </div>
              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>登録・公開日</span>
                  <a class="p-sidebar-btn bg-white" href="">変更</a>
                </div>
                <div class="p-sidebar-info">
                  <input type="text" class="wd--92 padding-5" name="publishing_date"  value="{{ $searchData['publishing_date'] }}"  hidden>
                  @if($searchData['publishing_date'])
                  <span>
                    {{ Carbon::parse($searchData['publishing_date'])->format('Y')}}年
                    {{ Carbon::parse($searchData['publishing_date'])->format('m')}}月
                    {{ Carbon::parse($searchData['publishing_date'])->format('d')}}日以降
                  </span>
                  @else
                  <span></span>
                  @endif
                </div>
              </div>
              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>取引態様</span>
                </div>
                <div class="p-sidebar-opt display-inline--flex margin-top--10">
                    <div class="lbl-txt-01 lbl-txt-01-m0">
                      <div class="act-cat">
                        <input type="checkbox" value="0" {{ in_array(0, $slct_trade_style ?? []) ? 'checked' : '' }} name="trade-style[]" id="landlord" class="trade_style" hidden>
                        <label for="landlord" class="c-lbl-white vd_dt_typ ">貸主</label>
                      </div>
                    </div>
                    <div class="lbl-txt-01 lbl-txt-01-m0">
                      <div class="act-cat">
                        <input type="checkbox" value="1" {{ in_array(1, $slct_trade_style ?? []) ? 'checked' : '' }} name="trade-style[]" id="agent" class="trade_style" hidden>
                        <label for="agent" class="c-lbl-white vd_dt_typ ">代理</label>
                      </div>
                    </div>
                    <div class="lbl-txt-01 lbl-txt-01-m0">
                      <div class="act-cat">
                        <input type="checkbox" value="2" {{ in_array(2, $slct_trade_style ?? []) ? 'checked' : '' }} name="trade-style[]" id="medium" class="trade_style" hidden>
                        <label for="medium" class="c-lbl-white vd_dt_typ ">媒介</label>
                      </div>
                    </div>
                </div>
              </div>
              <div class="form-item">
                <div class="p-sidebar-heading">
                  <span>画像データ</span>
                </div>
                <div class="p-sidebar-opt display-inline--flex margin-top--10">
                    <div class="lbl-txt-01 lbl-txt-01-m0">
                      <div class="act-cat">
                        <input type="radio" value="0" {{ in_array(0, $slct_video_data ?? []) ? 'checked' : '' }} name="video_data[]" id="image-flag" class="slct_video_data" hidden>
                        <label for="image-flag" class="c-lbl-white vd_dt_typ ">画像あり</label>
                      </div>
                    </div>
                    <div class="lbl-txt-01 lbl-txt-01-m0">
                      <div class="act-cat">
                        <input type="radio" value="1" {{ in_array(1, $slct_video_data ?? []) ? 'checked' : '' }} name="video_data[]" id="drawing-flag" class="slct_video_data" hidden>
                        <label for="drawing-flag" class="c-lbl-white vd_dt_typ ">図面あり</label>
                      </div>
                    </div>
                </div>
              </div>
              <div class="form-item">
                <div id="aircondition" style="display: none;">

                </div>
                <div class="p-sidebar-bottom">
                  <div >
                    @csrf
                  <button type="submit" class="c-lbl-white mt-2" onclick="submitSearch()">再検索</button>
                  </div>
                  <a class="clr-cond-01" href="">クリア</a>
                </div>
              </div>
            </div>
            <input  value="{{ $searchData['from_station'] ?? ''}}" name="from_station" hidden>
            @if($routes)
              @foreach ($searchData['routes'] as $route)
                <input type="hidden" name="routes[]" value="{{$route}}"/>
              @endforeach
            @endif
            @if($stations)
              @foreach ($searchData['stations'] as $station)
                <input type="hidden" name="stations[]" value="{{$station}}"/>
              @endforeach
            @endif
          </form>
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
                    <i class="fa-solid path_138-st step1_clickable"></i>
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
                    <select name="" id="display_method_1" class="wdt-1">
                      <option value="1">仲介用表示</option>
                      <option value="2">お客様表示</option>
                    </select>
                  </div>

                </div>

                <div class="tbl-result_search" >
                  <div class="stepper-tbl stepper_aborder_adjust2">
                    <div class="step-header step_aborder_adjust">
                      <div class="step-desc" >
                        <div class="" >
                          物件情報の見方
                        </div>
                      </div>
                      <i class="fa-solid path_138-tbl tbl_clickable"></i>
                    </div>
                    <div class="step-body_2 step_body_2_adjust">
                      <div class="tbl-result-smpl overflow-x" >
                        <table>
                          <tbody>
                            <tr>
                              <td class="td_width_adjust" rowspan="5" style="width: 4%;">
                                <div style="text-align: center;">全選択</div>
                                <input type="checkbox">
                                {{-- <div class="rating-wrapper">
                                  <input type="radio" name="rating" id="star" class="input_rating">
                                  <label for="rating" class="rating" id="guide_star"></label>
                                </div> --}}
                              </td>
                              <td rowspan="5" style="width:100%;max-width:13%;">
                                <span class="image-box">画像</span>
                              </td>
                              <td rowspan="5" style="width:100%;max-width:11%;" class="pdg-2">
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
                              <td colspan="3" class="txt-alg-l pdg-l-2">物件名・部屋</td>
                              <td style="" class="txt-alg-l pdg-l-2">更新日</td>
                              <td style="width: 12%;" class="txt-alg-l pdg-l-2">元サイトへ</td>

                            </tr>
                            <tr>
                              <td colspan="2" class="txt-alg-l pdg-l-2" style="width: 37%;">所在地</td>
                              <td colspan="2" rowspan="3" class="txt-alg-l">
                                <div style="display:flex; justify-content: flex-start; text-align: center;"  >
                                <ul class="pdg-r-6 margin-btm--0">
                                  <li class="mgn-b-1">面積</li>
                                  <li class="mgn-b-1">所在階／建階	</li>
                                  <li>築年月</li>
                                </ul>
                                <ul class="pdg-l-6 margin-btm--0" >
                                  <li class="mgn-b-1">物件種目</li>
                                  <li>間取り</li>
                                </ul>
                              </div>
                              </td>
                              <td class="txt-alg-l">広告掲載</td>
                            </tr>
                            <tr>
                              <td rowspan="2" colspan="2" class="txt-alg-l pdg-l-2">
                                <span>沿線駅・交通 1 <br/> 沿線駅・交通 2</span>
                              </td>
                              <td class="txt-alg-l">取引態様</td>
                            </tr>
                            {{-- <tr style="border-right: 1px solid;">
                            </tr> --}}
                            <tr>
                              <td rowspan="2" class="txt-alg-l">詳細表示</td>
                            </tr>
                            <tr>
                              <td class="txt-alg-l pdg-l-2"  style="width:34%;">登録会社</td>
                              <td class="txt-alg-l" ></td>
                              <td class="txt-alg-l">電話番号</td>
                              <td class="txt-alg-l pdg-l-2">AD</td>
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
                      {{--  Total  --}}
                      <label for="">検索結果 <span id="total_count">0</span>件</label>
                      @foreach($site_count_label as $key => $site)
                        @if($key == count($site_count_label)-1)
                          <label for="">
                            {{ count($site_count_label) > 1 ? '/' : '（' }}
                            {{ $site['label'] }} <span id="{{ $site['key'] }}">0</span>件）
                          </label>
                        @elseif($key == 0)
                          <label for="">（{{ $site['label'] }} <span id="{{ $site['key'] }}">0</span>件</label>
                        @elseif($key < count($site_count_label)-1)
                          <label for="">/ {{ $site['label'] }} <span id="{{ $site['key'] }}">0</span>件</label>
                        @endif
                      @endforeach
                    </div>
                  </div>
                    <div class="exl-select">
                      <select name="result_sort" id="result_sort" class="wdt-1">
                        <option value="0">反応速い順</option>
                        <option value="1">安い</option>
                        <option value="2">高い</option>
                        <option value="3">広い</option>
                        <option value="4">築浅</option>
                        <option value="5">公開・更新日新</option>
                      </select>
                  </div>
                </div>

                <div class="select_property" >
                  <div class="checkbox-right" >
                    <input type="checkbox" id="vehicle1" name="vehicle1" class="search-checkbox" value="Bike" checked="checked">
                    <label for="">表示方法：</label>
                    <select name="display_mode" id="" class="wdt-2 mgn-l-4">
                      <option value="1">仲介用表示</option>
                      <option value="0">お客様表示</option>
                    </select><br/>
                  </div>
                </div>

                <div class="tbl-result tbl-result_search overflow-x">
                  <div id="spinner" >
                    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                  </div>
                  <div id="result_table"></div>
                  <div id="favorites_table"></div>
                </div>
                <br /><br />
                <div id="paginate_result" class="mgn-b-01--list pagination pagination-jsPage"></div>

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
            <div id="result_table"></div>
          </div>

      </div>
  </div>
</div>
<div class="sticky-footer">
  @if ($current_route == 'store/search/mocklist' || $current_route == 'store/search/list')
    <div class="btn-step-2 mgn-t-5--list">
      <span class="step2">Step2 選択した物件について</span>
      <a href="#" class="c-lbl-white-2 margin--5" data-remodal-target="result_search">足りない情報のみを収集</a>
      <a href="#" class="c-lbl-green3 margin--5" id="result_search" data-remodal-target="result_search">こだわり検索を追加</a>
    </div>
    @else
      <div class="search-bottom">
        <div class="search-margin-bottom">
          <div class="sb-btm">
            <form class="search-btm" method="POST" action="">
              @csrf
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
        検索結果一覧 こだわり検索
      </div>
    </div>
    <div class="container_body">
      <div class="container_search">
        <div class="container_search_adjust">
          <ul class="container_ul">
            <button class="container_text" style="border: 0; background: #fff;" data-remodal-action="confirm" type="button">こだわり検索をやめる</button>
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

                <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                  <div class="act-cat">
                    <input type="checkbox" class="object-type site_enabled" value="reins"  name="site_enabled[]" id="reins_sites" hidden>
                    <label for="reins_sites" class="c-lbl-white vd_dt_typ ">レインズ</label>
                  </div>
                </div>

                <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                  <div class="act-cat">
                    <input type="checkbox" class="object-type site_enabled" value="atbb"  name="site_enabled[]" id="atbb_sites" hidden>
                    <label for="atbb_sites" class="c-lbl-white vd_dt_typ ">at BB</label>
                  </div>
                </div>

              <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                <div class="act-cat">
                  <input type="checkbox" class="object-type site_enabled" value="itandibb"  name="site_enabled[]" id="itanji_sites" hidden>
                  <label for="itanji_sites" class="c-lbl-white vd_dt_typ ">イタンジ</label>
                </div>
              </div>


              <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                <div class="act-cat">
                  <input type="checkbox" class="object-type site_enabled" value="tokyu" name="site_enabled[]" id="tokyo_housing" hidden>
                  <label for="tokyo_housing" class="c-lbl-white vd_dt_typ ">東急住宅リース</label>
                </div>
              </div>


              <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                <div class="act-cat">
                  <input type="checkbox" class="object-type site_enabled" value="mitsui" name="site_enabled[]" id="mitsui_residential" hidden>
                  <label for="mitsui_residential" class="c-lbl-white vd_dt_typ ">三井不動産レジデンシャルリース</label>
                </div>
              </div>

              <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                <div class="act-cat">
                  <input type="checkbox" class="object-type site_enabled" value="sumitomo" name="site_enabled[]" id="sumitomo_sites" hidden>
                  <label for="sumitomo_sites" class="c-lbl-white vd_dt_typ ">住友不動産</label>
                </div>
              </div>
          </ul>
        </div>
      </div>

      <div class="second_dotted_lines"></div>

      <div class="container_kitchen">
        <div class="container_kitchen_adjust">
          <div class="container_kitchen_ul">
            <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">キッチン</span>
            <div class="display-flex">
                <input type="checkbox" id="gas_stove" name="gas_stove" value="ガスコンロ設置化" class="airconditioner_center list_of_checkbox">
                <label for="gas_stove" class="label-checkbox-2 mgn-r-6">ガスコンロ設置化</label><br>
                <input type="checkbox" id="more_stove" value="コンロ2口以上" name="more_stove" class="airconditioner_center list_of_checkbox">
                <label for="more_stove" class="label-checkbox-2 mgn-r-6">コンロ2口以上</label><br>
                <input type="checkbox" id="system_kitchen" name="system_kitchen" value="システムキッチン" class="airconditioner_center list_of_checkbox">
                <label for="system_kitchen" class="label-checkbox-2 mgn-r-6">システムキッチン</label><br>
                {{--<div class="tooltip-icon">
                  <i class='fas fa-exclamation-circle' style='font-size:26px;color:#ff6161'></i>
                  <div class="tooltip-design">
                    <span class="tooltiptext"><span class="tooltip-message">次のサイトは検索できません。<br/>
                      レインズ / atBB</span></span>
                  </div>
                </div>--}}
              </div>
          </div>
        </div>
        <div class="container_kitchen_line2">
          <ul class="container_kitchen_line2_ul">
            <h1 class="l-12__1-05 "><p></p></h1>
            {{-- <div class="container_kitchen_line2_center"> --}}
            <div class="display-flex">
              <input type="checkbox" id="island_stove" name="island_stove" value="アイランドキッチン" class="airconditioner_center list_of_checkbox">
              <label for="island_stove" class="label-checkbox-2 mgn-r-6">アイランドキッチン</label><br>
              <input type="checkbox" id="cooking_heater" name="cooking_heater" value="IHクッキングヒーター" class="airconditioner_center list_of_checkbox">
              <label for="cooking_heater" class="label-checkbox-2 mgn-r-6">IHクッキングヒーター</label><br>
              <input type="checkbox" id="dishwater" name="dishwater" value="食器乾燥機" class="airconditioner_center list_of_checkbox">
              <label for="dishwater" class="label-checkbox-2 mgn-r-6">食器乾燥機</label><br>
              <input type="checkbox" id="dryer" name="dryer" value="食器洗浄乾燥機" class="airconditioner_center list_of_checkbox">
              <label for="dryer" class="label-checkbox-2 mgn-r-6">食器洗浄乾燥機</label><br>
              <input type="checkbox" id="disposer" name="disposer" value="ディスポーザー" class="airconditioner_center list_of_checkbox">
              <label for="disposer" class="label-checkbox-2 mgn-r-6">ディスポーザー</label><br>
            </div>
          </ul>
        </div>
        <div class="container_kitchen_line3">
          <div class="container_kitchen_line3_ul">
            <h1 class="l-12__1-05 "><p></p></h1>
            {{-- <div class="container_kitchen_line3_center"> --}}
            <div class="display-flex">
              <input type="checkbox" id="refrigerator" name="refrigerator" value="冷蔵庫" class="airconditioner_center list_of_checkbox">
              <label for="refrigerator" class="label-checkbox-2 mgn-r-6">冷蔵庫</label><br>
              <i class='fas fa-exclamation-circle' style='font-size:26px;color:#ff6161'></i>
              <input type="checkbox" id="water_purifier" name="water_purifier" value="浄水器" class="airconditioner_center list_of_checkbox">
              <label for="water_purifier" class="label-checkbox-2 mgn-r-6">浄水器</label><br>
            </div>
          </div>
        </div>
      </div>
      <div class="third_dotted_lines"></div>

        <div class="container_bath_toilet">
          <div class="container_bath_toilet_adjust">
            <ul class="container_bath_toilet_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">バス・トイレ</span>
              {{-- <div class="container_bath_toilet_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="private_toilet" name="private_toilet" value="専用トイレ" class="airconditioner_center list_of_checkbox">
                <label for="private_toilet" class="label-checkbox-2 mgn-r-6">専用トイレ</label><br>
                <input type="checkbox" id="warm_water" name="warm_water" value="温水洗浄便座" class="airconditioner_center list_of_checkbox">
                <label for="warm_water" class="label-checkbox-2 mgn-r-6">温水洗浄便座</label><br>
                <input type="checkbox" id="private_bus" name="private_bus" value="専用バス" class="airconditioner_center list_of_checkbox">
                <label for="private_bus" class="label-checkbox-2 mgn-r-6">専用バス</label><br>
                <input type="checkbox" id="reheating" name="reheating" value="追焚機能" class="airconditioner_center list_of_checkbox">
                <label for="reheating" class="label-checkbox-2 mgn-r-6">追焚機能</label><br>
                <input type="checkbox" id="separate" name="separate" value="バス・トイレ別" class="airconditioner_center list_of_checkbox">
                <label for="separate" class="label-checkbox-2 mgn-r-6">バス・トイレ別</label><br>
                <input type="checkbox" id="independence" name="independence" value="洗面所独立" class="airconditioner_center list_of_checkbox">
                <label for="independence" class="label-checkbox-2 mgn-r-6">洗面所独立</label><br>
              </div>

            </ul>
          </div>
          <div class="container_bath_toilet_adjust2">
            <ul class="container_bath_toilet_ul2">
              <h1 class="l-12__1-05 "><p></p></h1>
              {{-- <div class="container_bath_toilet_adjust2_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="bathroom_shower" name="bathroom_shower" value="シャワー付き洗面化粧台" class="airconditioner_center list_of_checkbox">
                <label for="bathroom_shower" class="label-checkbox-2 mgn-r-6">シャワー付き洗面化粧台</label><br>
                <input type="checkbox" id="washing_machine" name="washing_machine" value="洗濯機置場" class="airconditioner_center list_of_checkbox">
                <label for="washing_machine" class="label-checkbox-2 mgn-r-6">洗濯機置場</label><br>
                <input type="checkbox" id="indoor_washing" name="indoor_washing" value="室内洗濯機置場" class="airconditioner_center list_of_checkbox">
                <label for="indoor_washing" class="label-checkbox-2 mgn-r-6">室内洗濯機置場</label><br>
                <input type="checkbox" id="bathroom_dryer" name="bathroom_dryer" value="浴室乾燥機" class="airconditioner_center list_of_checkbox">
                <label for="bathroom_dryer" class="label-checkbox-2 mgn-r-6">浴室乾燥機</label><br>
              </div>
            </ul>
          </div>
        </div>

        <div class="fourth_dotted_line"></div>

        <div class="container_airconditioner">
          <div class="container_airconditioner_adjust">
            <ul class="container_airconditioner_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">建物設備</span>
                {{-- <div class="container_airconditioner_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="air_conditioner" name="air_conditioner" value="エアコン" class="airconditioner_center list_of_checkbox">
                <label for="air_conditioner" class="label-checkbox-2 mgn-r-6">エアコン</label><br>
                <input type="checkbox" id="floor_heating" name="floor_heating" value="床暖房" class="airconditioner_center list_of_checkbox">
                <label for="floor_heating" class="label-checkbox-2 mgn-r-6">床暖房</label><br>
                <input type="checkbox" id="conservatory" name="conservatory" value="FF暖房" class="airconditioner_center list_of_checkbox">
                <label for="conservatory" class="label-checkbox-2 mgn-r-6">FF暖房</label><br>
              </div>
            </ul>
          </div>
        </div>

        <div class="fifth_dotted_lines"></div>

        <div class="container_security">
          <div class="container_security_adjust">
            <ul class="container_security_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">セキュリティ</span>
              {{-- <div class="container_security_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="dimple_key" name="dimple_key" value="ディンプルキー" class="airconditioner_center list_of_checkbox">
                <label for="dimple_key" class="label-checkbox-2  mgn-r-6">ディンプルキー</label><br>
                <input type="checkbox" id="auto_lock" name="auto_lock" value="オートロック" class="airconditioner_center list_of_checkbox">
                <label for="auto_lock" class="label-checkbox-2  mgn-r-6">オートロック</label><br>
                <input type="checkbox" id="intercom" name="intercom" value="モニター付きインターホン" class="airconditioner_center list_of_checkbox">
                <label for="intercom" class="label-checkbox-2  mgn-r-6">モニター付きインターホン</label><br>
                <input type="checkbox" id="security" name="security" value="24時間セキュリティ" class="airconditioner_center list_of_checkbox">
                <label for="security">24時間セキュリティ</label><br>
              </div>
            </ul>
          </div>
        </div>

        <div class="sixth_dotted_lines"></div>

        <div class="container_storage">
          <div class="container_storage_adjust">
            <ul class="container_storage_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">収納</span>
              {{-- <div class="container_storage_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="storage_space" name="storage_space" value="収納スペース" class="airconditioner_center list_of_checkbox">
                <label for="storage_space" class="label-checkbox-2 mgn-r-6">収納スペース</label><br>
                <input type="checkbox" id="walkin_closet" name="walkin_closet" value="ウォークインクローゼット" class="airconditioner_center list_of_checkbox">
                <label for="walkin_closet" class="label-checkbox-2 mgn-r-6">ウォークインクローゼット</label><br>
                <input type="checkbox" id="shoes_closet" name="shoes_closet" value="シューズインクローゼット" class="airconditioner_center list_of_checkbox">
                <label for="shoes_closet" class="label-checkbox-2 mgn-r-6">シューズインクローゼット</label><br>
              </div>
            </ul>
          </div>
        </div>

        <div class="seventh_dotted_lines"></div>

        <div class="container_comfortable">
          <div class="container_comfortable_adjust">
            <ul class="container_comfortable_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">快適環境</span>
              {{-- <div class="container_comfortable_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="bs" name="bs" value="BS/CS/CATV" class="airconditioner_center list_of_checkbox">
                <label for="bs" class="label-checkbox-2 mgn-r-6">BS/CS/CATV</label><br>
                <input type="checkbox" id="free_internet" name="free_internet" value="インターネット無料" class="airconditioner_center list_of_checkbox">
                <label for="free_internet" class="label-checkbox-2 mgn-r-6">インターネット無料</label><br>
                <input type="checkbox" id="internet_compatible" name="internet_compatible" value="インターネット対応" class="airconditioner_center list_of_checkbox">
                <label for="internet_compatible" class="label-checkbox-2 mgn-r-6">インターネット対応</label><br>
                <input type="checkbox" id="high_speed" name="high_speed" value="高速インターネット" class="airconditioner_center list_of_checkbox">
                <label for="high_speed" class="label-checkbox-2 mgn-r-6">高速インターネット</label><br>
                <input type="checkbox" id="loft" name="loft" value="ロフト" class="airconditioner_center list_of_checkbox">
                <label for="loft" class="label-checkbox-2 mgn-r-6">ロフト</label><br>
              </div>

            </ul>
          </div>

          <div class="container_comfortable_adjust2">
            <ul class="container_comfortable_ul2">
              <h1 class="l-12__1-05 "><p></p></h1>
              {{-- <div class="container_comfortable_adjust2_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="flooring" name="flooring" value="フローリング" class="airconditioner_center list_of_checkbox">
                <label for="flooring" class="label-checkbox-2 mgn-r-6">フローリング</label><br>
                <input type="checkbox" id="double_glazing" name="double_glazing" value="複層ガラス" class="airconditioner_center list_of_checkbox">
                <label for="double_glazing" class="label-checkbox-2 mgn-r-6">複層ガラス</label><br>
                <input type="checkbox" id="balcony" name="balcony" value="バルコニー" class="airconditioner_center list_of_checkbox">
                <label for="balcony" class="label-checkbox-2 mgn-r-6">バルコニー</label><br>
                <input type="checkbox" id="garden" name="garden" value="庭" class="airconditioner_center list_of_checkbox">
                <label for="garden" class="label-checkbox-2 mgn-r-6">庭</label><br>
                <input type="checkbox" id="barrier_free" name="barrier_free" value="バリアフリー" class="airconditioner_center list_of_checkbox">
                <label for="barrier_free" class="label-checkbox-2 mgn-r-6">バリアフリー</label><br>
                <input type="checkbox" id="electric" name="electric" value="オール電化" class="airconditioner_center list_of_checkbox">
                <label for="electric" class="label-checkbox-2 mgn-r-6">オール電化</label><br>
              </div>

            </ul>
          </div>

          <div class="container_comfortable_adjust3">
              <ul class="container_comfortable_ul3">
                <h1 class="l-12__1-05 "><p></p></h1>
                {{-- <div class="container_comfortable_adjust3_center"> --}}
                  <div class="display-flex">
                  <input type="checkbox" id="garbage_disposal" name="garbage_disposal" value="24時間ゴミ出し化" class="airconditioner_center list_of_checkbox">
                  <label for="garbage_disposal" class="label-checkbox-2 mgn-r-6">24時間ゴミ出し化</label><br>
                </div>

              </ul>
          </div>
        </div>

        <div class="eigth_dotted_lines"></div>

        <div class="container_building_equip">
          <div class="container_building_equip_adjust">
            <ul class="container_building_equip_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">建物設備</span>
              {{-- <div class="container_building_equip_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="parking" name="parking" value="駐車場" class="airconditioner_center list_of_checkbox">
                <label for="parking" class="label-checkbox-2 mgn-r-6">駐車場</label><br>
                <input type="checkbox" id="parking_slot" name="parking_slot" value="駐車場2台分" class="airconditioner_center list_of_checkbox">
                <label for="parking_slot" class="label-checkbox-2 mgn-r-6">駐車場2台分</label><br>
                <input type="checkbox" id="bicycle_park" name="bicycle_park" value="駐輪場" class="airconditioner_center list_of_checkbox">
                <label for="bicycle_park" class="label-checkbox-2 mgn-r-6">駐輪場</label><br>
                <input type="checkbox" id="bike_yard" name="bike_yard" value="バイク置場" class="airconditioner_center list_of_checkbox">
                <label for="bike_yard" class="label-checkbox-2 mgn-r-6">バイク置場</label><br>
                <input type="checkbox" id="trunk_room" name="trunk_room" value="トランクルーム" class="airconditioner_center list_of_checkbox">
                <label for="trunk_room" class="label-checkbox-2 mgn-r-6">トランクルーム</label><br>
                <input type="checkbox" id="elevator" name="elevator" value="エレベーター"  class="airconditioner_center list_of_checkbox">
                <label for="elevator" class="label-checkbox-2 mgn-r-6">エレベーター</label><br>
              </div>

            </ul>
          </div>

          <div class="container_building_equip_adjust2">
            <ul class="container_building_equip_ul2">
              <h1 class="l-12__1-05 "><p></p></h1>
              {{-- <div class="container_building_equip_adjust2_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="delivery_box" name="delivery_box" value="宅配ボックス" class="airconditioner_center list_of_checkbox">
                <label for="delivery_box" class="label-checkbox-2 mgn-r-6">宅配ボックス</label><br>
                <input type="checkbox" id="designers" name="designers" value="デザイナーズ" class="airconditioner_center list_of_checkbox">
                <label for="designers" class="label-checkbox-2 mgn-r-6">デザイナーズ</label><br>
                <input type="checkbox" id="reform_history" name="reform_history" value="リフォーム履歴あり" class="airconditioner_center list_of_checkbox">
                <label for="reform_history" class="label-checkbox-2 mgn-r-6">リフォーム履歴あり</label><br>
                <input type="checkbox" id="renovation_history" name="renovation_history" value="リノベーション履歴あり" class="airconditioner_center list_of_checkbox">
                <label for="renovation_history" class="label-checkbox-2 mgn-r-6">リノベーション履歴あり</label><br>
              </div>

            </ul>
          </div>

          <div class="container_building_equip_adjust3">
            <ul class="container_building_equip_ul3">
              <h1 class="l-12__1-05 "><p></p></h1>
              {{-- <div class="container_building_equip_adjust3_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="seismic_isolation" name="seismic_isolation" value="免震・制震・制震構造" class="airconditioner_center list_of_checkbox">
                <label for="seismic_isolation" class="label-checkbox-2 mgn-r-6">免震・制震・制震構造</label><br>
              </div>

            </ul>
          </div>
        </div>

        <div class="nineth_dotted_lines"></div>

        <div class="container_others">
          <div class="container_others_adjust">
            <ul class="container_others_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">その他</span>
              {{-- <div class="container_others_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="administrator" name="administrator" value="分譲タイプ" class="airconditioner_center list_of_checkbox">
                <label for="administrator" class="label-checkbox-2 mgn-r-6">分譲タイプ</label><br>
                <input type="checkbox" id="maisonette" name="maisonette" value="メゾネット" class="airconditioner_center list_of_checkbox">
                <label for="maisonette" class="label-checkbox-2 mgn-r-6">メゾネット</label><br>
                <input type="checkbox" id="free_rent" name="free_rent" value="フリーレント" class="airconditioner_center list_of_checkbox">
                <label for="free_rent" class="label-checkbox-2 mgn-r-6">フリーレント</label><br>
                <input type="checkbox" id="credit_card" name="credit_card" value="クレジットカード決済可" class="airconditioner_center list_of_checkbox">
                <label for="credit_card" class="label-checkbox-2 mgn-r-6">クレジットカード決済可</label><br>
                <input type="checkbox" id="executive" name="executive" value="管理人" class="airconditioner_center list_of_checkbox">
                <label for="executive" class="label-checkbox-2 mgn-r-6">管理人</label><br>
              </div>

            </ul>
          </div>
        </div>

        <div class="tenth_dotted_lines"></div>

        <div class="container_condition">
          <div class="container_condition_adjust">
            <ul class="container_condition_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">条件</span>
              {{-- <div class="container_condition_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="immediate" name="immediate" value="即入居" class="airconditioner_center list_of_checkbox">
                <label for="immediate" class="label-checkbox-2 mgn-r-6">即入居</label><br>
                <input type="checkbox" id="pets_allowed" name="pets_allowed" value="ペット可・相談" class="airconditioner_center list_of_checkbox">
                <label for="pets_allowed" class="label-checkbox-2 mgn-r-6">ペット可・相談</label><br>
                <input type="checkbox" id="musical_instrument" name="musical_instrument" value="楽器可・相談" class="airconditioner_center list_of_checkbox">
                <label for="musical_instrument" class="label-checkbox-2 mgn-r-6">楽器可・相談</label><br>
                <input type="checkbox" id="women_only" name="women_only" value="女性限定" class="airconditioner_center list_of_checkbox">
                <label for="women_only" class="label-checkbox-2 mgn-r-6">女性限定</label><br>
                <input type="checkbox" id="men_only" name="men_only" value="男性限定" class="airconditioner_center list_of_checkbox">
                <label for="men_only" class="label-checkbox-2 mgn-r-6">男性限定</label><br>
                <input type="checkbox" id="students_only" name="students_only" value="学生限定" class="airconditioner_center list_of_checkbox">
                <label for="students_only" class="label-checkbox-2 mgn-r-6">学生限定</label><br>
              </div>

            </ul>
          </div>

          <div class="container_condition_adjust2">
            <ul class="container_condition_ul2">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 "></span>
              <div class="display-flex">
                <input type="checkbox" id="two_people" name="two_people" value="二人入居可" class="airconditioner_center list_of_checkbox">
                <label for="two_people" class="label-checkbox-2 mgn-r-6">二人入居可</label><br>
                <input type="checkbox" id="consultation" name="consultation" value="高齢者可・相談" class="airconditioner_center list_of_checkbox">
                <label for="consultation" class="label-checkbox-2 mgn-r-6">高齢者可・相談</label><br>
                <input type="checkbox" id="foreign" name="foreign" value="外国籍可・相談" class="airconditioner_center list_of_checkbox">
                <label for="foreign" class="label-checkbox-2 mgn-r-6">外国籍可・相談</label><br>
                <input type="checkbox" id="corporate_contracts" name="corporate_contracts" value="法人契約限定" class="airconditioner_center list_of_checkbox">
                <label for="corporate_contracts" class="label-checkbox-2 mgn-r-6">法人契約限定</label><br>
                <input type="checkbox" id="contract_request" name="contract_request" value="法人契約希望" class="airconditioner_center list_of_checkbox">
                <label for="contract_request" class="label-checkbox-2 mgn-r-6">法人契約希望</label><br>
              </div>

            </ul>
          </div>

          <div class="container_condition_adjust3">
            <ul class="container_condition_ul3">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 "></span>
              <div class="display-flex">
                <input type="checkbox" id="office_usage" name="office_usage" value="事務所使用可" class="airconditioner_center list_of_checkbox">
                <label for="office_usage" class="label-checkbox-2 mgn-r-6">事務所使用可</label><br>
              </div>

            </ul>
          </div>
        </div>

        <div class="eleveth_dotted_lines"></div>

        <div class="container_advertising">
          <div class="container_advertising_adjust">
            <ul class="container_advertising_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">広告・AD</span>
              <div class="display-flex">
                <input type="checkbox" id="announcement" name="announcement" value="広告可（要確認含）" class="airconditioner_center list_of_checkbox">
                  <label for="announcement" class="label-checkbox-2 mgn-r-6">広告可（要確認含）</label><br>
                  <div class="alltext_adjust_center">
                    <label class="alltext_adjust" for="all_text">AD</label><br>
                    <input type="text" id="all_text" name="text" class="modal--input-txt">
                    <label for="all_text" class="alltext_adjust">広告可（要確認含）</label><br>
                  </div>
              </div>
            </ul>
          </div>
        </div>

        <div class="container_execute">
          <div class="container_execute_adjust" id="add-info-search" style="cursor: pointer;" data-remodal-action="confirm">
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
<section class="remodal p-remodal--form" data-remodal-id="prefectures_modal">
  <div class="p-modal">
    <div class="p-modal--title">
      <div class="p-index__head__title">
        {{-- Temporary Icon to be replaced --}}
        {{-- <div class="c-image c-image--user"></div> --}}
        {{-- 検索結果一覧 こだわり検索 --}}
      </div>
    </div>
    <div class="container_body">
      <div class="container_search">
        <div class="container_search_adjust">

        </div>
    </div>
    <div class="search_line"></div>
      <div class="container_distribution">
        <div class="container_distribution_container">
          都道府県 選択
        </div>
      </div>
      <div class="container_rain">
            <div class="lbl-txt-01 lbl-txt-01-m0" style="flex-wrap: wrap;">
              @foreach($array['pref'] as $key => $item)
                @if(in_array($item, $selectedPref))
                  <div class="act-cat">
                    <input type="checkbox" checked class="plan-house-type selectPrefecture pref-select" name="prefecture[]"
                      id="prefecture_{{ $key }}" value="{{ $item }}" data-id="{{ $key }}" data-pref="{{ $item }}" hidden>
                    <label for="prefecture_{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                  </div>
                @else
                  <div class="act-cat">
                    <input type="checkbox" class="plan-house-type selectPrefecture pref-select" name="prefecture[]"
                      id="prefecture_{{ $key }}" value="{{ $item }}" data-id="{{ $key }}" data-pref="{{ $item }}" hidden>
                    <label for="prefecture_{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                  </div>
                @endif
              @endforeach
            </div>
            {{-- <button class="c-lbl-white margin--10" id="save_prefecture"for="" type="button" data-remodal-action="confirm">保存</button> --}}
      </div>
      <div class="first_dotted_lines"></div>
  </div>
</section>
{{-- target sites modal --}}
<section class="remodal p-remodal--form" data-remodal-id="target_sites_modal">
  <div class="p-modal">
    <div class="p-modal--title">
      <div class="p-index__head__title">
        {{-- Temporary Icon to be replaced --}}
        {{-- <div class="c-image c-image--user"></div> --}}
        {{-- 検索結果一覧 こだわり検索 --}}
      </div>
    </div>
    <div class="container_body">
      <div class="container_search">
        <div class="container_search_adjust">

        </div>
    </div>
    <div class="search_line"></div>
      <div class="container_distribution">
        <div class="container_distribution_container">
          検索対象サイト
        </div>
      </div>
      <div class="container_rain mgn-t-4">
            <div class="lbl-txt-01 lbl-txt-01-m0" style="flex-wrap: wrap;">
              <div class="l-12 l-12--gap24">
                {{-- {{dd($site_enabled)}} --}}
                @foreach($array['sites'] as $key => $item)
                  {{-- @if(in_array($item, $site_enabled)) --}}
                  @if($key == 0)
                    <div>
                      <label class="cnt">
                        <input class="yellow form_category_type target_select" {{in_array('reins', $site_enabled) ? 'checked' : ''}} type="checkbox" id="reins"  name="site_enabled[]" value="reins">
                        <span class="checkmark"></span>
                        <label for="{{ $item }}">{{$item}}</label>
                      </label>
                    </div>
                  @elseif($key == 1)
                    <div>
                      <label class="cnt">
                        <input class="yellow form_category_type target_select" {{in_array('atbb', $site_enabled) ? 'checked' : ''}} type="checkbox" id="atbb"  name="site_enabled[]" value="atbb">
                        <span class="checkmark"></span>
                        <label for="{{ $item }}">{{$item}}</label>
                      </label>
                    </div>
                  @elseif($key == 2)
                    <div>
                      <label class="cnt">
                        <input class="yellow form_category_type target_select" {{in_array('itandibb', $site_enabled) ? 'checked' : ''}} type="checkbox" id="itandibb"  name="site_enabled[]" value="itandibb">
                        <span class="checkmark"></span>
                        <label for="{{ $item }}">{{$item}}</label>
                      </label>
                    </div>

                  @elseif($key == 3)
                    <div>
                      <label class="cnt">
                        <input class="yellow form_category_type target_select" {{in_array('tokyu', $site_enabled) ? 'checked' : ''}} type="checkbox" id="tokyu"  name="site_enabled[]" value="tokyu">
                        <span class="checkmark"></span>
                        <label for="{{$item}}">{{$item}}</label>
                      </label>
                    </div>
                  @elseif($key == 4)
                    <div>
                      <label class="cnt">
                        <input class="yellow form_category_type target_select" {{in_array('mitsui', $site_enabled) ? 'checked' : ''}} type="checkbox" id="mitsui"  name="site_enabled[]" value="mitsui">
                        <span class="checkmark"></span>
                        <label for="{{ $item }}">{{$item}}</label>
                      </label>
                    </div>
                  @else
                    <div>
                      <label class="cnt">
                        <input class="yellow form_category_type target_select" {{in_array('sumitomo', $site_enabled) ? 'checked' : ''}} type="checkbox" id="sumitomo"  name="site_enabled[]" value="sumitomo">
                        <span class="checkmark"></span>
                        <label for="{{ $item }}">{{$item}}</label>
                      </label>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
      </div>
      <div class="first_dotted_lines"></div>
      <button class="c-lbl-white margin--10" id="save_target_site" for="" type="button" data-remodal-action="confirm">保存</button>
  </div>
</section>
<section class="remodal p-remodal--form" data-remodal-id="selected_prefectures_modal">
  <div class="p-modal">
    <div class="p-modal--title">
      <div class="p-index__head__title">
        {{-- Temporary Icon to be replaced --}}
        {{-- <div class="c-image c-image--user"></div> --}}
        {{-- 検索結果一覧 こだわり検索 --}}
      </div>
    </div>
    <div class="container_body">
      <div class="container_search">
        <div class="container_search_adjust">

        </div>
      </div>
      <div class="search_line"></div>
      <div class="container_distribution">
        <div class="container_distribution_container">
          選択されている都道府県
        </div>
      </div>
      <div class="container_rain" >
        <div id="prefecture_result_container">

        </div>
          {{-- <button class="c-lbl-white margin--10" id="save_cities"for="" type="button" data-remodal-action="confirm">保存</button> --}}
      </div>
  </div>
</section>
@endslot
  @endcomponent

  @include('admin.component._getBatch')
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

    function submitSearch(){
      var test_form =  $('#robore_search_property')
      test_form.submit();
    }


    document.addEventListener('alpine:init', () => {
      Alpine.store('tabs', {
        current: 'first',
        items: [
          {
            label: 'first',
            description: '市区群',
            class: 'tab-active ',
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
          // console.log(parent_id);
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
      $('.clear-btn').on('click',function(){
        $('input[type="text"]').val('')
        $('input[type="hidden"]').val('')
        $('input[type="checkbox"]').prop('checked',false)
        $('#admin_div').hide()
        $('#search-engine').hide()
      })
    })


    function filterResult(data, search_item, query, min, max, top_floor, other_fees, video_data){
      const resultExact = data.filter((item) =>
        search_item.every((key) =>
          query.some((val) => {

            if(key in item){
              return item[key].includes(val)
            }

          })
        )
      );

      if(resultExact.length == 0){
        let resultExactAfterQuery = [];

        if(video_data != undefined && video_data.length != 0){
          video_data.forEach(function(element_video_data){
            //画像あり
            if(element_video_data == "0"){
              data.forEach(function(element_result){
                if(element_result['image_number_gaikan'] != 0){
                  resultExactAfterQuery.push(element_result);
                }
              });
            }

            //図面あり
            if(element_video_data == "1"){

            }

          });
          return resultExactAfterQuery;
        }

        if(other_fees.length != 0){
          other_fees.forEach(function(element_fee){
            // console.log(element_fee);
            //管理・共益費込み
            if(element_fee == "0"){
              data.forEach(function(element_result){
                if(element_result['共益費'] == "-円"){
                  resultExactAfterQuery.push(element_result);
                }
              });
            }

            //礼金なし
            if(element_fee == "1"){
              data.forEach(function(element_result){
                if(element_result['礼金'] == "-"){
                  resultExactAfterQuery.push(element_result);
                }
              });
            }

            //敷金・保証料なし
            if(element_fee == "2"){
              data.forEach(function(element_result){
                // console.log(element_result['敷金']);
                if(element_result['敷金'] == "-"){
                  resultExactAfterQuery.push(element_result);
                }
              });
            }
          });
          return resultExactAfterQuery;
        }

        data.forEach(function(element, index){
          var steps = element['所在階'].split("/");
          const property_step = Number(steps[1].replace("階", ""));
          if(Number(min) <= property_step && property_step <= Number(max)){
            resultExactAfterQuery.push(element);
          }
        });

        let resultExactAfterSteps = [];
        if(top_floor){
          resultExactAfterQuery.forEach(function(element, index){
            var steps = element['所在階'].split("/");
            const max_step = Number(steps[0].replace("階建", ""));
            const property_step = Number(steps[1].replace("階", ""));
            if(property_step == max_step){
              resultExactAfterSteps.push(element);
            }
          });
        }else{
          return resultExactAfterQuery;
        }
        return resultExactAfterSteps;
      }

      return resultExact
    }

    function filterByRange(data, min, max, data_filter){
      const result = data.filter((item) =>
          data_filter.some((key) =>
            min <= parseFloat(
                  item[key].replace(/\,/g, '')
                ) &&
            max >= parseFloat(
                item[key].replace(/\,/g, '')
            )
          )
        )
      return result
    }


    function filterMissingInformation(data, query){
      const resultExactInformation = data.filter((item) =>
        query.some((a) => query.includes(item[a]))
      );

      return resultExactInformation

    }


    var target_select=[]
    $('.target_select').on('click', function(){
      var site_name = $(this).next().next().text()
      var site_selected = $(this).attr('value')
      // site_selected.replace(/\s+/g,'').toLowerCase()
        if($(this).is(':checked')){
          // console.log(site_selected)
          $('#target_sites').append(
            '<span class="mgn-r-3" id="'+ site_selected +'">'+ site_name +'</span>'
            +'<input type="hidden" name="site_enabled[]" value="'+site_name+'">'
            + '<input type="hidden" name="site_enabled[]" class="site_enabled" value="'+ site_selected +'" id="'+ site_selected +'" />'
          )
        }
        else{
          $('#'+ site_selected.replace(/\s+/g,'').toLowerCase()).remove()
        }
    })


    function openTab(el, tableName){
      $('.tabbing.active').toggleClass('active');
      $(el).addClass('active');
      //check tableName
      if(tableName == 'favorites'){
        $('#result_table').hide();
        $('#favorites_table').html('').show();
        favorites.forEach((element) => $('#favorites_table').html($('#favorites_table').html() + element))
        $(el).toggleClass("addFavorite");
        $('#guide_star').addClass("addFavorite");

        // updates stars to checked
        favorites.forEach((el, key) => {
          $(`label[data-favorite-id="${key}"]`).addClass("addFavorite");
        })
      }else{
        $('#favorites_table').hide();
        $('#result_table').show();
        $('#guide_star').removeClass("addFavorite");

      }
      //if tableName = favorites, show favorite table , guide can be checked, generate favorites tables
      //if tableName = result, show result table
    }

    //prefecture select
    $('.pref-select').on('click', function(){
      var val_selected =  $(this).next().text()
        if($(this).is(':checked')){
          $('#selected-item-pref').append(
            '<span class="mgn-r-3" id="'+ val_selected +'">'+ val_selected + '</span>'
            +'<input type="hidden" name="prefectures[]" value="'+ val_selected +'" id="'+ val_selected +'"/>')
        }
        else{
         $('#'+val_selected).remove()
        }

    })

  let sites = JSON.parse('<?php if(isset($siteArray)){ echo $siteArray; }else{ echo ""; } ?>')
  let search_parameters = JSON.parse('<?php if(isset($siteParams)){ echo $siteParams; }else{ echo ""; } ?>')
  let result_table = []
  let first_ten_table = []
  $('#paginate_result').hide()

  // For First Ten Request
  if(['tokyu', 'mitsui', 'itandibb'].includes(sites[0])){
    loopedBuffer(0, search_parameters, first_results = true)
  }else{
    $.ajax({
      type : 'POST',
      //url : '{{ route('storeAdmin.search.firstTenResults') }}',
      // url : `http://localhost:8080/api/${sites[0]}/search_property`,
      //url : `https://10.0.2.43:80/api/${sites[0]}/search_property`,
      url : "{{ route('api.flask.search_scraping') }}",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      data: {
        "site" : sites[0],
        "search_parameters" : JSON.stringify(search_parameters),
        "first_ten" : true,
        "user_id" : "{{ auth()->guard('account')->user()->id }}"
      }
    }).done((res) => {

      if(res['status'] == 500){
        // alert(config('const.site_to_jp')[sites[0]] + 'のログイン情報が正しくありません。設定したIDパスワードをご確認ください。');
        loopedBuffer(0, search_parameters);
      }
      else{

        var data = res['payload']

        if(data != null && sites[0] != 'atbb'){
          data = newFilterGroup(data, search_parameters)
        }

        const d = search_parameters['publishing_date'];
        var trade = undefined;
        var combine = undefined
        var routes_clicked = undefined;
        var airconditioner_clicked = undefined;

        //routes
        if(search_parameters['routes'] != undefined){
          routes_clicked = []
          routes_clicked = search_parameters['routes'].toString();
        }

        //air condition
        if(search_parameters['airconditioner_center'] != undefined){
          airconditioner_clicked = []
          airconditioner_clicked = search_parameters['airconditioner_center'];
        }
        //trade_style
        if(search_parameters['trade_style'] != undefined) {
          trade = []
          trade = search_parameters['trade_style'].toString();
        }

        // if step_min is empty, setting min value -50
        var min;
        if (search_parameters['step_min'] != undefined) {
          min = search_parameters['step_min'];
        }else{
          min = -50;
        }

        // if step_max is empty, setting max value 1000
        var max;
        if (search_parameters['step_max'] != undefined) {
          max = search_parameters['step_max'];
        }else{
          max = 1000;
        }

        // want top floor
        var top_floor = false;
        if (search_parameters['floor_option'] == "top_floor") {
          top_floor = true;
        }


        const keysExact   = ['取引態様', '情報掲載日', '沿線駅'];
        const valuesExact   = [trade, d, routes_clicked];

        const fee_min = search_parameters['fee_min']
        const fee_max = search_parameters['fee_max']

        var keyExactInfomration = ['設備'];
        var valueExactInformation = airconditioner_clicked;
        // const keyExactInfomration = ['設備'];
        // const valueExactInformation = ['エアコン/冷蔵庫あり/バルコニー/フローリング/オートロック/エレベーター/インターネット接続可/インターネット(CATV)/BSアンテナ/管理人(巡回)/IHコンロ'];

        var filterblah
        var filterRange
        var filterMissingInformationSearch

        if(trade != undefined || d != null  || min != -50 || max != 1000 || top_floor || search_parameters['other_fees'] != undefined || search_parameters['video_data'] != undefined){
          filterblah = filterResult(data, keysExact, valuesExact, min, max, top_floor, search_parameters['other_fees'], search_parameters['video_data'])
          // filterblah = filterMissingInformation(keyExactInfomration, valueExactInformation);
          // then filter by range
          if(fee_min != null || fee_max != null ){
            filterRange = filterByRange(filterblah, fee_min, fee_max, ['共益費'])

            $.ajax({
              type : 'POST',
              url : '{{ route('storeAdmin.search.tempResults') }}',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              },
              contentType: 'application/json;charset=UTF-8',
              dataType: 'json',
              data : JSON.stringify({
                'payload' : JSON.stringify(filterRange)
              })
            }).done((result) => {

              result_count = 0;
              if(search_parameters['bldg_structure'] != undefined){
                search_parameters['bldg_structure'].forEach(function(structure){
                  result['tables'].forEach(function(table){
                    // console.log(table);
                    if(table.includes(structure)){
                      first_ten_table = first_ten_table.concat(table);
                      result_count = result_count + 1;
                    }
                  });
                });
              }

              if(search_parameters['free_word'] != null){
                result['tables'].forEach(function(table){
                  if(table.includes(search_parameters['free_word'])){
                    first_ten_table = first_ten_table.concat(table);
                    result_count = result_count + 1;
                  }
                });
              }

              if(search_parameters['property_name'] != null){
                result['tables'].forEach(function(table){
                  if(table.includes(search_parameters['property_name'])){
                    first_ten_table = first_ten_table.concat(table);
                    result_count = result_count + 1;
                  }
                });
              }

              if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
                first_ten_table = first_ten_table.concat(result['tables']);
                result_count = result['count'];
              }

              // Update
              firstTenResults(result, result_count)
              updateSiteCount(sites[0], result_count);
              if(result_count > 10){
                $('#paginate_result').show()
              }
            })
          }

          // First 10
          $.ajax({
              type : 'POST',
              url : '{{ route('storeAdmin.search.tempResults') }}',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              },
              contentType: 'application/json;charset=UTF-8',
              dataType: 'json',
              data : JSON.stringify({
                'payload' : JSON.stringify(filterblah)
              })
            }).done((result) => {

              result_count = 0;
              if(search_parameters['bldg_structure'] != undefined){
                search_parameters['bldg_structure'].forEach(function(structure){
                  result['tables'].forEach(function(table){
                    // console.log(table);
                    if(table.includes(structure)){
                      first_ten_table = first_ten_table.concat(table);
                      result_count = result_count + 1;
                    }
                  });
                });
              }

              if(search_parameters['free_word'] != null){
                result['tables'].forEach(function(table){
                  if(table.includes(search_parameters['free_word'])){
                    first_ten_table = first_ten_table.concat(table);
                    result_count = result_count + 1;
                  }
                });
              }

              if(search_parameters['property_name'] != null){
                result['tables'].forEach(function(table){
                  if(table.includes(search_parameters['property_name'])){
                    first_ten_table = first_ten_table.concat(table);
                    result_count = result_count + 1;
                  }
                });
              }

              if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
                first_ten_table = first_ten_table.concat(result['tables']);
                result_count = result['count'];
              }

              // Update
              firstTenResults(result, result_count)
              updateSiteCount(sites[0], result_count);
              if(result_count > 10){
                $('#paginate_result').show()
              }
            })
        }
        if(routes_clicked != undefined){
          // First 10
                $.ajax({
                    type : 'POST',
                    url : '{{ route('storeAdmin.search.tempResults') }}',
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    contentType: 'application/json;charset=UTF-8',
                    dataType: 'json',
                    data : JSON.stringify({
                      'payload' : JSON.stringify(res['payload'])
                    })
                  }).done((result) => {
                    result_count = 0;
                    if(search_parameters['bldg_structure'] != undefined){
                      search_parameters['bldg_structure'].forEach(function(structure){
                        result['tables'].forEach(function(table){
                          // console.log(table);
                          if(table.includes(structure)){
                            first_ten_table = first_ten_table.concat(table);
                            result_count = result_count + 1;
                          }
                        });
                      });
                    }

                    if(search_parameters['free_word'] != null){
                      result['tables'].forEach(function(table){
                        if(table.includes(search_parameters['free_word'])){
                          first_ten_table = first_ten_table.concat(table);
                          result_count = result_count + 1;
                        }
                      });
                    }

                    if(search_parameters['property_name'] != null){
                      result['tables'].forEach(function(table){
                        if(table.includes(search_parameters['property_name'])){
                          first_ten_table = first_ten_table.concat(table);
                          result_count = result_count + 1;
                        }
                      });
                    }

                    if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
                      first_ten_table = first_ten_table.concat(result['tables']);
                      result_count = result['count'];
                    }

                    // Update
                    firstTenResults(result, result_count)
                    updateSiteCount(sites[0], result_count);
                    if(result_count > 10){
                      $('#paginate_result').show()
                    }
                  })

                  loopedBuffer(0, search_parameters)
            }else{
              $.ajax({
                    type : 'POST',
                    url : '{{ route('storeAdmin.search.tempResults') }}',
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    contentType: 'application/json;charset=UTF-8',
                    dataType: 'json',
                    data : JSON.stringify({
                      'payload' : JSON.stringify(data)
                    })
                  }).done((result) => {

                    result_count = 0;
                    if(search_parameters['bldg_structure'] != undefined){
                      search_parameters['bldg_structure'].forEach(function(structure){
                        result['tables'].forEach(function(table){
                          // console.log(table);
                          if(table.includes(structure)){
                            first_ten_table = first_ten_table.concat(table);
                            result_count = result_count + 1;
                          }
                        });
                      });
                    }

                    if(search_parameters['free_word'] != null){
                      result['tables'].forEach(function(table){
                        if(table.includes(search_parameters['free_word'])){
                          first_ten_table = first_ten_table.concat(table);
                          result_count = result_count + 1;
                        }
                      });
                    }

                    if(search_parameters['property_name'] != null){
                      result['tables'].forEach(function(table){
                        if(table.includes(search_parameters['property_name'])){
                          first_ten_table = first_ten_table.concat(table);
                          result_count = result_count + 1;
                        }
                      });
                    }

                    if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
                      first_ten_table = first_ten_table.concat(result['tables']);
                      result_count = result['count'];
                    }

                    // Update
                    firstTenResults(result, result_count)
                    updateSiteCount(sites[0], result_count);
                    if(result_count > 10){
                      $('#paginate_result').show()
                    }
                  })

                  loopedBuffer(0, search_parameters)
            }


            if(airconditioner_clicked != undefined){
              filterMissingInformationSearch = filterMissingInformation(keyExactInfomration, valueExactInformation);

              $.ajax({
              type : 'POST',
              url : '{{ route('storeAdmin.search.tempResults') }}',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              },
              contentType: 'application/json;charset=UTF-8',
              dataType: 'json',
              data : JSON.stringify({
                'payload' : JSON.stringify(filterMissingInformationSearch)
              })
              }).done((result) => {

                result_count = 0;
                if(search_parameters['bldg_structure'] != undefined){
                  search_parameters['bldg_structure'].forEach(function(structure){
                    result['tables'].forEach(function(table){
                      // console.log(table);
                      if(table.includes(structure)){
                        first_ten_table = first_ten_table.concat(table);
                        result_count = result_count + 1;
                      }
                    });
                  });
                }

                if(search_parameters['free_word'] != null){
                  result['tables'].forEach(function(table){
                    if(table.includes(search_parameters['free_word'])){
                      first_ten_table = first_ten_table.concat(table);
                      result_count = result_count + 1;
                    }
                  });
                }

                if(search_parameters['property_name'] != null){
                  result['tables'].forEach(function(table){
                    if(table.includes(search_parameters['property_name'])){
                      first_ten_table = first_ten_table.concat(table);
                      result_count = result_count + 1;
                    }
                  });
                }

                if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
                  first_ten_table = first_ten_table.concat(result['tables']);
                  result_count = result['count'];
                }

                // Update
                //result_table = result_table.concat(result['tables'])
                firstTenResults(result, result_count)
                // updateSiteCount(sites[0], result['count']);
                updateSiteCount(sites[0], result_count);
                if(result_count > 10){
                  $('#paginate_result').show()
                }
              })

              // loopedBuffer(0, search_parameters)
            }
                // else {
        //   // filterblah = res['payload']




        //   // if('payload' in res && res['payload'].length > 0){



        //   // }
        // }
      }

    }).fail((error) => {
      // console.log(error.responseText)
    })
  }

  var total_count = 0
  var page_count = 1
  var current_count = []

  function firstTenResults(result, result_count = 0){
    $('#spinner').show()
    // Update Total Count
    total_count = result_count
    $('#total_count').html(total_count)
    // Update Current Count
    current_table =  first_ten_table.slice(((page_count - 1) * 10), 10)
    // Update Table
    current_table.forEach((element) => $('#result_table').html($('#result_table').html() + element))
    $('#spinner').hide()

  }

  // Pagination
  $('#paginate_result').pagination({
    // Temporary Static Max Val for Pagination
    dataSource : "{{ route('storeAdmin.search.pagination') }}",
    locator: "result_table",
    totalNumberLocator: function(response) {
      // you can return totalNumber by analyzing response content
      return response.total_count
    },
    prevText: '>',
    nextText: '>',
    autoHidePrevious: true,
    autoHideNext: true,
    showPageNumbers: false,
    showNavigator: true,
    formatNavigator: '<%= currentPage %>',
    position:'center',
    callback: function(data, pagination) {
        if(first_ten_table.length != 0){
          if(first_ten_table.slice(((pagination.pageNumber - 1) * 10), ((pagination.pageNumber * 10))).length > 0){
            // Pagination Update
            $('#spinner').show()
            $('#result_table').html('')
            // Update Current Count
            current_table =  first_ten_table.slice(((pagination.pageNumber - 1) * 10), ((pagination.pageNumber * 10)))
            // Update Table
            current_table.forEach((element) => $('#result_table').html($('#result_table').html() + element))
            $('#spinner').hide()
          }
        }else{
          if (result_table.slice(((pagination.pageNumber - 1) * 10), ((pagination.pageNumber * 10))).length > 0){
              // Pagination Update
              $('#spinner').show()
              $('#result_table').html('')
              // Update Current Count
              current_table =  result_table.slice(((pagination.pageNumber - 1) * 10), ((pagination.pageNumber * 10)))
              // Update Table
              current_table.forEach((element) => $('#result_table').html($('#result_table').html() + element))
              $('#spinner').hide()

              // Check all Favorites
              favorites.forEach((el, key) => {
                $(`label[data-favorite-id="${key}"]`).addClass("addFavorite");
              })

          }else{
            $('#spinner').show()
            $('#result_table').html('')
          }
        }

        if(pagination.pageNumber == 1){
          $('.paginationjs-nav.J-paginationjs-nav').addClass('mgn-l-0').removeClass('mgn-l-18')
        }else{
          $('.paginationjs-nav.J-paginationjs-nav').removeClass('mgn-l-0').addClass('mgn-l-18')
        }
      }
  })

  var favorites = [];
  var a = [];
  function addToFavorite(el, key){
    var is_active = $(el).hasClass('addFavorite')

    if(!is_active){
      $(el).addClass("addFavorite");
      favorites[key] = result_table[key];
    }else if(is_active && favorites.includes(result_table[key])){
      $(el).removeClass("addFavorite");
      favorites.splice(favorites.indexOf(result_table[key]), 1);
    }

  }

  function updateSiteCount(site_name, result_count){
    $(`#${site_name}`).html(parseInt($(`#${site_name}`).html()) + result_count);
  }

  function loopedBuffer(order, search_parameters, first_results = false){
    if (sites.length == order) {
      if(result_table.length == 0){
        $('#spinner').hide()
        $('#paginate_result').hide()
      }
      return;
    }

    site = sites[order]
    //if(site == 'tokyu'){
    if(['tokyu', 'mitsui', 'itandibb'].includes(site)){
      // console.log(search_parameters)
      setBatch(search_parameters, site, first_results)
      loopedBuffer(++order, search_parameters)
    }else{


      $.ajax({
        type : 'POST',
        // url : `http://localhost:8080/api/${site}/search_property`,
        url : "{{ route('api.flask.search_scraping') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: {
          "site" : site,
          "search_parameters" : JSON.stringify(search_parameters),
          "user_id" : "{{ auth()->guard('account')->user()->id }}"
        },
        success: function(res){

          updateSiteCount(site, 'payload' in res ? res['payload'].length : 0)
          alert_site = '';

          if(site == 'tokyu'){
            alert_site = '東急住宅リース';
          }else if (site == 'mitsui'){
            alert_site = '三井不動産レジデンシャルリース';
          }else if (site == 'sumitomo'){
            alert_site = '住友不動産';
          }else if (site == 'atbb'){
            alert_site = 'atBB';
          }else if (site == 'itandibb'){
            alert_site = 'イタンジ';
          }else if (site == 'reins'){
            alert_site = 'レインズ';
          }


          if(res['status'] == 500){
            $('#spinner').hide();
            alert(alert_site + 'のログイン情報が正しくありません。設定したIDパスワードをご確認ください。');
          }

          // Check if empty results
          if('payload' in res && res['payload'].length > 0){
            data = res['payload']

            if(data != null && site != 'atbb'){
              data = newFilterGroup(data, search_parameters)
            }
            updateSiteCount(site, data.length)
            // Clear First Ten Results
            first_ten_table = []

            $.ajax({
              type : 'POST',
              url : '{{ route('storeAdmin.search.tempResults') }}',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              contentType: 'application/json;charset=UTF-8',
              dataType: 'json',
              data : JSON.stringify({
                'payload' : JSON.stringify(data)
              })
            }).done((result) => {

              result_count = 0;
              if(search_parameters['bldg_structure'] != undefined){
                search_parameters['bldg_structure'].forEach(function(structure){
                  result['tables'].forEach(function(table){
                    if(table.includes(structure)){
                      result_table = result_table.concat(table);
                      result_count = result_count + 1;
                    }
                  });
                });
              }

              if(search_parameters['free_word'] != null){
                result['tables'].forEach(function(table){
                  if(table.includes(search_parameters['free_word'])){
                    result_table = result_table.concat(table);
                    result_count = result_count + 1;
                  }
                });
              }

            if(search_parameters['property_name'] != null){
              result['tables'].forEach(function(table){
                if(table.includes(search_parameters['property_name'])){
                  result_table = result_table.concat(table);
                  result_count = result_count + 1;
                }
              });
            }

            if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
              if(result_table.length > 10 ){
                result_table = result_table.concat(result['tables'])
              }else{
                result_table = result['tables']
                result_count = result['count']
              }
            }

            if(result_table.length > 10){
              $('#paginate_result').show()
            }else if(result_table.length <= 10){
              $('#result_table').html('')
              result_table.forEach((element) => $('#result_table').html($('#result_table').html() + element))
            }

            $('#total_count').html(result_count)
            })
          }
        },
        error: function(error){
          // console.log(error.responseText)
        },
        complete: function(){

          loopedBuffer(++order, search_parameters)
        }

      })
    }
  }
  //step1 toggle arrow
  $(document).ready(function(){
    $(".step1_clickable").click(function(){
      $(".step-body").toggle("slow");
      $(".stepper").toggleClass("stepper_bottom_none");
      $(".path_138-st").toggleClass("click_active")
    });
  });
  //sample table toggle arrow
  $(document).ready(function(){
      $(".tbl_clickable").click(function(){
        $(".step-body_2").toggle("slow");
        $(".stepper-tbl").toggleClass("stepper_bottom_none");
        $(".path_138-tbl").toggleClass("click_active")
      });
    });
  $('#result_search').on('click', function(){
    $('#all_text').val('')
    $('.list_of_checkbox').prop('checked', false); // Unchecks it
    $('#appended_data_search').remove()
  })

  $('#add-info-search').on('click', function(){
    $('#appended_data_search').remove()

    $('#aircondition').append(
      '<div id="appended_data_search">'
      +'</div>'
    )
    const array = [
      // "kitchen_center",
      // "toilent_center",
      "airconditioner_center",
      // "security_center",
      // "storage_center",
      // "comfortable_center",
      // "building_equip_center",
      // "others_center",
      // "condition_center",
      // "advertising_center",
      "site_enabled"
    ]
    $.each( array, function( key, value ) {

      $(`.${value}`).each(function(){
        if(this.checked){
          $('#appended_data_search').append(
            '<input type="text" id="'+ $(this).attr('id') +'" name="'+value+'[]" value="'+ $(this).attr('value') +'"/>'
          )
        }
        if(value == 'advertising_center'){
          if($(this).attr('id') == 'all_text'){
            if($(this).val()){
              $('#appended_data_search').append(
                '<input type="hidden" id="'+ $(this).attr('id') +'" name="'+value+'[]" value="'+ $(this).val() +'"/>'
              )
            }
          }
        }
      });
    });
  })

  $('.saveSearch').on('click', function(){

    let bldg_struct = []
    let plan_of_house = []
    let sites = []
    let trade_style = []
    let video_data = []
    let site_ids
    let bldg_ids
    let bldgs = []
    let area_min = $('input[name=area_min]').val()
    let area_max = $('input[name=area_max]').val()

    let property_name = $('input[name=property_name]').val()
    let fee_min = $('input[name=fee_min]').val()
    let fee_max = $('input[name=fee_max]').val()
    let town = $('input[name=town]').val()
    let keyWord = $('input[name=free_word]').val()
    let pub_date = $('input[name=publishing_date]').val()
    let from_station = $('input[name=from_station]').val()
    let start_build = $('input[name=year_build_min]').val()
    let end_build = $('input[name=year_build_max]').val()

    $('.bldg_struct').each(function()
    {
        if($(this).is(':checked'))
          bldg_struct.push($(this).attr('data-id'))
    });

    $('.plan-house-type').each(function()
    {
        if($(this).is(':checked'))
        plan_of_house.push($(this).attr('data-id'))
    });

    $('.trade_style').each(function()
    {
        if($(this).is(':checked'))
        trade_style.push($(this).val())
    });

    $('.slct_video_data').each(function()
    {
        if($(this).is(':checked'))
        video_data.push($(this).val())
    });


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
        'station': from_station ?? '',
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
        'building_structure' : bldg_struct[0],
        'plan_of_house': plan_of_house[0],
        'publishing_date': pub_date,
        'drawing_flag' : video_data[0] == 1 ? 1 : 0,
        'image_flag' : video_data[0] == 0 ? 1 : 0,
        'trade_style' : parseInt(trade_style[0]),
      },success: function(data){
        alert('検索条件を保存しました。')
      },error: function(data){
      }
    })
  })
  //toggle object-type
  $('#object-type').on('click', function(){
    if(this.checked){
      $(".object-type").each(function() {
        this.checked=true;
      });
    }
    else{
      $(".object-type").each(function() {
        this.checked=false;
      });
    }
  })
   //toggle material-type
   $('#leasing-material').on('click', function(){
    if(this.checked){
      $(".leasing-material").each(function() {
        this.checked=true;
      });
    }
    else{
      $(".leasing-material").each(function() {
        this.checked=false;
      });
    }
  })
  //toggle video data
  $('#data-1').click(function(){
    if($('#data-1').hasClass('c-lbl-white')){
      $('#data-1').removeClass('c-lbl-white')
      $('#data-1').addClass('c-lbl-green')
    }
    else {
      $('#data-1').removeClass('c-lbl-green')
      $('#data-1').addClass('c-lbl-white')
    }
  });
  $('#data-2').click(function(){
    if($('#data-2').hasClass('c-lbl-white')){
      $('#data-2').removeClass('c-lbl-white')
      $('#data-2').addClass('c-lbl-green')
    }
    else {
      $('#data-2').removeClass('c-lbl-green')
      $('#data-2').addClass('c-lbl-white')
    }
  });
   //toggle image-type
   $('#data-1').on('click', function(){
    if(this.checked){
      $(".image_on").each(function() {
        this.checked=true;
      });
    }
    else{
      $(".image_on").each(function() {
        this.checked=false;
      });
    }
  })
   //toggle drawing-type
   $('#data-2').on('click', function(){
    if(this.checked){
      $(".drawing_on").each(function() {
        this.checked=true;
      });
    }
    else{
      $(".drawing_on").each(function() {
        this.checked=false;
      });
    }
  })

  //toggle building structures

  $('#bldg_struct').on('click', function(){
    if(this.checked){
      $(".bldg_struct").each(function() {
        this.checked=true;
      });
    }
    else{
      $(".bldg_struct").each(function() {
        this.checked=false;
      });
    }
  })

  $(function(){
    $('#closeModal').on('click', function(){
      alert('close');
    })
  });



  </script>

@endsection
