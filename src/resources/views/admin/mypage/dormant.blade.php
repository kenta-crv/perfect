@extends('admin.layout.layout--admin')
@section('title', $title ?? '休眠手続き')
@section('content')
@component('admin.component._p-index')
@slot('body')
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
            <button class="c-lbl-white-5 margin--10-dormant" for=""><a href="{{url ('/admin/store/search/detail/'.$account_state->account_id)}}">休眠する</a></button> 
          </div>
        </div>
      </div>

  </div>

@endslot
@endcomponent
@endsection


{{-- @extends('store.layouts.login_layout')
@section('content')

    <div class="header_center">
        ヘッダ
        <hr>
    </div>
    <div class="header_left_resume">
        再開のお手続き
    </div>
    <div class="header_left_label_robore_staff">
        解約手続き
    </div>

    <div class="box_detail_cancel">
        <p class="header_1">現在、休眠中となっています。</p><br/>
        <p class="header_2">再開いただくと、すぐに休眠前と同じ機能が使える様になります。</p>
        <p class="header_3">【費用について】</p>
        <p class="header_4">休眠前の最後のお支払いの権利が残っていれば、更新日までそのままご利用いただき、更新日以降は新たにお支払いいただきます。</p>
        <p class="header_5">休眠前の最後のお支払いの権利が残っていなければ、再開日から新たにお支払いいただきます。</p>
        <div class="foot_3">
            <div class="p-login__buttonArea">
                <button type="submit" class="c-button c-button--full c-button--thinBlue">解約する</button>
            </div>
        </div>
    </div>


    @endsection --}}
