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
            Terms of Service
            <hr class="register-label-horizontal register_borderline_adjust">
          </p>
      </div><br/>
      <div class="container_center"></div>
        <div class="register-description">
            {{-- <p class="font_description login_font_desc_reponse">複数店舗のお支払いをまとめる場合は、最初に「本部」としてのアカウントを作成し、次に店舗ごとのアカウントを作成します。</p>
            <p class="font_description login_font_desc_reponse">本部のアカウント作成に費用はかかりません。</p> --}}
        </div>
      </div><br/><br/>
    </div>
</div>
@endslot
@endcomponent
@endsection
