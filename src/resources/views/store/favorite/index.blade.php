@extends('admin.layout.layout--admin')
@section('title', $title ?? '賃貸居住お気に入り')
@section('content')
  @component('admin.component._p-index')
    @slot('body')
    <br/>
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="store-title">- 賃貸居住お気に入り</span>
    </div>
    <div class="c-main-box active-cont">
      <div class="c-main-body">
      賃貸居住お気に入り
      </div>
  </div>

    @endslot
  @endcomponent
@endsection


{{--  @extends('store.layouts.layout--store')
@section('title', $title ?? 'マイページ')
@section('content')
@component('admin.component._p-index')
@slot('body')
  <br/>
    <div class="index-title mgn-l-15">
      <span class="store-title">- 賃貸居住お気に入り</span>
    </div>
    <div class="c-main-box active-cont">
        <div class="c-main-body">
          賃貸居住お気に入り
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
@endsection  --}}

    {{--  @slot('title')  --}}
    	{{--  <div class="c-image c-image--user"></div>  --}}
{{--
        賃貸居住お気に入り
    @endslot
    @slot('action')
    @endslot
    @slot('body')
    @endslot
@endcomponent
@endsection  --}}
