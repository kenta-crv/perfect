@extends('robore.layout.layout--forms')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('store.component._p-index')
@slot('body')
<div class="c-contianer-box_4 w-per-16">
  <div class="box-data">
    <div class="container-table">
          <div class="container_center"></div>
          <p class="register-label">
            Thank you Page
            <hr class="register-label-horizontal register_borderline_adjust">
          </p>
      </div><br/>
      <div class="container_center"></div>
        <div class="register-description">
            <div class="foot_3 mgn-t-5">
              <p>Thank you page text here</p>
                <div class="p-login__buttonArea">
                  <a href="{{ route('home') }}" class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2"><span class="text_span_adjust">TOPに戻る</span></a>
                </div>
              </div>
        </div>
      </div><br/><br/>
    </div>
</div>
@endslot
@endcomponent
@endsection
