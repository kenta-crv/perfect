@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="a-page-title">
      {{-- <span><strong style="color: #003a16;"></strong>sample</span> --}}
    </div>
    <div class="c-main-box active-cont">
        <div class="c-main-body">
          <div class="dormant-description">お支払い方法がクレジットカードに変更されました。</div>
          <div class="fnt-sz-3 mgn-t-3 mgn-l-10">次回決済より変更されます。</div>
        </div>
        <hr class="hr-gray mgn-t-15">
        <div class="checkbox-distribution">
          <div class="checkbox-center-2">
            <div class="button-width">
              <a class="c-lbl-white-3" type="submit" href="{{route ('storeAdmin.creditCard.change')}}">「契約・請求情報」に戻る</a>
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
        document.getElemsentById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

</script>
@endsection
