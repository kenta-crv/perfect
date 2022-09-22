@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong>契約・請求情報</span>
    </div>
    <div class="c-main-box active-cont">
        <div class="c-main-body">
            <li class="c-change_list c-change_title">
                <div>
                  ■決済方法をクレジットカードに変更
                </div>
            </li>
            <li class="c-change_list">
              <div class="">
                ・次の画面から、クレジットカード情報を登録ください。
              </div>
           </li>
           <li class="c-change_list">
            <div>
              ・クレジットカードが登録できましたら、次回からカードでの決済となります。
            </div>
           </li>
          <li class="c-change_list">
            <div>
              ・カードの登録ができない場合は、従来のお支払い方法のままとなります。
            </div>
          </li>
            <br>
            <div class="foot_3">
                <div class="p-login__buttonArea">
                    <a type="submit" class="c-lbl-white-3" href="{{ url('store/setting/paymentMethod/creditRegistration') }}">次へ　＞　クレジットカード情報の入力
                    </a>
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
