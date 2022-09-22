
@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '契約・請求情報')
@section('content')

@component('admin.component._p-index')
  @slot('body')
  <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="store-title">契約・請求情報</span>
    </div>
  <div class="c-main-box active-cont">
      <div class="c-main-body">
        <div class="c-contianer-box">
          <div class="box-description mgn-b-3 mgn-t-4">
            <div class="distribution-desc">
              {{--  <span>構築中</span>  --}}
              <span>大変申し訳ございません。</span><br>
              <span>現在このページは構築中です。</span>
            </div>
          </div>
        </div>
      </div>
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

</script>
@endsection

