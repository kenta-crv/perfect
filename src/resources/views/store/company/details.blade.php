@extends('store.layouts.layout-store-search-details')
@section('title', $title ?? '物件詳細')
@section('content')
@component('admin.component._p-index_news-2')
@slot('body')



  <div class="box-data_details active-cont">
    <div id="London" class="tabcontent" style="display: block;">
        <div class="container_center" id="London">
          <div class="details_top">
            <div>
              <div class="lbl_details">
                <label for="">表示方法：</label>
                <select name="" id="" class="keep-slct-02">
                  <option value="">仲介用表示</option>
                </select>
              </div>
            </div>

            <div class="com_links_cont" >
              <a class="com_links" href="/store">Step 1 </a>>
              <a class="com_links" href="/store/search/list">Step 2 </a>>
              <span>Step 3</span>

            </div>
            <div class="details_top_button">
              <label class="c-lbl-white--details" detail-bubble="別ウインドウでマイソクを表示します。 情報元サイトによっては、仲介用とお客様用で帯がかわります。">マイソク表示</label>
            </div>
          </div>
        </div>
        <br/>
        <div class="company_map_container">
          <div class="company_container">
            <div class="company_dropdown">
              <button class="btn_dropdown" data-toggle="dropdown" >
                地図表示
                <span class="drop_icon"><img src="{{asset('image/img/arrow_down.png')}}"></span>
              </button>
            </div>
          </div>
            <div class="company_map">
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25977.355572639553!2d139.6329533!3d35.5248101!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x605d1b87f02e57e7%3A0x2e01618b22571b89!2z5pel5pys44CB5p2x5Lqs6YO9!5e0!3m2!1sja!2sph!4v1650446231563!5m2!1sja!2sph" class="map-img" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                 --}}
                 <iframe class="map-img" width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{ $properties['所在地'] }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>

        @if(array_key_exists('image_list', $properties))

          <div style="display:flex;justify-content: center;">
            <div>
              <button class="arror_less_2" id="prevImg"></button>
            </div>
            <div class="image-slide" style="width:80%">
              @foreach($properties['image_list'] as $key => $image_src)
                <div>
                  <img src="{{$image_src}}">
                </div>
              @endforeach
            </div>
            <div>
              <button class="arror_greater_2" id="nextImg"></button>
            </div>
          </div>

        @else
        <div class="container_4_news">
            <div class="container_photo_slide">
                {{--  --}}
              <div class="column_4">
                <div class="less_than_width">
                  <button class="arror_less_2" id="prevImg"></button>
                </div>
                  @if(array_key_exists('image_number_gaikan', $properties))
                    @if(array_key_exists('image_src', $properties))
                      <img class="demo_cursor" src="{{ $properties['image_src'] }}" alt="">
                    @endif
                  @else
                    <img class="demo_cursor" src="{{asset('image/img/room_2.png')}}"  onclick="currentSlide(2)" alt="Picture 2">
                    <img class="demo_cursor" src="{{asset('image/img/room_3.png')}}"  onclick="currentSlide(3)" alt="Picture 3">
                    <img class="demo_cursor" src="{{asset('image/img/room_4.png')}}"  onclick="currentSlide(4)" alt="Picture 4">
                    <img class="demo_cursor" src="{{asset('image/img/room_5.png')}}"  onclick="currentSlide(5)" alt="Picture 5">
                  @endif

                <div class="greater_width">
                  <button class="arror_greater_2" id="nextImg"></button>
                </div>

              </div>
              {{--  --}}
            </div>

        </div>
        @endif

        <br/><br/>

                  <div class="data-info">
                    <div class="l-12">
                      <div class="l-12__1 text-input__label-02 advertisement_reprint_border_radius">
                        <div class=" lbl-txt-01">
                        <label class="" for="">広告転載区分</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          @if(!array_key_exists('ad', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['ad'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">物件番号</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          @if(array_key_exists('image_number', $properties))
                            <img  src="{{ $properties['物件番号'] }}" alt="">
                          @else
                            @if(array_key_exists('物件番号', $properties))
                              <label class="" for="">{{ $properties['物件番号'] }}</label>
                            @else
                            {{-- <label class="" for="">{{ $properties['物件番号'] }}</label> --}}
                              <label class="" for="">N/A</label>
                            @endif
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">登録・更新日</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">

                          @if(array_key_exists('publish_date', $properties))
                            <label class="" for="">{{ $properties['publish_date'] }}</label>
                          @elseif(array_key_exists('更新日', $properties))
                            <label class="" for="">{{ $properties['更新日'] }}</label>
                          @else
                            <label class="" for="">N/A</label>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                    <br/>

                  <div class="display_inline--flex">
                    <span class="rectangle_32"></span>
                  <span class="mandatory-txt-01">契約情報</span>
                  </div>
                  <br/>

                  <div class="data-info">
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02 clarification_border_radius">
                        <div class=" lbl-txt-01">
                        <label class="" for="">賃料</label>
                        </div>
                      </div>
                      <div class="l-12__4">
                        <div class=" lbl-txt-01">
                          @if(array_key_exists('image_number', $properties))
                            <img  src="{{ $properties['賃料'] }}" alt="">
                          @else
                            @if(array_key_exists('賃料', $properties))
                              <label class="" for="">{{ $properties['賃料'] }}</label>
                            @else
                            {{-- <label class="" for="">{{ $properties['物件番号'] }}</label> --}}
                              <label class="" for="">N/A</label>
                            @endif
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">その他一時金</label>
                        </div>
                      </div>
                      <div class="l-12__4">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">室内清掃費4.4万円</label> --}}
                          @if(!array_key_exists('その他一時金', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['その他一時金'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">礼金</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">1ヶ月</label> --}}
                          @if(array_key_exists('礼金', $properties))
                            <label class="" for="">{{ $properties['礼金'] }}</label>
                          @else
                            @if(array_key_exists('礼金／権利金', $properties))
                              <label class="" for="">{{ explode("/", $properties['礼金／権利金'])[0] }}</label>
                            @else
                              <label class="" for="">N/A</label>
                            @endif
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                          <label class="" for="">敷金</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          @if(array_key_exists('敷金', $properties))
                            <label class="" for="">{{ $properties['敷金'] }}</label>
                          @else
                            @if(array_key_exists('敷金／保証金', $properties))
                              <label class="" for="">{{ explode("/", $properties['敷金／保証金'])[0] }}</label>
                            @else
                              <label class="" for="">N/A</label>
                            @endif
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">鍵交換代等</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">鍵交換代金あり　22,000円</label> --}}
                          @if(!array_key_exists('鍵交換代等', $properties))
                          <label class="" for="">N/A</label>
                          @else
                          <label class="" for="">{{ $properties['鍵交換代等'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">管理費</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">5,000円／月</label> --}}
                          @if(!array_key_exists('管理費', $properties))
                          <label class="" for="">N/A</label>
                          @else
                          <label class="" for="">{{ $properties['管理費'] }}</label>
                          @endif
                          </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">共益費</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('共益費', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['共益費'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">保険</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">加入要　/　2年間　20,000円</label> --}}
                          @if(!array_key_exists('保険', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['保険'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">契約期間</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">2年</label> --}}
                          @if(!array_key_exists('契約期間', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['契約期間'] }}</label>
                          @endif
                          </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">保証金</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          @if(array_key_exists('保証金', $properties))
                            <label class="" for="">{{ $properties['保証金'] }}</label>
                          @else
                            @if(array_key_exists('敷金／保証金', $properties))
                              <label class="" for="">{{ explode("/", $properties['敷金／保証金'])[1] }}</label>
                            @else
                              <label class="" for="">N/A</label>
                            @endif
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">家賃保証</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class="inq-btn-cont">
                            <span class="inq-button"  detail-bubble="家賃をクレカで払える可能性があります。詳細は管理会社にお問合せください.">要問合)クレカ家賃払</span>
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">更新料</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('更新料', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['更新料'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">カード決済</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('カード決済', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['カード決済'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">設備保証</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                        </div>
                      </div>
                    </div>
                    <div class="l-12">
                      <div class="l-12__1 text-input__label-02 others_border_radius">
                        <div class=" lbl-txt-01">
                        <label class="" for="">その他</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('その他', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <img  src="{{ $properties['その他'] }}" alt="">
                          @endif
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  <br/>
                  <div class="display_inline--flex">
                    <span class="rectangle_32"></span>
                  <span class="mandatory-txt-01">物件情報</span>
                  </div>
                  <br/>

                  <div class="data-info">
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02 building_name_border_radius">
                        <div class=" lbl-txt-01">
                        <label class="" for="">建物名</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">{{ $properties['建物名'] }}</label> --}}
                          @if(!array_key_exists('建物名', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['建物名'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">物件種目</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">{{ $properties['物件種目'] }}</label> --}}
                          @if(!array_key_exists('物件種目', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['物件種目'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">建物構造</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          @if(!array_key_exists('struct_type', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['struct_type'] }}</label>
                          @endif

                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">間取</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">{{ $properties['間取'] }}</label> --}}
                          @if(!array_key_exists('間取', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['間取'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">間取り内訳</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('間取り内訳', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['間取り内訳'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">築年月</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">{{ $properties['築年月'] }}</label> --}}
                          @if(!array_key_exists('築年月', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['築年月'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">新築フラグ</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('新築フラグ', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['新築フラグ'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">所在階／建階</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          @if(!array_key_exists('所在階', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['所在階'] }}</label>
                          @endif
                          {{-- <label class="" for="">{{ $properties['所在階'] }}</label> --}}
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">専有面積</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">{{ $properties['使用部分面積'] }}</label> --}}
                          @if(!array_key_exists('使用部分面積', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['使用部分面積'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">住所</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">{{ $properties['所在地'] }}</label> --}}
                          @if(!array_key_exists('所在地', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['所在地'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">利用駅1</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">{{ $properties['沿線駅'] }}</label> --}}
                          @if(!array_key_exists('沿線駅', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['沿線駅'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">利用駅2</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('利用駅2', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['利用駅2'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">利用駅3</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('利用駅3', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['利用駅3'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">利用駅4</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('利用駅4', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['利用駅4'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">利用駅5</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('利用駅5', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['利用駅5'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">リフォーム</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('リフォーム', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['リフォーム'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">リノベーション</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('リノベーション', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['リノベーション'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">駐車場</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('駐車場', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['駐車場'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">バイク置き場</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('バイク置き場', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['バイク置き場'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">駐輪場</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('駐輪場', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['駐輪場'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">バルコニー</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('バルコニー', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['バルコニー'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">設備</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-02">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('設備', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            @if(gettype($properties['設備']) == 'array')
                              @foreach($properties['設備'] as $key => $equipment)
                                  @if($key+1 < count($properties['設備']))
                                    <label class="mgn-r-2" for="">{{ $equipment }},</label>
                                  @elseif($key+1 == count($properties['設備']))
                                    <label class="mgn-r-2" for="">{{ $equipment }}</label>
                                  @endif
                              @endforeach
                            @else
                              <label class="" for="">{{ $properties['設備'] }}</label>
                            @endif
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">その他</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('その他', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['その他'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12">
                      <div class="l-12__1 text-input__label-02 remarks_border_radius">
                        <div class=" lbl-txt-01">
                        <label class="" for="">備考</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('備考', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['備考'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <br/>
                  <div class="display_inline--flex">
                    <span class="rectangle_32"></span>
                  <span class="mandatory-txt-01">取引情報</span>
                  </div>
                  <br/>

                  <div class="data-info">
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02 situation_border_radius">
                        <div class=" lbl-txt-01">
                        <label class="" for="">現況</label>
                        </div>
                      </div>
                      <div class="l-12__5">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('現況', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['現況'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">入居</label>
                        </div>
                      </div>
                      <div class="l-12__5">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('入居', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['入居'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">広告転載区分</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          @if(!array_key_exists('ad', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['ad'] }}</label>
                          @endif
                          </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">掲載媒体</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('掲載媒体', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['掲載媒体'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">取引態様</label>
                        </div>
                      </div>
                      <div class="l-12__3">
                        <div class=" lbl-txt-01">
                          @if(!array_key_exists('取引態様', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['取引態様'] }}</label>
                          @endif

                        </div>
                      </div>
                    </div>

                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">報酬</label>
                        </div>
                      </div>
                      <div class="l-12__2">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('報酬', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['報酬'] }}</label>
                          @endif
                          </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">報酬</label>
                        </div>
                      </div>
                      <div class="l-12__2 mgn-t-1">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">当方不払</label> --}}
                          @if(!array_key_exists('報酬', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['報酬'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">負担割合借主</label>
                        </div>
                      </div>
                      <div class="l-12__2 mgn-t-1">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('負担割合借主', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['負担割合借主'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">配分割合客付</label>
                        </div>
                      </div>
                      <div class="l-12__2 mgn-t-1">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('配分割合客付', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['配分割合客付'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">鍵情報</label>
                        </div>
                      </div>
                      <div class="l-12__5 mgn-t-1">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('鍵情報', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['鍵情報'] }}</label>
                          @endif
                        </div>
                      </div>
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">内見情報</label>
                        </div>
                      </div>
                      <div class="l-12__5 mgn-t-1">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('内見情報', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['内見情報'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">入居条件</label>
                        </div>
                      </div>
                      <div class="l-12__11 mgn-t-1">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('入居条件', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['入居条件'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12 border-btm">
                      <div class="l-12__1 text-input__label-02">
                        <div class=" lbl-txt-01">
                        <label class="" for="">その他</label>
                        </div>
                      </div>
                      <div class="l-12__11 mgn-t-1">
                        <div class=" lbl-txt-01">
                          {{-- <label class="" for="">N/A</label> --}}
                          @if(!array_key_exists('その他', $properties))
                          <label class="" for="">N/A</label>
                          @else
                            <label class="" for="">{{ $properties['その他'] }}</label>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="l-12">
                      <div class="l-12__1 text-input__label-02 registered_company_border_radius">
                        <div class=" lbl-txt-01">
                        <label class="" for="">登録会社</label>
                        </div>
                      </div>
                      <div class="l-12__11">
                        <div class= "l-12">
                          <div class="l-12__5 mgn-t-1">
                            <div class=" lbl-txt-01">
                              {{-- <label class="" for="">{{ $properties['商号'] }}</label> --}}
                              @if(!array_key_exists('商号', $properties))
                              <label class="" for="">N/A</label>
                              @else
                                <label class="" for="">{{ $properties['商号'] }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br/>
                  <br/>
                  <div class="top_button_2">
                    <button class="button button5">
                      <span>戻る</span></button>
                  </div>


                    </div>
                  </div>






              </div>
          <br/>
          <div id="Paris" class="tabcontent">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p>
            <h2>JavaScript Arrays</h2>
            <p id="demo"></p>
          </div>
      </div>

    </div>


</div>
@endslot
  @endcomponent

  <script>
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

    $('.image-slide').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 4,
      prevArrow : $('#prevImg'),
      nextArrow : $('#nextImg'),
      useTransform:false,
    });

    </script>
@endsection
