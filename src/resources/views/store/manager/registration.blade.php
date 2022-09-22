@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong></span>
    </div>
    <div class="c-main-box active-cont">
        <form action="{{ route('storeAdmin.manager.mypage.create') }}" method="post">
            <input type="hidden" name="account_id" value="{{ session()->get('LoggedUser')}}">
            @csrf
            <div class="c-main-body">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                    <li class="p-list__item p-list__item--center --login">
                        <div class="p-list__item__label_2">
                            お名前
                        </div>
                        <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="c-input c-input--full">
                            <input type="text" name="name"  class="input--login mgn-r-2" contenteditable="true">
                        </div>
                        <span class="text-danger"> @error('name') {{ $message }}  @enderror </span>
                        </div>
                    </li>
                    <li class="p-list__item p-list__item--center --login">
                        <div class="p-list__item__label_2">
                            メールアドレス
                        </div>
                        <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="c-input c-input--full">
                            <input class="input--login" type="email" name="email" placeholder="" >
                        </div>
                        <span class="text-danger"> @error('email') {{ $message }}  @enderror </span>
                        </div>
                    </li>


                <hr class="hr-gray">
                <br>
                <div class="foot_3">
                    <div class="p-login__buttonArea">
                        <button type="submit" class="c-lbl-white-3">登録</button>
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

</script>
@endsection
