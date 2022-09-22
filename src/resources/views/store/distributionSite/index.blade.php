@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong> 物件流通サイト（情報取得）設定</span>
    </div>
    <div class="c-main-box active-cont">
        <div class="c-main-body">
          <span class="c-main-label">物件流通サイト選択：<span class="c-main-font-weight-bold">店舗管理者のみの機能です</span></span><br/>
          {{--<span class="c-main-label">どの物件流通サイトにロボレが接続し情報を取得するかを、 お選びください。 現在ご契約のプランでは、 最大3社まで設定可能です。</span>--}}
          <span class="c-main-label">どの物件流通サイトにロボレが接続し情報を取得するかを、 お選びください。 </span>
        </div>
        <form action="{{ route('storeAdmin.setting.createScraping') }}" method="post">
          <input type="hidden" name="account_id" value="{{ session()->get('LoggedUser')}}">
          <input type="hidden" name="plans" value="{{ session()->get('plan')}}" id="plans">
          @csrf
          <div class="checkbox-distribution">
            <div class="checkbox-center">
             @php($unselected = config('const.sites'))
             @foreach($unselected as $key => $selected)

             {{-- {{ $selected }} --}}
             <label class="cnt-2">
              <input class="yellow form_category_type" onclick="limitCheckboxes()" type="checkbox" id="" value="{{ $key }}" {{  in_array($key, $sites)  ? 'checked' : '' }} name="targetSite[{{ $key }}]">
                <span class="checkmark-2"></span>
                <label class="label-checbox">
                  <a class="link__font" href="{{ config('const.site_links')[$key] }}" target="_blank">
                  {{ $selected }}
                  </a>
                </label>
             </label>
             @endforeach
             
            </div>
          </div>
        <div class="checkbox-distribution">
          <div class="checkbox-center-2">
            <div class="button-width">
              <p id="text" style="display:none; color:red;">プランで選択できる数の上限を超えています。</p>
              <button type="submit" class="c-lbl-white-5 margin--10" for="">保存</button>
            </div>
          </div>
        </div>
      </form>
    </div>

  @endslot
  @endcomponent
<script>
    // for tabbing top
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

function limitCheckboxes(){
  var $checkboxes = $('input[type="checkbox"]');
      var getValue= $("#plans").val();
      var getText= document.getElementById("text");
      
      $checkboxes.change(function(){
        if(this.checked){
          if(getValue == 2){
            if($checkboxes.filter(':checked').length > 5){
              $checkboxes.not(':checked').prop('disabled', true);
              getText.style.display = "block";
              this.checked--;
            }
            
          }

          if(getValue == 1){
            if($checkboxes.filter(':checked').length > 3){
              $checkboxes.not(':checked').prop('disabled', true);
              getText.style.display = "block";
              this.checked--;
            }
          }
            
        }else{
          $checkboxes.prop('disabled', false);
        }
      });
}
     

</script>
@endsection



{{-- @extends('store.layouts.layout--store')
@section('title', $title ?? '物件流通サイト選択')
@section('content')
  @component('admin.component._p-index')
    @slot('title')
      物件流通サイト
    @endslot
    @slot('action')

    @endslot
    @slot('body')
      <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <p>		物件流通サイト選択　：　店舗管理者のみの機能です</p>
            <p>どの物件流通サイトにロボレが接続し情報を取得するかを、お選びください。</p>
            <p>現在ご契約のプランでは、最大3社まで設定可能です。</p>
          </div>
        </div>
        <div class="box-data">
          <div class="container_item user_status">
            <div class="heading">
              <h3 class="margin-bottom--60">
                新規一次店登録 ※必須
              </h3>
            </div>
            <div class="container-body margin-top--35">
                <div class="l-12 l-12--gap24">
                    <div class="l-12__10 width-full">
                      <ul class="p-list ">
                        <li class="p-list__item p-list__item--center">
                          <div class="p-list__item__label">
                            会社概要ページを作る
                          </div>
                          <div class="p-list__item__data" style="overflow-wrap: break-word;">
                            <div class="c-input c-input--full">
                              <div class="c-input c-input--radio">
                                <input id="authors_on" name="authors" type="radio" value="1" ="">
                                <label for="authors_on">レインズ</label>
                              </div>
                              <span class="unit_min"></span>
                                <div class="c-input c-input--radio">
                                  <input id="authors_off" name="authors" type="radio" value="2">
                                  <label for="authors_off">at BB</label>
                                </div>
                                <div class="c-input c-input--radio">
                                  <input id="ff" name="authors" type="radio" value="3" ="">
                                  <label for="ff">いえらぶ</label>
                                </div>
                                <span class="unit_min"></span>
                                <div class="c-input c-input--radio">
                                  <input id="dd" name="authors" type="radio" value="5" ="">
                                  <label for="dd">イタンジ</label>
                                </div>
                                <span class="unit_min"></span>
                            </div>
                          </div>
                        </li>
                      </ul>

                      <div class="p-detail__foot">
                        <div class="p-buttonWrap p-buttonWrap--right">
                          <a href="#" class="c-button c-button--secondary">
                            保存
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
    @endslot
  @endcomponent
@endsection --}}
