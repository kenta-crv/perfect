@extends('admin.layout.layout--admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong>ガイド入力</span>
    </div>
    <div class="c-main-box active-cont">
        <form method="post" action="{{ route('admin.guide.insertGuide') }}">
            @csrf
            <div class="c-main-body">
                <li class="p-list__item p-list__item--center --login">
                    <div class="p-list__item__label_2">
                        ガイド名
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input class="input--login" type="text" name="guide_name" placeholder="">
                      </div>
                      <span class="text-danger"> @error('guide_name') {{ $message }}  @enderror </span>
                    </div>
                </li>
                <li class="p-list__item p-list__item--center --login">
                    <div class="p-list__item__label_2">
                        場所
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input class="input--login" type="text" name="guide_place" placeholder="">
                      </div>
                      <span class="text-danger"> @error('guide_place') {{ $message }}  @enderror </span>
                    </div>
                </li>
                <li class="p-list__item p-list__item--center --login">
                  <div class="p-list__item__label_2">
                    ロール権限
                  </div>
                  <div style="overflow-wrap: break-word;">
                    <select class="keep-slct-01 " style="padding-right: 25px;" name="selected_role" id="select_limited">
                      @foreach(config('const.role') as $key => $value)
                          <option value=" {{ $value }}"> {{ $value }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger"> @error('target') {{ $message }}  @enderror </span>
                  </div>
                </li>
                <li class="p-list__item p-list__item--center --login">
                    <div class="p-list__item__label_2">
                        ガイド内容
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="textarea-width mgn-b-2">
                            <textarea row="3" cols="1" class="admin-txt-area" placeholder="内容" name="guide_body"></textarea>
                          </div>
                      <span class="text-danger"> @error('guide_body') {{ $message }}  @enderror </span>
                    </div>
                </li>
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
