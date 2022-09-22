@php
  $array = config('const');
  $data_colors = ["#003a16","#fff",];
@endphp


@extends('store.layouts.layout-store-home')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
@slot('body')
<div class="c-contianer-box_2 width-full">
  <div class="box-data">
    <!-- <div class=" input--calendar mgn-5">
      <label class="cont-alert" for="">
        <p>ここに、必要な時にシステム的なレコメンドやアラートが表示。なければ本エリアは無くなり、全体が上にあがる。</p>
        <span class="c-x-mark"></span>
      </label>
    </div> -->
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
          <div class="c-container-content">
            <div class="stepper-container mgn-l-4 mgn-r-4">
              <div class="stepper c-stepper-storeHome c_stepper_border_adjust ">
                <div class="step-header">
                  <div class="step-desc" x-data="">
                    <div class="step-title" x-show="$store.steps.current == 'step1'">
                      使い方 Step1
                    </div>
                    <div class="" x-show="$store.steps.current == 'step2'" style="display: none;">
                      使い方 Step2
                    </div>
                  </div>
                  <i class="fa-solid path_138 step1_clickable"></i>
                </div>
                <div class="step-body">
                  <ul x-data="">
                    <li class="mgn-l-4 step-subhead fnt-adjust">
                      検索元となる物件流通サイトにより検索条件が異なるため、ロボレでは次の方法にて一括検索ができます。
                    </li>
                    <li>
                      <div class="l-12 l-12--gap24 mgn-l-4">
                        <div class="step-info_mark">
                          Step1
                        </div>
                        <div class="l-12__6 margin-left--15">
                          この画面にて、 各業者間流通で共通の項目で検索します。
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="l-12 l-12--gap24 mgn-l-4">
                        <div class="step-info_mark">
                          Step2-1
                        </div>
                        <div class="l-12__6 ">
                          検索結果画面にて、 気になる物件の詳細画面を別ウィンドウで見れます。
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="l-12 l-12--gap24 mgn-l-4">
                        <div class="step-info_mark">
                          Step2-2
                        </div>
                        <div class="l-12__6 ">
                          検索結果画面にて、 気になる物件を選び、検索条件を追加して絞込み検索ができます。
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="step-result" x-data="">
              <form action="{{ route('storeAdmin.search.list') }}" method="POST" id="robore_search_property" style="margin-bottom: 30px;">
                @csrf
                <div class="" x-show="$store.steps.current == 'step1'">
                  <div class="search-result-01 search-result-01-pad0">
                    <div class="conditions">
                      <div class="cond-display">
                        <span class="cnd-01 adjust_cnd-01">保存した条件を下記の検索項目に入力</span>
                        <select class="keep-slct-01 width-400 mgn-l-4" name="" id="">
                          @foreach($search_name as $search)
                          <option value="{{ $search->search_name }}">{{ $search->search_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="c-list-fields display_inline checkbox mgn-b-3">


                      <div class="c-guide " style="padding:initial !important;display: flex;flex-direction: column;text-align: center;">
                        <span>ガイド</span>
                      </div>
                    <div class="data-info-01 width-full">
                    <div class="l-12 brd-tlr brd-blr">
                      <div class="l-12__1-03 text-input__label brd-tlr brd-blr">
                        <div class="lbl-txt mgn-2 pdg-small ">
                          <label class="label-text-store" for="">検索対象サイト </label>
                        </div>
                      </div>
                      <div class="l-12__9 mgn-l-4 mgn-t-3">
                        <div class="l-12 l-12--gap24">

                          @foreach($target as $item)
                            @if($item->site_id == 0)
                              @foreach($scraping_accounts as $account)
                                @if($account->site_id == $item->site_id)
                                  <div >
                                    <div>
                                      <label class="cnt">
                                        <input class="yellow form_category_type" type="checkbox" id="reins"  name="site_enabled[]" value="reins">
                                        <span class="checkmark"></span>
                                        <label for="reins">レインズ</label>
                                      </label>
                                    </div>
                                  </div>
                                @endif
                              @endforeach
                            @endif
                          @endforeach

                          @foreach($target as $item)
                            @if($item->site_id == 1)
                              @foreach($scraping_accounts as $account)
                                @if($account->site_id == $item->site_id)
                                  <div >
                                    <div>
                                      <label class="cnt">
                                        <input class="yellow form_category_type" type="checkbox" id="atbb"  name="site_enabled[]" value="atbb">
                                        <span class="checkmark"></span>
                                        <label for="atbb">at BB</label>
                                      </label>
                                    </div>
                                  </div>
                                @endif
                              @endforeach
                            @endif
                          @endforeach

                          @foreach($target as $item)
                            @if($item->site_id == 2)
                              @foreach($scraping_accounts as $account)
                                @if($account->site_id == $item->site_id)
                                  <div >
                                    <div>
                                      <label class="cnt">
                                        <input class="yellow form_category_type" type="checkbox" id="itandibb"  name="site_enabled[]" value="itandibb">
                                        <span class="checkmark"></span>
                                        <label for="itandibb">イタンジ</label>
                                      </label>
                                    </div>
                                  </div>
                                @endif
                              @endforeach
                            @endif
                          @endforeach

                          @foreach($target as $item)
                            @if($item->site_id == 3)
                              @foreach($scraping_accounts as $account)
                                @if($account->site_id == $item->site_id)
                                  <div >
                                    <div>
                                      <label class="cnt">
                                        <input class="yellow form_category_type" type="checkbox" id="tokyu"  name="site_enabled[]" value="tokyu">
                                        <span class="checkmark"></span>
                                        <label for="tokyu">東急住宅リース</label>
                                      </label>
                                    </div>
                                  </div>
                                @endif
                              @endforeach
                            @endif
                          @endforeach

                          @foreach($target as $item)
                            @if($item->site_id == 4)
                              @foreach($scraping_accounts as $account)
                                @if($account->site_id == $item->site_id)
                                  <div >
                                    <div>
                                      <label class="cnt">
                                        <input class="yellow form_category_type" type="checkbox" id="mitsui"  name="site_enabled[]" value="mitsui">
                                        <span class="checkmark"></span>
                                        <label for="mitsui">三井不動産レジデンシャルリース</label>
                                      </label>
                                    </div>
                                  </div>
                                @endif
                              @endforeach
                            @endif
                          @endforeach

                          @foreach($target as $item)
                            @if($item->site_id == 5)
                              @foreach($scraping_accounts as $account)
                                @if($account->site_id == $item->site_id)
                                  <div >
                                    <div>
                                      <label class="cnt">
                                        <input class="yellow form_category_type" type="checkbox" id="sumitomo"  name="site_enabled[]" value="sumitomo">
                                        <span class="checkmark"></span>
                                        <label for="sumitomo">住友不動産</label>
                                      </label>
                                    </div>
                                  </div>
                                @endif
                              @endforeach
                            @endif
                          @endforeach

                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  @if ($errors->has('site_enabled'))
                  <span class="error_checkbox">{{ $errors->first('site_enabled') }}</span>
                  @endif


                  <div class="c-list-fields display-inline-flex">
                    <div class="l-12  margin-bottom-01 ">
                      <div class="mandatory-flex">必須</div>
                      <div class="l-12__11 justify_content--center ">
                        <span class="mandatory-txt adjust_mandatory_txt">「物件種目」 と 「都道府県」を選択してください。それぞれ複数選択可能です。
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="c-list-fields mgn-b-3">
                    <div class="data-info-01">
                    <div class="l-12 border-btm">
                      <div class="guide brd-tlr">
                        <div class="path_595">
                          <span class="tooltiptext">
                            【{{ $guide[0]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[0]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                        </div>
                      </div>
                      <div class="l-12__1-03 text-input__label display_inline--flex">
                        <div class="lbl-txt-01 lbl-txt-01-m0 ">
                          <label class="mgn-t-2-label">物件種目 </label>
                            <div class="mgn-checkbox">
                              <input type="checkbox" id="selectAll_object_type" hidden>
                              <label for="selectAll_object_type" class="c-lbl-white vd_dt_typ">ALL</label>
                            </div>
                        </div>
                      </div>
                      <div class="l-12__9 display_inline--flex self-center"style="margin-top: 5px;">
                        <div class="l-12 l-12--gap24 mgn-l--17">
                          @foreach ($array['object_type'] as $key => $item)
                            <div class="lbl-txt-01 lbl-txt-01-m0">
                              <div class="act-cat">
                                <input type="checkbox" class="object-type" value="{{ $item }}" name="object_type[]" id="object-type-{{ $key }}" hidden>
                                <label for="object-type-{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="l-12">
                      <div class="guide brd-blr">
                        <div class="path_595">
                          <span class="tooltiptext">
                            【{{ $guide[1]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[1]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                        </div>
                      </div>

                      <div class="container_search l-12__1-03 text-input__label display_inline--flex">
                            <div class="container_search act-cat c-rounded_header">
                              <a class="w-per-17 c-lbl-white margin--10" data-remodal-target="prefectures_modal">都道府県 選択</a>
                            </div>
                        {{--  <button class="c-lbl-white margin--10" for="">都道府県 選択</button>  --}}
                      </div>
                      <div class="l-12__9 display_inline--flex">

                        <div class="l-12 l-12--gap24 mgn-l--17" id="modal_data">

                          {{-- @foreach ($array['prefectures'] as $key => $item)
                            <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                              <div class="act-cat">
                                <input type="checkbox" value="{{ $item }}" name="prefectures[]" id="prefecture_{{ $key }}" hidden>
                                <label for="prefecture_{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                              </div>
                            </div>
                          @endforeach --}}

                        </div>
                        {{--  <input type="hidden" value="" name="prefectures[]" class="prefecture_list" >
                        <input type="hidden" value="" name="prefectures[]" class="prefecture_list" >
                        <input type="hidden" value="" name="prefectures[]" class="prefecture_list" >  --}}
                      </div>
                    </div>
                    </div>

                    @if ($errors->has('prefectures'))
                    <span class="error_checkbox">{{ $errors->first('prefectures') }}</span>
                    @endif
                  </div>

                  <div class="c-list-fields display-inline-flex">
                    <div class="l-12 margin-bottom-01 ">
                      <div class="mandatory-flex">必須</div>
                      <div class="l-12__9 justify_content--center ">
                        <span class="mandatory-txt adjust_mandatory_txt">『路線』 か 『市区群』のどちらかを選択し、検索条件を入力してください。（両方を使った検索はできません）</span>
                      </div>
                      </div>
                  </div>

                  <div class="c-list-fields">
                    <div class="data-info-01">
                    <div class="l-12 border-btm items-center">
                      <div class="guide brd-tlr">
                        <div class="path_595">
                          <span class="tooltiptext">
                            【{{ $guide[2]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[2]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                        </div>
                      </div>
                      <div class="l-12__1-03 text-input__label-01">
                        <a class="c-lbl-white margin--10" for="" data-remodal-target="routes_modal" >路線 選択</a>
                        <a class="c-lbl-white margin--10 opacity-05 stationModal" >駅 選択</a>
                      </div>
                      <div class="l-12__9 display_inline--flex ">
                        <div class="l-12 mgn-l--17 mgn-t-1" id="routes_choosen">
                        {{-- <div class="l-12 mgn-l-2" id="routes_selected"> --}}
                          <span class="display-txt-02">路線を選択する場合は、左のボタンをクリックして選択ください。</span>
                          {{-- <span class="display-txt-03">駅を選択する場合は、先に路線を選択ください。（1回の検索で3か所まで。山手線で「東京～品川」）などの範囲指定も1か所計算。</span> --}}
                        </div>
                        <div class="l-12 mgn-l-2" id="station_choosen">
                        </div>
                      </div>
                    </div>

                    <div class="l-12 ">
                      <div class="guide brd-blr">
                        <div class="path_595">
                          <span class="tooltiptext">
                            【{{ $guide[3]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[3]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                        </div>
                      </div>
                      <div class="l-12__1-03 text-input__label">
                        <div class="lbl-txt mgn-2">
                          <label class="label-text-store-2">駅からの徒歩</label>
                        </div>
                      </div>
                      <div class="l-12__9 display_inline--flex mgn-l-4 self-center">
                        <div class="l-12 l-12--gap24 mgn_-10">
                          <div class="l-12__4">
                            <div class="c-input-01 c-input--full display-inline--flex">
                              <input type="number" name="from_station" placeholder="" style="border: 1px solid #A8A8A8; border-radius: 5px; margin-top: -2px;">
                                <span class="display-txt-01">分以内</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    {{--  @if ($errors->has('routes') && !$errors->has('cities'))
                        <span class="error_checkbox">{{ $errors->first('routes') }}</span>
                        @endif  --}}
                  </div>

                  <div class="c-list-fields mgn-b-3">
                    <div class="data-info-01">
                    <div class="l-12  ">
                      <div class="guide brd-tlr brd-blr">
                        <div class="path_595">
                          <span class="tooltiptext">
                            【{{ $guide[4]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[4]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                        </div>
                      </div>
                      <div class="l-12__1-03 text-input__label-01">
                        <a href="#" class="c-lbl-white-01 c-lbl-white-01_modal margin--10" data-remodal-target="selected_prefectures_modal" >市区群 選択</a>
                        <label class="c-lbl-white margin--10" for="" >町村 選択</label>
                        {{--  <button class="c-lbl-white margin--10" for="">市区群 選択</button>
                        <button class="c-lbl-white margin--10" for="">町村 選択</button>  --}}
                      </div>
                      <div class="l-12__9 display_inline--flex">
                          <div class="l-12 mgn-l-2" style="margin-top: 10px;">


                            <div class="l-12 l-12--gap24  display-fc">
                              <span class="display-txt-04">町村を選択する場合は、左のボタンをクリックして選択ください。（1回の検索で3か所まで。）</span>
                              <div class="l-12 l-12--gap24 mgn-l--7" id="modal_data_cities">
                              </div>
                              <input type="hidden" value="" name="" class="city_list" >
                              <input type="hidden" value="" name="" class="city_list" >
                              <input type="hidden" value="" name="" class="city_list" >
                            </div>
                          </div>
                      </div>
                    </div>
                    </div>


                    @if ($errors->has('cities'))
                    <span class="error_checkbox">{{ $errors->first('cities') }}</span>
                    @endif
                  </div>

                  <div class="c-list-fields display-inline-flex">
                    <div class="l-12 margin-bottom-01 ">
                      <div class="c-any">任意</div>
                      <div class="l-12__9 justify_content--center">
                        <span class="mandatory-txt adjust_mandatory_txt">その他の条件を入力してください</span>
                      </div>
                    </div>
                  </div>

                  <div class="c-list-fields">
                    <div class="data-info-01">
                      <div class="l-12 border-btm">
                        <div class="guide brd-tlr">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[5]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[5]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt mgn-2">
                            <label class="label-text-store-2">建物・物件名</label>
                          </div>
                        </div>
                        <div class="l-12__9 mgn-l-4 self-center">
                          <div class="l-12 l-12--gap24 mgn_-10">
                            <div class="l-12__12 ">
                              <div class="c-input-01 c-input--full display-inline--flex">
                                <input type="text" name="property_name" id="property_name1" placeholder="" style="border: 1px solid #A8A8A8; border-radius: 5px;"/>
                                <span class="display-txt-01">※入力されたワードは部分一致で検索します 〜</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="l-12 border-btm ">
                        <div class="guide">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[6]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[6]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt mgn-2">
                          <label class="label-text-store-2">賃料</label>
                          </div>
                        </div>
                        <div class="l-12__9 mgn-l--27">
                          <div class="l-12" style="margin-top: 15px;">
                            <div class="">
                              <div class="input-box">
                                  <input type="number" name="fee_min" placeholder="" class="input-01" id="fee_min1" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                  <span class="display-txt-02">万円　～</span>
                              </div>
                            </div>
                            <div>
                              <div class="input-box">
                                  <input type="number" name="fee_max" placeholder="" class="input-01" id="fee_min3" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                  <span class="display-txt-02">万円</span>
                              </div>
                            </div>
                            <div class="l-12__5">
                              <span class="display-txt-01 ">※サイトにより細かく検索ができないため、多めに検索し結果をロボレが判断し表示します。
                                （その場合、検索結果数が増えるため課金に注意ください）</span>
                            </div>
                            <div class="l-12__10" style="margin-bottom: 10px;">
                              <div class="l-12 l-12--gap24">
                                <div class="l-12__12 mgn_-10">
                                  <div style="display: flex;">
                                    <div class="lbl-txt-01 lbl-txt-01-m0">
                                      <div class="act-cat">
                                          <input type="checkbox" name="other_fees[]" id="other_fees_1" value="0" hidden>
                                          <label for="other_fees_1" class="c-lbl-white vd_dt_typ lbl-txt-01-m0">管理・共益費込</label>
                                      </div>
                                    </div>
                                    <div class="lbl-txt-01 lbl-txt-01-m0">
                                      <div class="act-cat">
                                          <input type="checkbox" name="other_fees[]" id="other_fees_2" value="1" hidden>
                                          <label for="other_fees_2" class="c-lbl-white vd_dt_typ ">礼金なし</label>
                                      </div>
                                    </div>
                                    <div class="lbl-txt-01 lbl-txt-01-m0">
                                      <div class="act-cat">
                                          <input type="checkbox" name="other_fees[]" id="other_fees_3" value="2" hidden>
                                          <label for="other_fees_3" class="c-lbl-white vd_dt_typ ">敷金・保証料なし</label>
                                      </div>
                                    </div>
                                    {{--  <label class="c-lbl-white margin-right--02" for="">管理・共益費込</label>
                                    <label class="c-lbl-white margin-right--02" for="">礼金なし</label>
                                    <label class="c-lbl-green2 margin-right--02" for="">敷金・保証料なし</label>  --}}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>


                      <div class="l-12 border-btm ">
                        <div class="guide">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[7]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[7]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label display_inline--flex">
                          <div class="lbl-txt-01 lbl-txt-01-m0">
                            <label class="mgn-t-2-label">間取り </label>
                              <div class="mgn-checkbox">
                                  <input type="checkbox" id="selectAll_pln_hse_typ"  hidden>
                                  <label for="selectAll_pln_hse_typ" class="c-lbl-white vd_dt_typ">ALL</label>
                              </div>
                          </div>
                        </div>
                        <div class="l-12__9 display_inline--flex">
                          <div class="l-12 mgn-l--17" style="margin-top:11px;">
                            {{--  @foreach ($array['plan_of_house'] as $key => $item)
                              <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="plan-house-type-{{ $key }}" id="test_{{ $key }}" value="{{ $item }}" hidden>
                                    <label for="test_{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                                </div>
                              </div>
                            @endforeach  --}}
                            <div class="lbl-txt-01 lbl-txt-01-m0">
                              <div class="act-cat">
                                  <input type="checkbox" class="plan-house-type" name="madori[]" id="test_1" value="1R" hidden>
                                  <label for="test_1" class="c-lbl-white vd_dt_typ ">ワンルーム</label>
                              </div>
                            </div>
                            <div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_2" value="1K" hidden>
                                    <label for="test_2" class="c-lbl-white vd_dt_typ ">1K/SK</label>
                                </div>
                              </div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_3" value="2K" hidden>
                                    <label for="test_3" class="c-lbl-white vd_dt_typ ">2K/SK</label>
                                </div>
                              </div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_4" value="3K" hidden>
                                    <label for="test_4" class="c-lbl-white vd_dt_typ ">3K/SK</label>
                                </div>
                              </div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_5" value="4K" hidden>
                                    <label for="test_5" class="c-lbl-white vd_dt_typ ">4K/SK</label>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_6" value="1DK" hidden>
                                    <label for="test_6" class="c-lbl-white vd_dt_typ ">1DK/LK/SDK/SLK</label>
                                </div>
                              </div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_7" value="2DK" hidden>
                                    <label for="test_7" class="c-lbl-white vd_dt_typ ">2DK/LK/SDK/SLK</label>
                                </div>
                              </div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_8" value="3DK" hidden>
                                    <label for="test_8" class="c-lbl-white vd_dt_typ ">3DK/LK/SDK/SLK</label>
                                </div>
                              </div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_9" value="4DK" hidden>
                                    <label for="test_9" class="c-lbl-white vd_dt_typ ">4DK/LK/SDK/SLK</label>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_10" value="1LDK" hidden>
                                    <label for="test_10" class="c-lbl-white vd_dt_typ ">1LDK/SLDK</label>
                                </div>
                              </div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_11" value="2LDK" hidden>
                                    <label for="test_11" class="c-lbl-white vd_dt_typ ">2LDK/SLDK</label>
                                </div>
                              </div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_12" value="3LDK" hidden>
                                    <label for="test_12" class="c-lbl-white vd_dt_typ ">3LDK/SLDK</label>
                                </div>
                              </div>
                              <div class="lbl-txt-01 lbl-txt-01-m0">
                                <div class="act-cat">
                                    <input type="checkbox" class="plan-house-type" name="madori[]" id="test_13" value="4LDK" hidden>
                                    <label for="test_13" class="c-lbl-white vd_dt_typ ">4LDK/SLDK 以上</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="l-12 border-btm ">
                        <div class="guide">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[8]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[8]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>

                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt mgn-2">
                            <label class="label-text-store-2">専有面積</label>
                          </div>
                        </div>
                        <div class="l-12__9 mgn-l-4">
                          <div class="l-12 l-12--gap24 mgn_-10">
                            <div class="">
                              <div class="input-box" style="margin-top: 4px;">
                                <input type="number" name="area_min" placeholder="" class="input-01" id="area_min1" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                <span class="display-txt-02">㎡ 〜</span>
                              </div>
                            </div>
                            <div class="">
                              <div class="input-box" style="margin-top: 4px;">
                                  <input type="number" name="area_max" placeholder="" class="input-01" id="area_max1" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                  <span class="display-txt-02">㎡</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="l-12 border-btm">
                        <div class="guide">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[9]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[9]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt-01 lbl-txt-01-m0">
                            <label class="mgn-t-2-label">建物構造</label>
                              <div class="mgn-checkbox">
                                  <input type="checkbox" id="selectAll_bldg_typ" value="1" hidden>
                                  <label for="selectAll_bldg_typ" class="c-lbl-white vd_dt_typ">ALL</label>
                              </div>
                          </div>
                        </div>
                        <div class="l-12__9 display_inline--flex" style="margin-top: 3px;">
                          <div class="l-12 l-12--gap24  mgn-l--17">
                            @foreach ($array['building_structures'] as $key => $item)
                              <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                                  <div class="act-cat">
                                    <input type="checkbox" class="bldg-type" name="bldg_structure[]" id="bldg-type-{{ $key }}" hidden value="{{ $item }}">
                                    <label for="bldg-type-{{ $key }}" class="c-lbl-white vd_dt_typ">{{ $item }}</label>
                                  </div>
                                </div>
                            @endforeach
                          </div>
                        </div>
                      </div>

                      <div class="l-12 border-btm ">
                        <div class="guide">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[10]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[10]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt mgn-2">
                            <label class="label-text-store-2">築年数</label>
                          </div>
                        </div>
                        <div class="l-12__9 mgn-l-4">
                          <div class="l-12 l-12--gap24 mgn_-10">
                            <div >
                              <div class="input-box" style="margin-top: 4px;">
                                <input type="text" name="year_build_min" placeholder="" class="input-01" id="year_min1" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                <span class="display-txt-02">年 〜</span>
                              </div>
                            </div>
                            <div >
                              <div class="input-box" style="margin-top: 4px;">
                                  <input type="text" name="year_build_max" placeholder="" class="input-01" id="year_max1" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                  <span class="display-txt-02">年以内</span>
                              </div>
                            </div>
                            <div >
                              <span class="display-label-text-1">※新築を検索する場合は「0年以内」と入力</span>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="l-12 border-btm">
                        <div class="guide">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[11]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[11]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt mgn-2">
                            <label class="label-text-store-2">所在階数</label>
                          </div>
                        </div>
                        <div class="l-12__9">
                          <div class="l-12" style="margin-top: 10px;">
                            <div class="display-radio mgn-l--27">
                              <label class="c-radio-cnt" style="margin-right: 30px;">
                                指定なし
                                <input type="radio" checked="checked" name="floor_option" value="no_floor" id="no_step_point" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                <span class="checkmark"></span>
                              </label>
                              <label class="c-radio-cnt mgn-l-4" style="margin-right: 30px;" id="step_point">
                                階を指定
                                <input type="radio" name="floor_option" value="specify_floor" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                <span class="checkmark"></span>
                              </label>
                              <label class="c-radio-cnt mgn-l-4" style="margin-right: 30px;">
                                最上階
                                <input type="radio" name="floor_option" value="top_floor" id="max_step_point" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="l-12__5">
                              <span class="display-txt-01 ">※サイトにより細かく検索ができないため、多めに検索し結果をロボレが判断し表示します。（その場合、検索結果数が増えるため課金に注意ください）</span>
                            </div>
                          </div>
                          {{-- <div class="l-12--gap24" style="display:flex;">
                            <br>
                            <div class="l-12__6 mgn-l-3">
                              <div class="display-radio width-full mgn-l-2">
                                <label class="c-radio-cnt" style="margin-right: 30px;">
                                  指定なし
                                  <input type="radio" checked="checked" name="floor_option" value="no_floor" id="no_step_point">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="c-radio-cnt mgn-l-4" style="margin-right: 30px;" id="step_point">
                                  階を指定
                                  <input type="radio" name="floor_option" value="specify_floor">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="c-radio-cnt mgn-l-4" style="margin-right: 30px;">
                                  最上階
                                  <input type="radio" name="floor_option" value="top_floor" id="max_step_point">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="p-list__item__data display-radio">
                                <input type="radio" id="指定なし" name="fav_language" value="1">
                                  <label for="指定なし">指定なし  </label><br>
                                  <input type="radio" id="階を指定" name="fav_language" value="2">
                                  <label for="階を指定">階を指定</label><br>
                                  <input type="radio" id="最上階" name="fav_language" value="3">
                                  <label for="最上階">最上階</label>
                              </div>
                            </div>

                            <div class="l-12__6 margin-left--auto">
                              <span class="display-txt-01">※サイトにより細かく検索ができないため、多めに検索し結果をロボレが判断し表示します。（その場合、検索結果数が増えるため課金に注意ください）</span>
                            </div>
                          </div> --}}
                          <div class="l-12 mgn-l--27" style="margin-top: 15px;">
                            <div class="">
                              <div class="input-box" style="margin-top: 4px;">
                                <input type="number" name="step_min" placeholder="" id="step_min1" disabled="disabled" class="input-01">
                                <span class="display-txt-02">階 ～</span>
                              </div>
                            </div>
                            <div>
                              <div class="input-box" style="margin-top: 4px;">
                                <input type="number" name="step_max" placeholder="" id="step_max1" disabled="disabled" class="input-01">
                                <span class="display-txt-02">階 </span>
                              </div>
                            </div>
                            <div class="l-12__5">
                              <span class="display-txt-01 ">※検索できるサイトのみで検索。（検索できないサイトでも詳細画面で分かる場合もあるため、
                                その場合は本項目を使わず検索し詳細画面を確認ください。</span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="l-12 border-btm">
                        <div class="guide">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[12]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[12]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt mgn-2">
                            <label class="label-text-store-2">フリーワード</label>
                          </div>
                        </div>
                        <div class="l-12__9 mgn-l-4">
                          <div class="l-12 l-12--gap24 mgn_-10">
                            <div class="l-12__10">
                              <div class="c-input-01 c-input--full display-inline--flex input-box" style="margin-top: 4px;">
                                <input type="text" name="free_word" placeholder="" class="" id="free_word1" style="border: 1px solid #A8A8A8; border-radius: 5px;">
                                <span class="display-txt-01">※BBサイトにより、備考欄のみの検索なためヒットしない事が多いです。</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="l-12 border-btm">
                        <div class="guide">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[13]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[13]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt mgn-2">
                            <label class="label-text-store-2">登録・公開日</label>
                          </div>
                        </div>
                        <div class="l-12__9 mgn-l-4">
                          <div class="l-12 l-12--gap24 mgn_-10">
                            <div class="l-12__2-calendar">
                              <div class="c-input c-input--full input--calendar mgn-t-1">
                                {{-- <label class="c-lbl-white c-input--full " for="test_calendar">日付を選択
                                  <input type="text" name="test_calendar" id="test_calendar" class="flatpickr c-search-hidden_calendar">
                                  <span class="c-icn--calendar-01"></span>
                                </label> --}}
                                <input type="text" name="publishing_date" placeholder="日付を選択" class="input_1 flatpickr" id="publishing_date1" style="border-radius: 22px; width: 179px; text-align: center; border-color: #003A16;">
                                <span class="c-icn--calendar-01"></span>
                              </div>
                            </div>
                            {{-- <div class="l-12__4"></div>
                              <span class="label-text-store-2">2021年9月15日以降</span>
                            </div> --}}
                            
                              <span class="display-txt-calendar-2" style="margin-top: 15px;">2021年9月15日以降</span>
                            
                          </div>
                        </div>
                      </div>

                      <div class="l-12 border-btm">
                        <div class="guide">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[14]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[14]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt mgn-2">
                            <label class="label-text-store-2">取引態様</label>
                          </div>
                        </div>
                        <div class="l-12__9 display_inline--flex" style="margin-top: 3px;">
                          <div class="l-12 l-12--gap24 mgn-l--17">
                            @foreach ($array['trade_style'] as $key => $item)
                              <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                                <div class="act-cat">
                                  <input type="checkbox" value="{{ $key }}" name="trade_style[]" id="trade-style-{{ $key }}" hidden>
                                  <label for="trade-style-{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                                </div>
                              </div>
                            @endforeach
                          </div>
                        </div>
                        {{--  <div class="l-12__9 mgn-l-4">
                          <div class="l-12 l-12--gap24">
                            <div class="l-12__9 ">
                              <div class="box-display">
                                @foreach ($array['trade_style'] as $key => $item)
                                  <button class="c-lbl-white trd_styl_type margin--5" data-colors="{{ json_encode($data_colors) }}" for="">{{$item}}</button>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>  --}}
                      </div>

                      <div class="l-12">
                        <div class="guide brd-blr">
                          <div class="path_595">
                            <span class="tooltiptext">
                            【{{ $guide[15]->guide_name }}】
                            <br>
                              {{--  ⼩数第⼀（例：7.<p class="change_to_red">8</p>万円）まで⼊⼒可能です。  --}}
                              <br>
                              <pre><span style="font-size: 12px;"> ○ {!! $guide[15]->guide_body !!}</span></pre>
                              {{--  <br>
                              　  atBB、イタンジ、東急住宅リース
                              <br>
                              ○! 検索可能（粗く多めに検索し、結果をロボレが判断して表⽰）
                              <br>
                              　  レインズは  --}}
                          </span>
                          </div>
                        </div>
                        <div class="l-12__1-03 text-input__label">
                          <div class="lbl-txt mgn-2">
                            <label class="label-text-store-2">画像データ</label>
                          </div>
                        </div>
                        <div class="l-12__9 display_inline--flex" style="margin-top: 3px;">
                          <div class="l-12 l-12--gap24 mgn-l--17">
                            @foreach ($array['video_data'] as $key => $item)
                              <div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4">
                                <div class="act-cat">
                                  <input type="radio" value="{{ $key}}" name="video_data[]" id="video-data-{{ $key }}" hidden>
                                  <label for="video-data-{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
                                </div>
                              </div>
                            @endforeach
                          </div>
                        </div>
                        {{--  <div class="l-12__9 mgn-l-4">
                          <div class="l-12 l-12--gap24">
                            <div class="l-12__6">
                              <div class="box-display">
                                @foreach ($array['video_data'] as $key => $item)
                                  <button class="c-lbl-white vd_dt_typ margin--5" data-colors="{{ json_encode($data_colors) }}" for="">{{$item}}</button>
                                @endforeach

                              </div>
                            </div>

                          </div>
                        </div>  --}}
                      </div>
                    </div>
                  </div>
                </div>
                 {{-- <input type="submit" value="Test Submit">  --}}
              </form>
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
{{--  <div class="sticky-footer" style="display:none;">  --}}
<div class="sticky-footer">
  <div class="search-bottom"  x-show="$store.steps.current == 'step1'">
    <div class="search-margin-bottom">
      <div class="sb-btm" style="display: inline-flex">
        <div class="search-btm" >
          @csrf
          {{--  <input type="submit" value="検索">  --}}
          {{--  <input type="email" name="email" placeholder="検索" class="search_input">  --}}
          <button onclick="submitSearch();" class="search_property">
            <span>検索</span>
            <i class="c-icn--magnifying-glass"></i>
          </button>
        </div>
        <a href="#" class="clr-cond" id="clear-btn" style="    margin-left: -25px;
        width: 226px;
        margin-top: 12px;">条件をクリア</a>
        {{-- <select class="keep-slct" name="" id="" >
          <option value="0">この検索に名前を付けて保存</option>
        </select> --}}
        <form method="post" action="{{ route('storeAdmin.search.homeSearch') }}">
          @csrf
          <input type="text" name="name_search" class="c-input--full display-inline--flex" style="width: 240%; height: 50px; margin-left:-15px; ">
          <input type="hidden" name="property_name" id="property_name2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="prefectures" id="prefectures2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="fee_min" id="fee_min2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="fee_max" id="fee_min4" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="area_min" id="area_min2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="area_max" id="area_max2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="step_min" id="step_min2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="step_max" id="step_max2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="free_word" id="free_word2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="year_build_min" id="year_build_min2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="year_build_max" id="year_build_max2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="publishing_date" id="publishing_date2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="trade_style" id="trade_style2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="sites_available" id="reins2" placeholder="" class=" mgn-t-1"/>
          <input type="hidden" name="sites_available" id="tokyu2" placeholder="" class=" mgn-t-1"/>
          <button type="submit" class="c-lbl-white-01 c-lbl-white-01_modal" style="position: absolute;
          display: inline-block;
          top: 16px;
          right: 27%;">保存</button>
        </form>
        
        {{-- <a href="#" class="c-lbl-white-01 c-lbl-white-01_modal" data-remodal-target="result_search" id="store-modal">保存</a> --}}
      </div>
    </div>

  </div>
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
            <label class="c-lbl-white margin--5" for="" id="site-1">レインズ</label>
            <label class="c-lbl-white margin--5" for="" id="site-2">atBB</label>
            <label class="c-lbl-white margin--5" for="" id="site-3">イタンジ</label>
            <label class="c-lbl-white margin--5" for="" id="site-4">東急住宅リース</label>
            <label class="c-lbl-white margin--5" for="" id="site-5">三井不動産レジデンシャルリース</label>
            <label class="c-lbl-white margin--5" for="" id="site-6">住友不動産</label>
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
            <div class="container_lifeline_ul">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">ライフライン</span>
              <div class="display-flex">
                <input type="checkbox" id="city_gas" name="city_gas" value="gas">
                <label for="city_gas" class="label-checkbox-2  mgn-r-6"> 都市ガス</label><br>
                <input type="checkbox" id="propane_gas" name="propane_gas" value="propane">
                <label for="propane_gas" class="label-checkbox-2  mgn-r-6"> プロパンガス</label><br>
              </div>
            </div>
        </div>
      </div>
      <div class="second_dotted_lines"></div>

      <div class="container_kitchen">
        <div class="container_kitchen_adjust">
          <div class="container_kitchen_ul">
            <span class="l-12__1-05 fnt-sz-4 mgn-t-1 ">キッチン</span>
            {{-- <div class="container_kitchen_center"> --}}
            <div class="display-flex">
              <input type="checkbox" id="gas_stove" name="gas_stove" value="stove">
              <label for="gas_stove" class="label-checkbox-2  mgn-r-6">ガスコンロ設置化</label><br>
              <input type="checkbox" id="more_stove" name="more_stove" value="morestove">
              <label for="more_stove" class="label-checkbox-2  mgn-r-6">コンロ2口以上</label><br>
              <input type="checkbox" id="system_kitchen" name="system_kitchen" value="systemkitchen">
              <label for="system_kitchen" class="label-checkbox-2  mgn-r-6">システムキッチン</label><br>
              <div class="tooltip-icon">
                <i class='fas fa-exclamation-circle' style='font-size:26px;color:#ff6161'></i>
                <div class="tooltip-design">
                  <span class="tooltiptext"><span class="tooltip-message">次のサイトは検索できません。<br/>
                    レインズ / atBB</span></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container_kitchen_line2">
          <ul class="container_kitchen_line2_ul">
            <h1 class="l-12__1-05 "><p></p></h1>
            {{-- <div class="container_kitchen_line2_center"> --}}
            <div class="display-flex">
              <input type="checkbox" id="island_stove" name="island_stove" value="island">
              <label for="island_stove" class="label-checkbox-2  mgn-r-6">アイランドキッチン</label><br>
              <input type="checkbox" id="cooking_heater" name="cooking_heater" value="heater">
              <label for="cooking_heater" class="label-checkbox-2  mgn-r-6">IHクッキングヒーター</label><br>
              <input type="checkbox" id="dishwater" name="dishwater" value="dishwater">
              <label for="dishwater" class="label-checkbox-2  mgn-r-6">食器乾燥機</label><br>
              <input type="checkbox" id="dryer" name="dryer" value="dryer">
              <label for="dryer" class="label-checkbox-2  mgn-r-6">食器洗浄乾燥機</label><br>
              <input type="checkbox" id="disposer" name="disposer" value="disposer">
              <label for="disposer" class="label-checkbox-2  mgn-r-6">ディスポーザー</label><br>
            </div>
          </ul>
        </div>
        <div class="container_kitchen_line3">
          <div class="container_kitchen_line3_ul">
            <h1 class="l-12__1-05 "><p></p></h1>
            {{-- <div class="container_kitchen_line3_center"> --}}
            <div class="display-flex">
              <input type="checkbox" id="refrigerator" name="refrigerator" value="refrigerator">
              <label for="refrigerator" class="label-checkbox-2">冷蔵庫</label><br>
              <i class='fas fa-exclamation-circle mgn-r-6' style='font-size:26px;color:#ff6161'></i>
              <input type="checkbox" id="water_purifier" name="water_purifier" value="waterpurifier">
              <label for="water_purifier" class="label-checkbox-2  mgn-r-6">浄水器</label><br>
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
                <input type="checkbox" id="private_toilet" name="private_toilet" value="privatetoilet">
                <label for="private_toilet" class="label-checkbox-2  mgn-r-6">専用トイレ</label><br>
                <input type="checkbox" id="warm_water" name="warm_water" value="warmwater">
                <label for="warm_water" class="label-checkbox-2  mgn-r-6">温水洗浄便座</label><br>
                <input type="checkbox" id="private_bus" name="private_bus" value="privatebus">
                <label for="private_bus" class="label-checkbox-2  mgn-r-6">専用バス</label><br>
                <input type="checkbox" id="reheating" name="reheating" value="reheating">
                <label for="reheating" class="label-checkbox-2  mgn-r-6">追焚機能</label><br>
                <input type="checkbox" id="separate" name="separate" value="separate">
                <label for="separate" class="label-checkbox-2  mgn-r-6">バス・トイレ別</label><br>
                <input type="checkbox" id="independence" name="independence" value="independence">
                <label for="independence" class="label-checkbox-2  mgn-r-6">洗面所独立</label><br>
              </div>
            </ul>
          </div>
          <div class="container_bath_toilet_adjust2">
            <ul class="container_bath_toilet_ul2">
              <h1 class="l-12__1-05 "><p></p></h1>
              {{-- <div class="container_bath_toilet_adjust2_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="bathroom_shower" name="bathroom_shower" value="bathroomshower">
                <label for="bathroom_shower" class="label-checkbox-2  mgn-r-6">シャワー付き洗面化粧台</label><br>
                <input type="checkbox" id="washing_machine" name="washing_machine" value="washingmachine">
                <label for="washing_machine" class="label-checkbox-2  mgn-r-6">洗濯機置場</label><br>
                <input type="checkbox" id="indoor_washing" name="indoor_washing" value="indoorwashing">
                <label for="indoor_washing" class="label-checkbox-2  mgn-r-6">室内洗濯機置場</label><br>
                <input type="checkbox" id="bathroom_dryer" name="bathroom_dryer" value="bathroomdryer">
                <label for="bathroom_dryer" class="label-checkbox-2  mgn-r-6">浴室乾燥機</label><br>
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
                <input type="checkbox" id="air_conditioner" name="air_conditioner" value="airconditioner">
                <label for="air_conditioner" class="label-checkbox-2  mgn-r-6">エアコン</label><br>
                <input type="checkbox" id="floor_heating" name="floor_heating" value="bathroomdryer">
                <label for="floor_heating" class="label-checkbox-2  mgn-r-6">床暖房</label><br>
                <input type="checkbox" id="conservatory" name="conservatory" value="bathroomdryer">
                <label for="conservatory" class="label-checkbox-2  mgn-r-6">FF暖房</label><br>
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
                  <input type="checkbox" id="dimple_key" name="dimple_key" value="dimplekey">
                  <label for="dimple_key" class="label-checkbox-2  mgn-r-6">ディンプルキー</label><br>
                  <input type="checkbox" id="auto_lock" name="auto_lock" value="autolock">
                  <label for="auto_lock" class="label-checkbox-2  mgn-r-6">オートロック</label><br>
                  <input type="checkbox" id="intercom" name="intercom" value="intercom">
                  <label for="intercom" class="label-checkbox-2  mgn-r-6">モニター付きインターホン</label><br>
                  <input type="checkbox" id="security" name="security" value="security">
                  <label for="security" class="label-checkbox-2  mgn-r-6">24時間セキュリティ</label><br>
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
                <input type="checkbox" id="storage_space" name="storage_space" value="storagespace">
                <label for="storage_space" class="label-checkbox-2  mgn-r-6">収納スペース</label><br>
                <input type="checkbox" id="walkin_closet" name="walkin_closet" value="walkincloset">
                <label for="walkin_closet" class="label-checkbox-2  mgn-r-6">ウォークインクローゼット</label><br>
                <input type="checkbox" id="shoes_closet" name="shoes_closet" value="shoescloset">
                <label for="shoes_closet" class="label-checkbox-2  mgn-r-6">シューズインクローゼット</label><br>
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
                <input type="checkbox" id="bs" name="bs" value="bs">
                <label for="bs" class="label-checkbox-2  mgn-r-6">BS/CS/CATV</label><br>
                <input type="checkbox" id="free_internet" name="free_internet" value="freeinternet">
                <label for="free_internet" class="label-checkbox-2  mgn-r-6">インターネット無料</label><br>
                <input type="checkbox" id="internet_compatible" name="internet_compatible" value="internetcompatible">
                <label for="internet_compatible" class="label-checkbox-2  mgn-r-6">インターネット対応</label><br>
                <input type="checkbox" id="high_speed" name="high_speed" value="highspeed">
                <label for="high_speed" class="label-checkbox-2  mgn-r-6">高速インターネット</label><br>
                <input type="checkbox" id="loft" name="loft" value="loft">
                <label for="loft" class="label-checkbox-2  mgn-r-6">ロフト</label><br>
              </div>
            </ul>
          </div>

          <div class="container_comfortable_adjust2">
            <ul class="container_comfortable_ul2">
              <h1 class="l-12__1-05 "><p></p></h1>
              {{-- <div class="container_comfortable_adjust2_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="flooring" name="flooring" value="flooring">
                <label for="flooring" class="label-checkbox-2  mgn-r-6">フローリング</label><br>
                <input type="checkbox" id="double_glazing" name="double_glazing" value="doubleglazing">
                <label for="double_glazing" class="label-checkbox-2  mgn-r-6">複層ガラス</label><br>
                <input type="checkbox" id="balcony" name="balcony" value="balcony">
                <label for="balcony" class="label-checkbox-2  mgn-r-6">バルコニー</label><br>
                <input type="checkbox" id="garden" name="garden" value="garden">
                <label for="garden" class="label-checkbox-2  mgn-r-6">庭</label><br>
                <input type="checkbox" id="barrier_free" name="barrier_free" value="barrierfree">
                <label for="barrier_free" class="label-checkbox-2  mgn-r-6">バリアフリー</label><br>
                <input type="checkbox" id="electric" name="electric" value="electric">
                <label for="electric" class="label-checkbox-2  mgn-r-6">オール電化</label><br>
              </div>
            </ul>
          </div>

          <div class="container_comfortable_adjust3">
              <ul class="container_comfortable_ul3">
                <h1 class="l-12__1-05 "><p></p></h1>
                {{-- <div class="container_comfortable_adjust3_center"> --}}
                  <div class="display-flex">
                    <input type="checkbox" id="garbage_disposal" name="garbage_disposal" value="garbagedisposal">
                    <label for="garbage_disposal" class="label-checkbox-2  mgn-r-6">24時間ゴミ出し化</label><br>
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
                <input type="checkbox" id="parking" name="parking" value="parking">
                <label for="parking" class="label-checkbox-2  mgn-r-6">駐車場</label><br>
                <input type="checkbox" id="parking_slot" name="parking_slot" value="parkingslot">
                <label for="parking_slot" class="label-checkbox-2  mgn-r-6">駐車場2台分</label><br>
                <input type="checkbox" id="bicycle_park" name="bicycle_park" value="bicyclepark">
                <label for="bicycle_park" class="label-checkbox-2  mgn-r-6">駐輪場</label><br>
                <input type="checkbox" id="bike_yard" name="bike_yard" value="bikeyard">
                <label for="bike_yard" class="label-checkbox-2  mgn-r-6">バイク置場</label><br>
                <input type="checkbox" id="trunk_room" name="trunk_room" value="trunkroom">
                <label for="trunk_room" class="label-checkbox-2  mgn-r-6">トランクルーム</label><br>
                <input type="checkbox" id="elevator" name="elevator" value="elevator">
                <label for="elevator" class="label-checkbox-2  mgn-r-6">エレベーター</label><br>
              </div>
            </ul>
          </div>

          <div class="container_building_equip_adjust">
            <ul class="container_building_equip_ul2">
              <h1 class="l-12__1-05 "><p></p></h1>
              {{-- <div class="container_building_equip_adjust2_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="delivery_box" name="delivery_box" value="deliverybox">
                <label for="delivery_box" class="label-checkbox-2  mgn-r-6">宅配ボックス</label><br>
                <input type="checkbox" id="designers" name="designers" value="designers">
                <label for="designers" class="label-checkbox-2  mgn-r-6">デザイナーズ</label><br>
                <input type="checkbox" id="reform_history" name="reform_history" value="reformhistory">
                <label for="reform_history" class="label-checkbox-2  mgn-r-6">リフォーム履歴あり</label><br>
                <input type="checkbox" id="renovation_history" name="renovation_history" value="renovationhistory">
                <label for="renovation_history" class="label-checkbox-2  mgn-r-6">リノベーション履歴あり</label><br>
              </div>
            </ul>
          </div>

          <div class="container_building_equip_adjust3">
            <ul class="container_building_equip_ul3">
              <h1 class="l-12__1-05 "><p></p></h1>
              {{-- <div class="container_building_equip_adjust3_center"> --}}
              <div class="display-flex">
                <input type="checkbox" id="seismic_isolation" name="seismic_isolation" value="seismicisolation">
                <label for="seismic_isolation" class="label-checkbox-2  mgn-r-6">免震・制震・制震構造</label><br>
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
                <input type="checkbox" id="administrator" name="administrator" value="administrator">
                <label for="administrator" class="label-checkbox-2  mgn-r-6">分譲タイプ</label><br>
                <input type="checkbox" id="maisonette" name="maisonette" value="maisonette">
                <label for="maisonette" class="label-checkbox-2  mgn-r-6">メゾネット</label><br>
                <input type="checkbox" id="free_rent" name="free_rent" value="freerent">
                <label for="free_rent" class="label-checkbox-2  mgn-r-6">フリーレント</label><br>
                <input type="checkbox" id="credit_card" name="credit_card" value="creditcard">
                <label for="credit_card" class="label-checkbox-2  mgn-r-6">クレジットカード決済可</label><br>
                <input type="checkbox" id="executive" name="executive" value="executive">
                <label for="executive" class="label-checkbox-2  mgn-r-6">管理人</label><br>
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
                <input type="checkbox" id="immediate" name="immediate" value="immediate">
                <label for="immediate" class="label-checkbox-2  mgn-r-6">即入居</label><br>
                <input type="checkbox" id="pets_allowed" name="pets_allowed" value="petsallowed">
                <label for="pets_allowed" class="label-checkbox-2  mgn-r-6">ペット可・相談</label><br>
                <input type="checkbox" id="musical_instrument" name="musical_instrument" value="musicalinstrument">
                <label for="musical_instrument" class="label-checkbox-2  mgn-r-6">楽器可・相談</label><br>
                <input type="checkbox" id="women_only" name="women_only" value="womenonly">
                <label for="women_only" class="label-checkbox-2  mgn-r-6">女性限定</label><br>
                <input type="checkbox" id="men_only" name="men_only" value="menonly">
                <label for="men_only" class="label-checkbox-2  mgn-r-6">男性限定</label><br>
                <input type="checkbox" id="students_only" name="students_only" value="students">
                <label for="students_only" class="label-checkbox-2  mgn-r-6">学生限定</label><br>
              </div>
            </ul>
          </div>

          <div class="container_condition_adjust2">
            <ul class="container_condition_ul2">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 "></span>
              <div class="display-flex">
                <input type="checkbox" id="two_people" name="two_people" value="twopeople">
                <label for="two_people" class="label-checkbox-2  mgn-r-6">二人入居可</label><br>
                <input type="checkbox" id="consultation" name="consultation" value="consultation">
                <label for="consultation" class="label-checkbox-2  mgn-r-6">高齢者可・相談</label><br>
                <input type="checkbox" id="foreign" name="foreign" value="foreign">
                <label for="foreign" class="label-checkbox-2  mgn-r-6">外国籍可・相談</label><br>
                <input type="checkbox" id="corporate_contracts" name="corporate_contracts" value="corporatecontracts">
                <label for="corporate_contracts" class="label-checkbox-2  mgn-r-6">法人契約限定</label><br>
                <input type="checkbox" id="contract_request" name="contract_request" value="contractrequest">
                <label for="contract_request" class="label-checkbox-2  mgn-r-6">法人契約希望</label><br>
              </div>
            </ul>
          </div>

          <div class="container_condition_adjust3">
            <ul class="container_condition_ul3">
              <span class="l-12__1-05 fnt-sz-4 mgn-t-1 "></span>
              <div class="display-flex">
                <input type="checkbox" id="office_usage" name="office_usage" value="officeusage">
                <label for="office_usage" class="label-checkbox-2  mgn-r-6">事務所使用可</label><br>
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
                <input type="checkbox" id="announcement" name="announcement" value="announcement">
                  <label for="announcement" class="label-checkbox-2  mgn-r-6">広告可（要確認含）</label><br>
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

{{-- Routes Modal --}}
<section class="remodal p-remodal--form" data-remodal-id="routes_modal">
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
          路線 選択 <div id="prefectures_choosen_1" style="display: inline-block;"> </div>
        </div>
      </div>
      <div class="container_rain">
        <div id="company">
          
        </div>
        {{-- <div class="container_rain_adjust"> --}}

            {{-- <div class="lbl-txt-01 lbl-txt-01-m0" style="flex-wrap: wrap;" id="routes_selected"> --}}
              {{-- @foreach($array['pref'] as $key => $item) --}}
              {{-- <div class="act-cat"> --}}

                  {{-- <input type="checkbox" class="plan-house-type selectPref" name="pref[]" id="prefec_{{ $key }}" value="{{ $item }}" data-id="{{ $key }}" data-pref="{{ $item }}" hidden>
                  <label for="prefec_{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label> --}}

              {{-- </div> --}}
              {{-- @endforeach --}}
            {{-- </div> --}}
        {{-- </div> --}}
      </div>
      <div class="first_dotted_lines"></div>

      <div id="pre_result"class="container_lifeline">
        {{-- <div class="container_lifeline_adjust">
            <div class="pre_result">

            </div>
        </div> --}}

      </div>
  </div>
</section>
<section class="remodal p-remodal--form" data-remodal-id="prefectures_modal" id="prefectures_modal">
  <div class="p-modal">
    {{--  <div class="p-modal--title">
      <div class="p-index__head__title">  --}}
        {{-- Temporary Icon to be replaced --}}
        {{-- <div class="c-image c-image--user"></div> --}}
        {{-- 検索結果一覧 こだわり検索 --}}
      {{--  </div>
    </div>  --}}
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
      <div class="second_dotted_lines"></div>
      <div class="container_rain">
            <div class="lbl-txt-01 lbl-txt-01-m0" style="flex-wrap: wrap;">
              @php
                $space_count = 0;
                $space_guide = [1, 6, 7, 4, 6, 6, 5, 4, 8];
              @endphp
              @foreach($array['pref'] as $key => $item)
              <div class="act-cat">
                  <input type="checkbox" class="plan-house-type selectPrefecture" name="prefecture[]"
                    id="prefecture_{{ $key }}" value="{{ $item }}" data-id="{{ $key }}" data-pref="{{ $item }}" hidden>
                  <label for="prefecture_{{ $key }}" class="c-lbl-white vd_dt_typ ">{{ $item }}</label>
              </div>
                @php
                  $space_count++;
                @endphp
                  @if($space_count == $space_guide[0])
                    <div style="width:100%"></div>
                    @php
                      $space_count = 0;
                      array_shift($space_guide)
                    @endphp
                  @endif
              @endforeach
            </div>
            {{-- <button class="c-lbl-white margin--10" id="save_prefecture"for="" type="button" data-remodal-action="confirm">保存</button> --}}
      </div>
      <div class="second_dotted_lines"></div>
      <button class="c-lbl-white margin--5" id="save_prefecture"for="" type="button" data-remodal-action="confirm">保存</button>
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
          <button class="c-lbl-white margin--10" id="save_cities"for="" type="button" data-remodal-action="confirm">保存</button>
      </div>
  </div>
</section>
<section class="remodal p-remodal--form" data-remodal-id="station_modal">
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
          駅 選択
        </div>
      </div>
      <div class="first_dotted_lines"></div>
      <div class="container_rain" id="stationModal_routes_selected">

      </div>
      <div class="first_dotted_lines"></div>
      <button class="c-lbl-white margin--5" id="save_station"for="" type="button" data-remodal-action="confirm">保存</button>
      {{-- <div id="pre_result"class="container_lifeline">

      </div> --}}
  </div>
</section>
@endslot
@endcomponent
  <script>

    var values = 0;
    var limit = 3;
    var selectedCityNames = []
    var pref_count = 0
    var city_count = 0
    var selected = [];
    var selectedCities = [];
    var values_pref = 0
    var selected_station = []
    var values_station = 0

    $(window).on('beforeunload', function(){
      sessionStorage.clear();
    });
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

    $(document).ready(function(){
      $(".step1_clickable").click(function(){
        $(".step-body").toggle("slow");
        $(".stepper").toggleClass("stepper_bottom_none");
        $(".path_138").toggleClass("click_active")
      });
    });


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

  //Prefecture_1
  // $('#prefecture_1').on('click', function(){
  //   if(this.checked){
  //     $(".object-type").each(function() {
  //       this.checked=true;
  //     });
  //   }
  //   else{
  //     $(".object-type").each(function() {
  //       this.checked=false;
  //     });
  //   }

  // })

  $('#selectAll_object_type').on('click', function(){
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

  $('#selectAll_pln_hse_typ').on('click', function(){

    if(this.checked){
      $(".plan-house-type").each(function() {
        this.checked=true;
      });
    }
    else{
      $(".plan-house-type").each(function() {
        this.checked=false;
      });
    }

  })

  $('#selectAll_bldg_typ').on('click', function(){
    if(this.checked){
      $(".bldg-type").each(function() {
        this.checked=true;
      });
    }
    else{
      $(".bldg-type").each(function() {
        this.checked=false;
      });
    }
  })

  $('#step_point').on('click', function(){
    if(!this.checked){
      $("#step_min1").prop("disabled", false);
      $("#step_max1").prop("disabled", false);
    }
  })

  $('#no_step_point').on('click', function(){
    $("#step_min1").prop("disabled", true);
    $("#step_max1").prop("disabled", true);
  })

  $('#max_step_point').on('click', function(){
    $("#step_min1").prop("disabled", true);
    $("#step_max1").prop("disabled", true);
  })

  $('#property_name1').change(function(){
    $('#property_name2').val($(this).val());
  });
  $('#fee_min1').change(function(){
    $('#fee_min2').val($(this).val());
  });
  $('#fee_min3').change(function(){
    $('#fee_min4').val($(this).val());
  });
  $('#area_min1').change(function(){
    $('#area_min2').val($(this).val());
  });
  $('#area_max1').change(function(){
    $('#area_max2').val($(this).val());
  });
  $('#step_min1').change(function(){
    $('#step_min2').val($(this).val());
  });
  $('#step_max1').change(function(){
    $('#step_max2').val($(this).val());
  });
  $('#free_word1').change(function(){
    $('#free_word2').val($(this).val());
  });
  $('#year_min1').change(function(){
    $('#year_build_min2').val($(this).val());
  });
  $('#year_max1').change(function(){
    $('#year_build_max2').val($(this).val());
  });
  $('#publishing_date1').change(function(){
    $('#publishing_date2').val($(this).val());
  });
  $('#trade-style-0').change(function(){
    $('#trade_style2').val($(this).val());
  });
  $('#trade-style-1').change(function(){
    $('#trade_style2').val($(this).val());
  });
  $('#trade-style-2').change(function(){
    $('#trade_style2').val($(this).val());
  });
  $('#reins').change(function(){
    $('#reins2').val($(this).val());
  });
  $('#tokyu').change(function(){
    $('#tokyu2').val($(this).val());
  });

  
/**
  //Init
  $('div[data-prefecture]').hide();
  $('input[name="prefectures[]"]').prop( "checked", false );

  //Prefecture
  $('input[name="prefectures[]"]').on('change', function(){
    $(`div[data-prefecture=${this.value}]`).toggle()

    if (!this.checked){
      $(`input[name="cities[${this.value}][]"]`).prop( "checked", false );
      pref_count -= 1
    }else{
      //If City Already Selected
      is_checked = $('div[data-prefecture] input:checked')
      if(is_checked.length > 0){
        is_checked.prop( "checked", false );
      }
      pref_count += 1
    }

    toggleCities();
  });

  //Cities
  $('div[data-prefecture] input').on('change', function(){
    toggleCities();
  });

  function toggleCities(){
    city_count = $('div[data-prefecture] input:checked').length
    //Max 3
    if(city_count == 3){
      $('div[data-prefecture] input:not(:checked)').prop( "disabled", true );
    }else{
      $('div[data-prefecture] input').prop( "disabled", false );
    }

    console.log(pref_count)
    console.log(city_count)
  }
  **/
  function toggleCategory(category){
    $('#tcl_'+category.name).val(category.checked ? 1 : 0)
    console.log($('#tcl_'+category.name))
  }
  var test_form =  $('#robore_search_property')
  function submitSearch(){
    test_form.submit();
  }
  //when "検索対象サイト" checkbox is clicked, modal is highlighted to green//
  $('input[type=checkbox]').click(function(){
    if($('#reins').prop("checked") == true){
      $('#site-1').removeClass('c-lbl-white')
      $('#site-1').addClass('c-lbl-green2')
    }
    else {
      $('#site-1').removeClass('c-lbl-green2')
      $('#site-1').addClass('c-lbl-white')
    }
  });
  $('input[type=checkbox]').click(function(){
    if($('#atbb').prop("checked") == true){
      $('#site-2').removeClass('c-lbl-white')
      $('#site-2').addClass('c-lbl-green2')
    }
    else {
      $('#site-2').removeClass('c-lbl-green2')
      $('#site-2').addClass('c-lbl-white')
    }
  });
  $('input[type=checkbox]').click(function(){
    if($('#itandibb').prop("checked") == true){
      $('#site-3').removeClass('c-lbl-white')
      $('#site-3').addClass('c-lbl-green2')
    }
    else {
      $('#site-3').removeClass('c-lbl-green2')
      $('#site-3').addClass('c-lbl-white')
    }
  });
  $('input[type=checkbox]').click(function(){
    if($('#tokyu').prop("checked") == true){
      $('#site-4').removeClass('c-lbl-white')
      $('#site-4').addClass('c-lbl-green2')
    }
    else {
      $('#site-4').removeClass('c-lbl-green2')
      $('#site-4').addClass('c-lbl-white')
    }
  });
  $('input[type=checkbox]').click(function(){
    if($('#mitsui').prop("checked") == true){
      $('#site-5').removeClass('c-lbl-white')
      $('#site-5').addClass('c-lbl-green2')
    }
    else {
      $('#site-5').removeClass('c-lbl-green2')
      $('#site-5').addClass('c-lbl-white')
    }
  });
  $('input[type=checkbox]').click(function(){
    if($('#sumitomo').prop("checked") == true){
      $('#site-6').removeClass('c-lbl-white')
      $('#site-6').addClass('c-lbl-green2')
    }

  });
  // //publishing_date
  // $('#publishing_date').on('change', function(){
  //   let value = $(this).val()
  //   let pub_date = new Date(value);
  //   let month = pub_date.getMonth() + 1
  //   let year = pub_date.getFullYear()
  //   let day = pub_date.getDate()

  //   final = (year) + '年 ' + String(month) + '月 ' + day + '日以降'
  //   $('#pub_show').text(final)
   

  // });
  /**selected_routes_list = []
  last_key_route = 0
  selected_prefecture_list = []
  $('.selectPrefecture').on('click', function(e){
            // e.preventDefault();
            var id = $(this).attr('data-id');
            var prefecture = $(this).attr('data-pref');
            console.log(id);
            console.log(prefecture);
            var html_routes = []
            var checkbox_routes = []

            if($(this).prop('checked')){
              $.ajax({
                url: "https://express.heartrails.com/api/json?method=getLines&prefecture="+prefecture,
                type: 'POST',
                dataType: 'json',
                data:{
                  "_token": "{{ csrf_token() }}",
                },
                success: function(data){
                  // if(data.message == "message"){
                  //   alert("success");
                  // }
                  route_prefecture =
                    '<div id="route_prefecture_'+prefecture+'" style="display: contents;">'
                    +'</div>'
                    +'<input id="route_id_'+prefecture+'" type="hidden" name="route_prefectures[]" value="'+prefecture+'">'
                  if(selected_prefecture_list.length == 0){
                    $('#routes_selected').html(route_prefecture)
                  }else{
                    $('#routes_selected').html($('#routes_selected').html()+route_prefecture)
                  }
                  console.log(data.response.line)
                  //Display Routes
                  prefec_result = data.response.line
                  selected_routes_list = selected_routes_list.concat(prefec_result)
                  selected_prefecture_list.push(prefecture)

                  $.each(prefec_result, function(i){
                    html_routes +=
                    '<div class="lbl-txt-01 lbl-txt-01-m0 pref_routes">'
                      +'<div class="act-cat">'
                        +'<input type="checkbox" class="plan-house-type selectPrefecture routes_clicked" name="routes[]" id="prefs_'+(last_key_route + i)+'" value="'+prefec_result[i]+'" data-id="{{ $key }}" data-pref="{{ $item }}" hidden>'
                        +'<label for="prefs_'+(last_key_route + i)+'" class="c-lbl-white vd_dt_typ ">'+prefec_result[i]+'</label>'
                      +'</div>'
                    +'</div>'
                  })
                  $('#route_prefecture_'+prefecture+'').html(html_routes);
                  last_key_route = selected_routes_list.length - 1
                  // $(pre_result).html(htmls)
                  var selected_routes_choosen = []

                  $('body').on('click', '.routes_clicked',function(){

                    var chck_selected = $(this).next().text()
                    var chk_value = $(this).val()
                    var chk_id = $(this).attr('id')
                    console.log(chk_id)
                    selected_routes_choosen.push(chck_selected)

                    checkbox_routes +=
                    '<div class="lbl-txt-01 lbl-txt-01-m0">'
                      +'<div class="act-cat">'
                        +'<input type="checkbox" class="plan-house-type routes_clicked" checked="checked" name="routes[]" id="prefs_'+chk_id+'" value="'+chk_value+'" style="pointer-events: none;" hidden>'
                        +'<label for="prefs_'+chk_id+'" class="c-lbl-green vd_dt_typ " style="pointer-events: none;">'+chk_value+'</label>'
                      +'</div>'
                    +'</div>'

                    $('#routes_choosen').html(checkbox_routes);
                  });


                }
              })
            }else{
              routes_list = $('#route_prefecture_'+prefecture)
              route_id = $('#route_id_'+prefecture)
              if(routes_list.length > 0){
                routes_list.remove()
                route_id.remove()
              }
              selected_prefecture_list.splice(selected_prefecture_list.indexOf(prefecture), 1)

              console.log('p_list', selected_prefecture_list.length)
              if(selected_prefecture_list.length == 0){
                $('#routes_selected').html('<span class="display-txt-03">路線を選択する場合は、左のボタンをクリックして選択ください。</span>' +
                '<input type="hidden" name="routes">')
              }
            }
  });**/
  selected_routes_list = {}
  last_key_route = 0
  selected_prefecture_list = []
  function requestRouteAjax(id, prefecture){
    // e.preventDefault();
    // var id = $(this).attr('data-id');
    // var prefecture = $(this).attr('data-pref');
    var html_routes = []
    var display_prefecture = []

    if (!(selected_prefecture_list.includes(prefecture)) ){
      $.ajax({
        url: "https://express.heartrails.com/api/json?method=getLines&prefecture="+prefecture,
        type: 'POST',
        dataType: 'json',
        data:{
          "_token": "{{ csrf_token() }}",
        },
        success: function(data){
          // if(data.message == "message"){
          //   alert("success");
          // }
          console.log(data);
         display_prefecture +=
         '<div class="lbl-txt-01 lbl-txt-01-m0 pref_routes">'
                  +'<div class="act-cat">'
                    +'<input type="checkbox" class="plan-house-type" name="routes[]" value="'+prefecture+'" hidden>'
                    +'<label for="prefs_'+prefecture+'" class="c-lbl-green vd_dt_typ ">'+prefecture+'</label>'
                  +'</div>'
                +'</div>'
          $('#prefectures_choosen_1').html(display_prefecture)

          prefecture_route_buttons =
            '<div id="route_prefecture_'+prefecture+'" style="display: contents;">'
            +'</div>'
            +'<input id="route_id_'+prefecture+'" type="hidden" name="route_prefectures[]" value="'+prefecture+'">'
          if(selected_prefecture_list.length == 0){
            $('#routes_selected').html(prefecture_route_buttons)
          }else{
            $('#routes_selected').html($('#routes_selected').html()+prefecture_route_buttons)
          }
          //Display Routes
          prefec_result = data.response.line
          selected_routes_list[prefecture] = prefec_result
          selected_prefecture_list.push(prefecture)
          route_index = 0
          existing_route_list = []
          for (route_prefecture in selected_routes_list){

            html_routes = ''
            selected_routes_list[route_prefecture].forEach((route_name) => {
              if(existing_route_list.indexOf(route_name) == -1){
                route_checked = selected_routes_choosen.includes(route_name) ? 'checked=checked' : ''

                html_routes +=
                '<div class="lbl-txt-01 lbl-txt-01-m0 pref_routes">'
                  +'<div class="act-cat">'
                    +'<input type="checkbox" class="plan-house-type selectPrefecture routes_clicked" '+ route_checked +' name="routes[]" id="prefs_'+route_index+'" value="'+route_name+'" data-id="{{ $key }}" data-pref="{{ $item }}" hidden>'
                    +'<label for="prefs_'+route_index+'" class="c-lbl-white vd_dt_typ ">'+route_name+'</label>'
                  +'</div>'
                +'</div>'

                existing_route_list.push(route_name)
                route_index++
              }
            })
            $('#route_prefecture_'+route_prefecture+'').html(html_routes);
          }

          // $(pre_result).html(htmls)
        }
      })
    }
  }

  function removeRoute(prefecture){
    // Clear Route on Uncheck Prefecture
    routes_list = $('#route_prefecture_'+prefecture)
    route_id = $('#route_id_'+prefecture)
    if(routes_list.length > 0){
      routes_list.remove()
      route_id.remove()
    }
    selected_prefecture_list.splice(selected_prefecture_list.indexOf(prefecture), 1)
    // Uncheck Route
    updated_chosen_routes = []
    console.log(prefecture, selected_routes_list[prefecture])
    selected_routes_choosen.forEach((selected_route) => {
      if(selected_routes_list[prefecture].indexOf(selected_route) == -1){
        updated_chosen_routes.push(selected_route)
      }
    })
    delete selected_routes_list[prefecture]
    selected_routes_choosen = updated_chosen_routes

    // Remove Selected Routes from this Prefecture
    checkbox_routes = ''
    selected_routes_choosen.forEach((route, index) => {
      checkbox_routes +=
      '<div class="lbl-txt-01 lbl-txt-01-m0">'
        +'<div class="act-cat">'
          +'<input type="checkbox" class="plan-house-type routes_clicked" checked="checked" name="routes[]" id="route_'+index+'" value="'+route+'" style="pointer-events: none;" hidden>'
          +'<label for="route_'+index+'" class="c-lbl-green vd_dt_typ " style="pointer-events: none;">'+route+'</label>'
        +'</div>'
      +'</div>'
    });
      $('#routes_choosen').html(checkbox_routes);

    // Initial Values if No More Selected Routes
    if(selected_prefecture_list.length == 0){
      $('#routes_choosen').html('<span class="display-txt-04">路線を選択する場合は、左のボタンをクリックして選択ください。</span>' +
      '<input type="hidden" name="routes">')
    }

    // Refresh Route Modal
    route_index = 0
    existing_route_list = []
    for (route_prefecture in selected_routes_list){

      html_routes = ''
      selected_routes_list[route_prefecture].forEach((route_name) => {
        if(existing_route_list.indexOf(route_name) == -1){
          route_checked = selected_routes_choosen.includes(route_name) ? 'checked=checked' : ''

          html_routes +=
          '<div class="lbl-txt-01 lbl-txt-01-m0 pref_routes">'
            +'<div class="act-cat">'
              +'<input type="checkbox" class="plan-house-type selectPrefecture routes_clicked" '+ route_checked +' name="routes[]" id="prefs_'+route_index+'" value="'+route_name+'" data-id="{{ $key }}" data-pref="{{ $item }}" hidden>'
              +'<label for="prefs_'+route_index+'" class="c-lbl-white vd_dt_typ ">'+route_name+'</label>'
            +'</div>'
          +'</div>'

          existing_route_list.push(route_name)
          route_index++
        }
      })
      $('#route_prefecture_'+route_prefecture+'').html(html_routes);
    }
  }

  function checkValue(value,arr){
    var status = '';

    if(arr){
      for(var i=0; i<arr.length; i++){
        var name = arr[i];
        if(name == value){
          status = 'checked';
          break;
        }
      }
    }

    return status;
  }

  

  $('#clear-btn').on('click',function(){
    // alert('haha')
    $('input[type="text"]').val('')
    $('input[type="number"]').val('')
    $('input[type="checkbox"]').prop('checked',false)
    $('input[type="radio"]').prop('checked',false)
    $('#no_step_point').prop('checked', true)
    $("#step_min").prop("disabled", true);
    $("#step_max").prop("disabled", true);
    sessionStorage.clear();
    values = 0;
    limit = 3;
    selectedCityNames = []
    pref_count = 0
    city_count = 0
    selected = [];
    selectedCities = [];
    values_pref = 0
    $('.selected_prefectures').remove()
    $('.pref_routes').remove()
    // $('.pref_cities').remove()
    $('.selected_cities').remove()
    $('.modal_cities').remove()
    // $('#admin_div').hide()
    // $('#search-engine').hide()
  })

  function getCompany(selected_pref){
    displayed_company = [];
    $.ajax({
      type: 'GET',
      url: '{{ url("/store/company") }}',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      //contentType: 'application/json;charset=UTF-8',
      dataType: 'json',
      //data: JSON.stringify(sample_request[site]),
      data: {
        'selected_pref' : selected_pref
      }
    }).done((res) => {
      // console.log(res);
      $('#company').html(res.companies);
      
    })
  }

  function requestCityAjax(id, prefecture){
    // console.log(id);
    // console.log(prefecture);
    var htmls = []
    $.ajax({
        url: "https://opendata.resas-portal.go.jp/api/v1/cities?prefCode="+id,
        method: 'GET',
        dataType: 'JSON',
        headers: { 'X-API-KEY': "zBQRSl6r90oDQNsca9oo7UYKoapakpZE2nfsj7bJ" },
        success: function(data){

          var city_names = JSON.parse(sessionStorage.getItem('city_names'))

          prefec_result = data.result
          $.each(prefec_result, function(i){
            checked = checkValue(prefec_result[i].cityName, city_names)
            htmls +=
              '<div class="lbl-txt-01 lbl-txt-01-m0">'
                +'<div class="act-cat">'
                  +'<input type="checkbox" class="plan-house-type selectedCities" '+ checked +' name="cities['+prefecture+'][]" id="city_'+prefec_result[i].cityName+'" value="'+prefec_result[i].cityName+'" data-id="'+i+'" data-code="'+prefec_result[i].cityCode+'" data-pref="'+prefecture+'" hidden>'
                  +'<label for="city_'+prefec_result[i].cityName+'" class="c-lbl-white vd_dt_typ disabled">'+prefec_result[i].cityName+'</label>'
                +'</div>'
              +'</div>'
          })
          $(`#pre_result${id}`).html(htmls)
        }
    })
  }

  // $('body').on('click', '.selectPref1', function(e){
  //   var id = $(this).attr('data-id');
  //   var prefecture = $(this).attr('data-pref');
  //   var htmls = []
  //   var checked = ''

  //   $.ajax({
  //       url: "https://opendata.resas-portal.go.jp/api/v1/cities?prefCode="+id,
  //       method: 'GET',
  //       dataType: 'JSON',
  //       headers: { 'X-API-KEY': "zBQRSl6r90oDQNsca9oo7UYKoapakpZE2nfsj7bJ" },
  //       success: function(data){

  //         var city_names = JSON.parse(sessionStorage.getItem('city_names'))
  //         console.log('cities name ajax', city_names);

  //         prefec_result = data.result
  //         $.each(prefec_result, function(i){
  //           checked = checkValue(prefec_result[i].cityName, city_names)
  //                           htmls +=
  //           '<div class="lbl-txt-01 lbl-txt-01-m0">'
  //             +'<div class="act-cat">'
  //               +'<input type="checkbox" class="plan-house-type selectedCities" '+ checked +' name="cities['+prefecture+'][]" id="city_'+i+'" value="'+prefec_result[i].cityName+'" data-id="'+i+'" data-code="'+prefec_result[i].cityCode+'" data-pref="'+prefecture+'" hidden>'
  //               +'<label for="city_'+i+'" class="c-lbl-white vd_dt_typ disabled">'+prefec_result[i].cityName+'</label>'
  //             +'</div>'
  //           +'</div>'
  //         })
  //         $('#pre_result1').html(htmls)
  //       }
  //   })
  // })

  $('input[name="prefecture[]"]').prop('checked', false)
  unchecked = []
  $('input[name="prefecture[]"]').on('click', function(){
    pref_id = $(this).attr('data-id')

    if (this.checked){
      // if(values_pref < 3){
      if ( selected.filter(Boolean).length < 3){
        selected[pref_id] = {
          'id' : pref_id,
          'value' : $(this).attr('value')
        }
        $(this).prop('checked', true)
        values_pref++
      }else{
        $(this).prop('checked', false)
      }

      // Different Array to Uncheck on '#save_prefecture' function
      if(pref_id in unchecked){
        delete unchecked[pref_id]
      }

    }else {
      unchecked[pref_id] = $(this).attr('value')
      delete selected[pref_id]
      values_pref--
    }
  });
  $('input[name="station[]"]').prop('checked', false)
  
  $('body').on('click', '.station_payloads',function(){
    if (this.checked){
      if ( selected_station.filter(Boolean).length < 3){
        selected_station.push({
          'id' : $(this).attr('id'),
          'value' : $(this).attr('value')
        })
        $(this).prop('checked', true)
      }else{
        $(this).prop('checked', false)
      }
    }else{
      for (let i = 0; i < selected_station.length; i++) {
        if(selected_station[i]){
          if(selected_station[i].value == $(this).attr('value')){
            delete selected_station[i]
          }
        }
      }
    }
  })
  $('#save_station').on('click', function(){
    var data = selected_station.filter(Boolean)
    var htmls = []
    const select_station = data.filter(element => {
      return element !== null;
    });
    
    select_station.every((station, i) => {
      console.log(station);
      if(i == 3){
        return false;
      }
      htmls +=
            '<div class="lbl-txt-01 lbl-txt-01-m0 mgn-t-4 selected_stations">'
            + '<div class="act-cat">'
              // +  '<input type="checkbox" value="'+ station.value +'" checked="checked" name="stations[]" id="prefec'+i+'" data-index="'+data[i]+'" hidden class="selectPrefec">'
              //   +  '<label for="prefec'+i+'" class="c-lbl-white vd_dt_typ ">'+station.value+'</label>'
                +'<input type="checkbox" checked class="station_payloads" name="station[]" id="selected_'+station.id+'" value="'+station.value+'" hidden>'
                + '<label for="selected_'+station.id+'" class="c-lbl-white vd_dt_typ">'+station.value+'</label>'
              + '</div>'
            +'</div>'

      return true;
    })
    
    $('#station_choosen').html(htmls)
  })
  
  $('#save_prefecture').on('click', function(){
    // var test = sessionStorage.setItem('prefectures', JSON.stringify(selected));
    var htmls = []
    var htmls_data = []
    // var data = JSON.parse(sessionStorage.getItem('prefectures'))
    var data = selected.filter(Boolean)
    var pref_list = $('.prefecture_list')

    const select_prefs = data.filter(element => {
      return element !== null;
    });

    $(pref_list).val(null)
    select_prefs.every((prefecture, i) => {
      if(i == 3){
        return false;
      }
      // Update form Values
      $(pref_list[i]).val(prefecture.value)
      // console.log('ID:',data[i])
      // Update prefecture Display
      htmls +=
            '<div class="lbl-txt-01 lbl-txt-01-m0 mgn-t--23 selected_prefectures">'
            + '<div class="act-cat">'
              // +  '<input type="checkbox" value="'+ prefecture.value +'" checked name="prefec[]" id="prefec'+i+'" hidden>'
              +  '<input type="checkbox" value="'+ prefecture.value +'" checked="checked" name="prefectures[]" id="prefec'+i+'" data-index="'+data[i]+'" hidden class="selectPrefec">'
                +  '<label for="prefec'+i+'" class="c-lbl-white vd_dt_typ ">'+prefecture.value+'</label>'
              + '</div>'
            +'</div>'

      return true;
    })
    for (let i = 0; i < data.length; i++) {
      const element = data[i];
      if(element){
      htmls_data +=
            '<div class="modal_cities">'
              + '<div class="lbl-txt-01 lbl-txt-01-m0" style="flex-wrap: wrap;">'
                + '<div class="act-cat">'
                  +  '<input type="checkbox" class="plan-house-type selectPref1" checked name="selected_prefecture_city[]" id="selected_prefecture_city_'+element.id+'" value="'+element.value+'" data-id="'+element.id+'" data-pref="'+element.value+'" hidden>'
                  +  '<label for="selected_prefecture_city_'+element.id+'" class="c-lbl-white vd_dt_typ ">'+element.value+'</label>'
                +'</div>'
              + '</div>'
            + '</div>'
            + '<div class="first_dotted_lines modal_cities"></div>'
            + '<div class="container_lifeline modal_cities">'
              + '<div>'
                + '<div id="city_display" class="container_search lbl-txt-01-m0">'

                + '</div>'
                + '<div class="lbl-txt-01 lbl-txt-01-m0" style="flex-wrap: wrap;" id="pre_result'+element.id+'">'

                + '</div>'
              + '</div>'
            + '</div>'
            + '<div class="search_line modal_cities"></div>'

        requestCityAjax(element.id, element.value)
        requestRouteAjax(element.id, element.value)
      }
    }

    console.log('Data:', select_prefs)
    getCompany(select_prefs)
    sessionStorage.setItem("prefectures_select", JSON.stringify(Number(select_prefs[0]['id'])));
    var selectedPrefectures = sessionStorage.getItem('prefectures_select');
    $('#prefectures2').val(selectedPrefectures);
    // alert(sessionStorage.getItem("prefectures_select"));
    $('.route_selected').remove()
    unchecked.forEach((remove_pref) => {
      removeRoute(remove_pref)
    })
    unchecked = []
  
    selectedCityNames = []
    selectedCities = []
    values = 0
    selected_station = []
    selected_routes_choosen = []
    $('.selected_cities').remove()
    $('.selected_stations').remove()
    $('.s-station_list').remove()
    $('.modal_cities').remove()
    $('.stationModal').addClass('opacity-05')
    $('.stationModal').removeAttr("data-remodal-target");
    var test = $('#modal_data').html(htmls)
    var test = $('#prefecture_result_container').html(htmls_data)

    Object.keys(sessionStorage)
    .forEach(function (key) {
      if(key == 'cities' || key == 'city_names') {

        sessionStorage.removeItem(key)
        // console.log('remove',key);
      }
    });
   
  })

  var selected_routes_choosen = []
  $('body').on('click', '.routes_clicked',function(){
    var chck_selected = $(this).next().text()
    var chk_value = $(this).val()
    var chk_id = $(this).attr('id')

    if(this.checked){
      // Append

      selected_routes_choosen.push(chk_value)

    }else if (!this.checked){
      // Overwrite

      selected_routes_choosen.splice(selected_routes_choosen.indexOf(chk_value), 1)
    }
    checkbox_routes = ''
    routes_to_station_modal = ''

    selected_routes_choosen.forEach((route, index) => {
      checkbox_routes +=
      '<div class="lbl-txt-01 lbl-txt-01-m0 route_selected">'
        +'<div class="act-cat">'
          +'<input type="checkbox" class="plan-house-type routes_clicked" checked="checked" name="routes[]" id="route_'+index+'" value="'+route+'" style="pointer-events: none;" hidden>'
          +'<label for="route_'+index+'" class="c-lbl-green vd_dt_typ " style="pointer-events: none;">'+route+'</label>'
        +'</div>'
      +'</div>'


      // console.log(stationData);
    });
    if(checkbox_routes == ''){
      $('#routes_choosen').html('<span class="display-txt-04">路線を選択する場合は、左のボタンをクリックして選択ください。</span>' +
      '<input type="hidden" name="routes">')
    }else{
      //add modal target to station modal
      $('.stationModal').removeClass('opacity-05')
      $('.stationModal').attr("data-remodal-target", "station_modal");
      $('#routes_choosen').html(checkbox_routes);
    }
    
    getStation(selected_routes_choosen)
    $('.selected_stations').remove()
    selected_station = []
  });
  // function getStation(route, index){
  function getStation(selected_routes_choosen){
    console.log(selected_routes_choosen);
    routes_to_station_modal = ''
    var line_name = []
    $.ajax({
      type : 'GET',
      url : '{{ url("/store/station") }}',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      // contentType: 'application/json;charset=UTF-8',
      dataType: 'json',
      // data: {
      //   'route_name' : route,
      //   'index' : index
      // }
      data: {
        'routes_selected' : selected_routes_choosen
      }
    }).done((res) => {
      routes_to_station_modal = res.stations

      if(routes_to_station_modal == ''){
        '<input type="hidden" name="station">'
        $('.stationModal').addClass('opacity-05')
        $('.stationModal').removeAttr("data-remodal-target");
      }else{
        $('#stationModal_routes_selected').html(routes_to_station_modal)
      }
    })
  }
  $('body').on('click', '.selectPrefec', function(){
    $(this).prop('checked', true)
  });

  $('body').on('click', '.selectedCities', function(){
    var htmls = []
    let isChecked = $(this).is(':checked');
    let city_id = $(this).attr('data-id')
    let pref_name = $(this).attr('data-pref')
    let city_value = $(this).attr('value')


    if(isChecked){
      if(values < limit){
        selectedCities.push({
          'id' : $(this).attr('data-id'),
          'value' : $(this).attr('value'),
          'pref_name' : $(this).attr('data-pref'),
          'cityCode' : $(this).attr('data-code')
        })
        $(this).prop('checked', true)
        selectedCityNames.push($(this).attr('value'))
        values ++
      }else{
        $(this).prop('checked', false)
      }
    }else{

      for (let i = 0; i < selectedCities.length; i++) {
        if(selectedCities[i]){
          if(selectedCities[i].value == $(this).attr('value')){
            delete selectedCities[i]
            values --
          }
        }
      }
      for(let a = 0; a < selectedCityNames.length; a++){
        if(selectedCityNames){
          if(selectedCityNames[a] == $(this).attr('value')){
            delete selectedCityNames[a]
          }
        }
      }
    }
    $('#city_display').html('')
        selectedCities.forEach((city_object) => {
          htmls +=
            '<div class="lbl-txt-01 lbl-txt-01-m0">'
              +'<div class="act-cat">'
                +'<input type="checkbox" checked class="plan-house-type selectedCities" name="cities['+city_object.pref_name+'][]" id="test_'+city_object.id+'" value="'+city_value+'" data-id="'+city_object.id+'" data-pref="'+city_object.pref_name+'" hidden>'
                +'<label for="'+city_object.id+'" class="c-lbl-white vd_dt_typ disabled">'+city_object.value+'</label>'
              +'</div>'
            +'</div>'
        })

    var app = $('#city_display').append(htmls)
    sessionStorage.setItem('cities', JSON.stringify(selectedCities));
    sessionStorage.setItem('city_names', JSON.stringify(selectedCityNames));
  })

  $('#save_cities').click(function(){
    var htmls = []
    var data = JSON.parse(sessionStorage.getItem('cities'))
    var city_list = $('.city_list')

    const select_prefs = data.filter(element => {
      return element !== null;
    });


    $(city_list).val(null)
    $(city_list).attr('name', null)

    select_prefs.every((city, i) => {
      if(i == 3){
        return false;
      }
      // Update form Values
      $(city_list[i]).val(city.value)

      $(city_list[i]).attr('name', `cities[${city.pref_name}][]`)
      // Update city Display
      htmls +=
            '<div class="lbl-txt-01 lbl-txt-01-m0 selected_cities">'
            + '<div class="act-cat">'
              +  '<input type="checkbox" value="'+ city.value +'" checked name="city[]" id="city'+i+'" hidden>'
                +  '<label for="city'+i+'" class="c-lbl-white vd_dt_typ ">'+city.value+'</label>'
              + '</div>'
            +'</div>'

      return true;
    })
    var test = $('#modal_data_cities').html(htmls)
  })
</script>

@endsection
