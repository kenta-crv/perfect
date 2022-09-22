@extends('store.layouts.layout--store')
@section('title', $title ?? 'ストアサーチ')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    {{--  <div class="c-image c-image--user"></div>  --}}
        検索元となる流通サイトによって検索できない項目もあります。
    @endslot
    @slot('action')
    @endslot
    @slot('body')
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
            <h1>検索する流通サイト（選択したサイト全てで検索できない項目については、項目に取消線が表示されます。）</h1>
        </div>
      </div>
      <div class="container_rain">
        <div class="container_rain_adjust">
          <ul class="container_rain_ul">
            <li class="container_button1"><p>レインズ</p></li>
            <li class="container_button2"><p>atBB</p></li>
            <li class="container_button3"><p>いえらぶ</p></li>
            <li class="container_button4"><p>イタンジ</p></li>
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

          <div class="container_building_equip_adjust2">
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
            <div class="tooltip">
              <i class='badge' style="font-size: 15px">!</i>
              <span class="tooltiptext">この項目は、「レインズ」で検索できないため、この項目選択を外すか、検索する流通サイトからレインズを外してください。</span>
            </div>

        </div>
      </div>

      </div>

    @endslot
  @endcomponent
@endsection
