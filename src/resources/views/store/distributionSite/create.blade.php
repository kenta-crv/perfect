@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong>カード情報入力</span>
    </div>
    <div class="c-main-box active-cont">
        <form action="{{ route('storeAdmin.setting.createsite') }}" method="post">
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
                            ログインID
                        </div>
                        <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="c-input c-input--full">
                            <input class="input--login" type="text" name="login_id" placeholder="">
                        </div>
                        <span class="text-danger"> @error('login_id') {{ $message }}  @enderror </span>
                        </div>
                    </li>
                    <li class="p-list__item p-list__item--center --login">
                        <div class="p-list__item__label_2">
                            パスワード
                        </div>
                        <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="c-input c-input--full">
                            <input class="input--login" type="password" name="password" placeholder="">
                        </div>
                        <span class="text-danger"> @error('password') {{ $message }}  @enderror </span>
                        </div>
                    </li>
                    <li class="p-list__item p-list__item--center --login">
                        <div class="p-list__item__label_2">
                            カテゴリー
                      </div>
                        <div class="l-12__3" style="overflow-wrap: break-word;">
                            <div class="c-input ">
                                <select class="c-icn-select min-wgt-md" name="category" id="">
                                  <option value="1">レインズ</option>
                                  <option value="2">at BB</option>
                                  <option value="3">いえらぶ</option>
                                </select>
                            </div>
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
