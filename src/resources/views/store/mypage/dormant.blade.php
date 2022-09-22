@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '休眠手続き')
@section('content')

@component('admin.component._p-index')
  @slot('body')
  <form action="{{ route('storeAdmin.setting.dormantConfirm')}}" method="get" id="dormant">
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong>休眠手続き</span>
    </div>
    <div class="c-main-box active-cont">
        <div class="c-main-body">
          <div class="checkbox-distribution">
            <div class="checkbox-center-2">
              <span class="dormant-description">このお手続きをした時から、休眠となり機能が凍結されます。</span>
            </div>
          </div><br/><br/>
          <div class="checkbox-distribution">
            <div class="checkbox-center-2">
              <span class="dormant-bold">【休眠中について】</span>
            </div>
          </div>
          <div class="checkbox-distribution">
            <div class="checkbox-center-2">
              <span class="dormant-description">管理者はロボレにログインし、再開の手続きが行えます。</span>
            </div>
          </div>
          <div class="checkbox-distribution">
            <div class="checkbox-center-2">
              <span class="dormant-description">前入金分は、休眠した日から日割り分を再開時まで持ち越します。返金はいたしません。</span>
            </div>
          </div>
          <div class="checkbox-distribution">
            <div class="checkbox-center-2">
              <span class="dormant-small-font">※ 持ち越しができるのは、休眠手続きから1年間までとなります。</span>
            </div>
          </div><br/><br/>
          <div class="checkbox-distribution">
            <div class="checkbox-center-2">
              <span class="dormant-description">休眠からの再開については、管理者の方がログインし再開手続きを行う事で、すぐに機能が復帰します。</span>
            </div>
          </div>
        </div>
        <div class="checkbox-distribution">
          <div class="checkbox-center-2">
            <div class="button-width">
              <button class="c-lbl-white-5 margin--10-dormant" type="submit" for="">休眠する</button>
            </div>
          </div>
        </div>
    </div>
  </form>
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
                                <input id="authors_on" name="authors" type="radio" value="1" checked="checked">
                                <label for="authors_on">レインズ</label>
                              </div>
                              <span class="unit_min"></span>
                                <div class="c-input c-input--radio">
                                  <input id="authors_off" name="authors" type="radio" value="2">
                                  <label for="authors_off">at BB</label>
                                </div>
                                <div class="c-input c-input--radio">
                                  <input id="ff" name="authors" type="radio" value="3" checked="checked">
                                  <label for="ff">いえらぶ</label>
                                </div>
                                <span class="unit_min"></span>
                                <div class="c-input c-input--radio">
                                  <input id="dd" name="authors" type="radio" value="5" checked="checked">
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
